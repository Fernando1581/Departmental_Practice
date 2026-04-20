<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $orders = Order::with('riceItem')->get();
        return view('payments.index', compact('orders'));
    }

    public function processPayment(Request $request, Order $order)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:' . $order->total_amount,
        ]);

        if ($order->payment_status === 'Paid') {
            return back()->with('error', 'Order is already paid.');
        }

        // Record Payment
        Payment::create([
            'order_id' => $order->id,
            'amount_paid' => $request->amount_paid,
        ]);

        // Update Order Status
        $order->update(['payment_status' => 'Paid']);

        return redirect()->route('payments.history')->with('success', 'Payment processed.');
    }
}
