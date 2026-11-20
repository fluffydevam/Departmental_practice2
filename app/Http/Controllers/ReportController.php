<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $inventory = $this->filteredInventory($request);

        return view('reports.index', compact('inventory'));
    }

    public function pdf(Request $request)
    {
        $inventory = $this->filteredInventory($request);

        return Pdf::loadView('reports.pdf', compact('inventory'))->download('inventory-report.pdf');
    }

    protected function filteredInventory(Request $request)
    {
        $query = Inventory::with('user')->latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability_status')) {
            $query->where('availability_status', $request->availability_status);
        }

        return $query->get();
    }
}
