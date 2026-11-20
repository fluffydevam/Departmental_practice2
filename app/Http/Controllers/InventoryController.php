<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index(){
        $inventory = Inventory::with('user')->latest()->paginate(10);
        return view('inventory.index', compact('inventory'));
    }

    public function create(){
        $inventory = new Inventory();
        return view('inventory.create', compact('inventory'));
    }

    public function store(InventoryRequest $request){
        auth()->user()->inventory()->create($request->validated());
        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    public function show(Inventory $inventory){
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory){
        return view('inventory.edit', compact('inventory'));
    }

    public function update(InventoryRequest $request, Inventory $inventory){
        $inventory->update($request->validated());
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy(Inventory $inventory){
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}
