<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('riceItem')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $rice_items = RiceItem::where('stock_quantity', '>', 0)->get();
        return view('orders.create', compact('rice_items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_item_id' => 'required|exists:rice_items,id',
            'quantity' => 'required|numeric|min:0.1',
        ]);

        $rice = RiceItem::findOrFail($request->rice_item_id);
        
        // Check stock
        if ($rice->stock_quantity < $request->quantity) {
            return back()->with('error', 'Insufficient stock.');
        }

        // Compute Total Cost
        $total_amount = $rice->price_per_kg * $request->quantity;

        // Deduct stock and save order
        $rice->decrement('stock_quantity', $request->quantity);
        
        Order::create([
            'rice_item_id' => $rice->id,
            'quantity' => $request->quantity,
            'total_amount' => $total_amount,
            'payment_status' => 'Unpaid'
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created.');
    }
}
