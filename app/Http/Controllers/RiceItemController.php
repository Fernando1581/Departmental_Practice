<?php

namespace App\Http\Controllers;

use App\Models\RiceItem;
use Illuminate\Http\Request;

class RiceItemController extends Controller
{
    public function index()
    {
        $rice_items = RiceItem::all();
        return view('rice.index', compact('rice_items'));
    }

    public function create()
    {
        return view('rice.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        RiceItem::create($validated);
        return redirect()->route('rice.index')->with('success', 'Rice item added successfully.');
    }

    public function edit(RiceItem $rice)
    {
        return view('rice.edit', compact('rice'));
    }

    public function update(Request $request, RiceItem $rice)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'stock_quantity' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $rice->update($validated);
        return redirect()->route('rice.index')->with('success', 'Rice item updated successfully.');
    }

    public function destroy(RiceItem $rice)
    {
        // Check if rice item has orders
        if ($rice->orders()->count() > 0) {
            return redirect()->route('rice.index')->with('error', 'Cannot delete rice item with existing orders.');
        }
        
        $rice->delete();
        return redirect()->route('rice.index')->with('success', 'Rice item deleted successfully.');
    }
}