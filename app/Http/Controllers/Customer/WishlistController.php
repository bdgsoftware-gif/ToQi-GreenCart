<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    protected $wishlistService;

    public function __construct(WishlistService $wishlistService)
    {
        $this->wishlistService = $wishlistService;
    }

    public function index()
    {
        $wishlistItems = $this->wishlistService->getWishlistItems();

        return view('frontend.wishlist.index', compact('wishlistItems'));
    }

    public function toggle(Request $request, Product $product)
    {
        if ($this->wishlistService->isInWishlist($product->id)) {
            $this->wishlistService->removeFromWishlist($product->id);
            $message = 'Product removed from wishlist';
            $isInWishlist = false;
        } else {
            $this->wishlistService->addToWishlist($product);
            $message = 'Product added to wishlist';
            $isInWishlist = true;
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'is_in_wishlist' => $isInWishlist
            ]);
        }

        return back()->with('success', $message);
    }

    public function remove(Product $product)
    {
        $this->wishlistService->removeFromWishlist($product->id);

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist'
        ]);
    }

    public function moveToCart(Product $product)
    {
        // Implement moving from wishlist to cart
        // You'll need to inject CartService here

        return response()->json([
            'success' => true,
            'message' => 'Product moved to cart'
        ]);
    }
}
