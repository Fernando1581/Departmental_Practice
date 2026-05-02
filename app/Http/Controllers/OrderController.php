<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RiceItem;
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
            return back()->with('error', 'Insufficient stock. Available: ' . $rice->stock_quantity . ' kg');
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

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        $rice_items = RiceItem::all();
        return view('orders.edit', compact('order', 'rice_items'));
    }

    public function update(Request $request, Order $order)
    {
        if ($order->payment_status === 'Paid') {
            return back()->with('error', 'Cannot update a paid order.');
        }

        $request->validate([
            'rice_item_id' => 'required|exists:rice_items,id',
            'quantity' => 'required|numeric|min:0.1',
        ]);

        // Restore old stock
        $oldRice = RiceItem::find($order->rice_item_id);
        $oldRice->increment('stock_quantity', $order->quantity);

        // Get new rice item and check stock
        $newRice = RiceItem::findOrFail($request->rice_item_id);
        
        if ($newRice->stock_quantity < $request->quantity) {
            // Rollback stock restoration
            $oldRice->decrement('stock_quantity', $order->quantity);
            return back()->with('error', 'Insufficient stock for new rice item.');
        }

        // Deduct new stock
        $newRice->decrement('stock_quantity', $request->quantity);
        
        // Update order
        $total_amount = $newRice->price_per_kg * $request->quantity;
        $order->update([
            'rice_item_id' => $request->rice_item_id,
            'quantity' => $request->quantity,
            'total_amount' => $total_amount,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        if ($order->payment_status === 'Paid') {
            return back()->with('error', 'Cannot delete a paid order.');
        }

        // Restore stock
        $rice = RiceItem::find($order->rice_item_id);
        $rice->increment('stock_quantity', $order->quantity);
        
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}