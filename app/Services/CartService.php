<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    private $cart;

    public function __construct()
    {
        $this->initializeCart();
    }

    private function initializeCart()
    {
        if (Auth::check() && Auth::user()->isCustomer()) {
            $this->cart = Cart::firstOrCreate(
                ['customer_id' => Auth::id()],
                ['total_price' => 0]
            );
        }
        // Guest cart handled by session
    }

    public function addToCart(Product $product, int $quantity = 1)
    {
        if (Auth::check()) {
            return $this->addToDatabaseCart($product, $quantity);
        }

        return $this->addToSessionCart($product, $quantity);
    }

    private function addToDatabaseCart(Product $product, int $quantity)
    {
        $cartItem = CartItem::where('cart_id', $this->cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->total_price = $cartItem->quantity * $cartItem->unit_price;
            $cartItem->save();
        } else {
            $cartItem = CartItem::create([
                'cart_id' => $this->cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->price,
                'total_price' => $product->price * $quantity
            ]);
        }

        $this->updateCartTotal();
        return $cartItem;
    }

    private function addToSessionCart(Product $product, int $quantity)
    {
        $cart = Session::get('guest_cart', ['items' => [], 'total_price' => 0]);

        // Convert items to array if it's a collection
        $items = is_array($cart['items']) ? $cart['items'] : $cart['items']->toArray();

        $found = false;
        foreach ($items as &$item) {
            if ($item['product_id'] == $product->id) {
                $item['quantity'] += $quantity;
                $item['total_price'] = $item['quantity'] * $item['unit_price'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $items[] = [
                'id' => uniqid('cart_', true), // Add unique ID for guest items
                'product_id' => $product->id,
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'image' => $product->image,
                    'stock_quantity' => $product->stock_quantity
                ],
                'quantity' => $quantity,
                'unit_price' => $product->price,
                'total_price' => $product->price * $quantity
            ];
        }

        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item['total_price'];
        }

        $cart = [
            'items' => $items,
            'total_price' => $totalPrice
        ];

        Session::put('guest_cart', $cart);

        return $cart;
    }

    public function updateQuantity($itemId, $quantity)
    {
        if (Auth::check()) {
            $cartItem = CartItem::find($itemId);
            if (!$cartItem) {
                return false;
            }

            $cartItem->quantity = $quantity;
            $cartItem->total_price = $cartItem->quantity * $cartItem->unit_price;
            $cartItem->save();

            $this->updateCartTotal();
            return $cartItem;
        } else {
            $cart = Session::get('guest_cart', ['items' => [], 'total_price' => 0]);
            $items = $cart['items'];

            foreach ($items as &$item) {
                if ($item['id'] == $itemId || $item['product_id'] == $itemId) {
                    $item['quantity'] = $quantity;
                    $item['total_price'] = $item['quantity'] * $item['unit_price'];
                    break;
                }
            }

            $totalPrice = 0;
            foreach ($items as $item) {
                $totalPrice += $item['total_price'];
            }

            $cart = [
                'items' => $items,
                'total_price' => $totalPrice
            ];

            Session::put('guest_cart', $cart);
            return $cart;
        }
    }

    public function removeItem($itemId)
    {
        if (Auth::check()) {
            CartItem::destroy($itemId);
            $this->updateCartTotal();
        } else {
            $cart = Session::get('guest_cart', ['items' => [], 'total_price' => 0]);
            $items = $cart['items'];

            $items = array_filter($items, function ($item) use ($itemId) {
                return !($item['id'] == $itemId || $item['product_id'] == $itemId);
            });

            $totalPrice = 0;
            foreach ($items as $item) {
                $totalPrice += $item['total_price'];
            }

            $cart = [
                'items' => array_values($items), // Re-index array
                'total_price' => $totalPrice
            ];

            Session::put('guest_cart', $cart);
        }
    }

    public function clearCart()
    {
        if (Auth::check()) {
            if ($this->cart) {
                $this->cart->items()->delete();
                $this->cart->total_price = 0;
                $this->cart->save();
            }
        } else {
            Session::forget('guest_cart');
        }
    }

    public function getCart()
    {
        if (Auth::check() && Auth::user()->isCustomer()) {
            $cart = Cart::with('items.product')->where('customer_id', Auth::id())->first();

            if (!$cart) {
                return ['items' => collect([]), 'total_price' => 0];
            }

            return [
                'items' => $cart->items,
                'total_price' => $cart->total_price ?? 0
            ];
        }

        $cart = Session::get('guest_cart', ['items' => [], 'total_price' => 0]);
        return [
            'items' => collect($cart['items'] ?? []),
            'total_price' => $cart['total_price'] ?? 0
        ];
    }

    public function getCartCount()
    {
        if (Auth::check() && Auth::user()->isCustomer()) {
            $cart = Cart::where('customer_id', Auth::id())->first();
            if ($cart) {
                return $cart->items()->sum('quantity');
            }
            return 0;
        }

        $cart = Session::get('guest_cart', ['items' => [], 'total_price' => 0]);
        $count = 0;
        foreach ($cart['items'] as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }

    private function updateCartTotal()
    {
        if ($this->cart) {
            $this->cart->total_price = $this->cart->items()->sum('total_price');
            $this->cart->save();
        }
    }
}
