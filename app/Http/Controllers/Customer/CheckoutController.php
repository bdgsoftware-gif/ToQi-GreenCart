<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = 

        $subtotal = $cartItems->sum('total_price');
        $shipping = $subtotal > 50 ? 0 : 5.99;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        return view('frontend.checkout.index', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function process(Request $request)
    {
        // This would process the order in a real application
        $paymentMethod = $request->payment_method;

        // For demo, just show success page
        return view('frontend.checkout.success');
    }
}
