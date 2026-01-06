<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Enums\OrderStatus;
use App\Guards\OrderStatusGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * List all orders (global view)
     */
    public function index()
    {
        $orders = Order::with([
            'customer',
            'items.product',
            'items.seller',
        ])
            ->latest()
            ->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show full order details
     */
    public function show(Order $order)
    {
        $order->load([
            'customer',
            'items.product',
            'items.seller',
            'payments',
        ]);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Admin-controlled status update
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $current = $order->status->value;
        $next = $request->status;

        if (!OrderStatusGuard::canTransition($current, $next)) {
            return back()->withErrors([
                'status' => "Invalid transition: $current → $next",
            ]);
        }

        DB::transaction(function () use ($order, $next) {
            $order->update(['status' => $next]);

            /**
             * Optional hooks (future-ready):
             * - shipped → create shipment
             * - delivered → release seller payout
             * - cancelled → restore stock
             */
            if ($next === OrderStatus::Cancelled->value) {
                foreach ($order->items as $item) {
                    $item->product->increment('stock_quantity', $item->quantity);
                }
            }
        });

        return back()->with('success', 'Order status updated successfully.');
    }

    /**
     * Simple invoice view (HTML / PDF later)
     */
    public function invoice(Order $order)
    {
        $order->load([
            'customer',
            'items.product',
            'items.seller',
        ]);

        return view('admin.orders.invoice', compact('order'));
    }
}
