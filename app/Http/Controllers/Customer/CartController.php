<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cart = $this->cartService->getCart();

        $cartItems = collect($cart['items'] ?? []);

        $subtotal = $cart['total_price'] ?? 0;
        $shipping = $subtotal > 5000 ? 0 : 100;
        $tax = $subtotal * 0.15;
        $total = $subtotal + $shipping + $tax;
        // dd($cartItems);
        return view('frontend.cart.index', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax' => $tax,
            'total' => $total
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1|max:' . $product->stock_quantity
        ]);

        $quantity = $request->quantity ?? 1;

        if ($product->stock_quantity < $quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock available'
            ], 422);
        }

        $this->cartService->addToCart($product, $quantity);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully',
            'cart_count' => $this->cartService->getCartCount()
        ]);
    }

    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $this->cartService->updateQuantity($itemId, $request->quantity);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully'
        ]);
    }

    public function remove($itemId)
    {
        $this->cartService->removeItem($itemId);

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart'
        ]);
    }

    public function clear()
    {
        $this->cartService->clearCart();

        return redirect()->route('cart.index')
            ->with('success', 'Cart cleared successfully');
    }

    public function getCartCount()
    {
        return response()->json([
            'count' => $this->cartService->getCartCount()
        ]);
    }
}
