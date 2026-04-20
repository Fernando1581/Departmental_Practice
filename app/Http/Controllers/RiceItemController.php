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

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
