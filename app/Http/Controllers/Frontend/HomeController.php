<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get active categories
        $categories = Category::withCount(['products' => function($query) {
            $query->where('is_active', true);
        }])->get();

        // Get featured products (active products with images)
        $products = Product::where('is_active', true)
            ->with(['images', 'category'])
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // Get additional products for different sections if needed
        $featuredProducts = $products->take(4);
        $newProducts = $products->skip(4)->take(4);

        return view('frontend.home', compact('categories', 'products'));
    }
}