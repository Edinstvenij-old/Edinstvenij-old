<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use App\Models\Exchanger;

class CashierController extends Controller
{
    public function index()
    {
        // Load cashiers with their associated exchangers
        $cashiers = Cashier::with('exchanger')->get();
        return view('cashiers.index', compact('cashiers'));
    }

    public function create()
    {
        // Fetch all exchangers for the dropdown
        $exchangers = Exchanger::all();
        return view('cashiers.create', compact('exchangers'));
    }

    public function store(Request $request)
    {
        \Log::info('Form Data:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'total_exchanges' => 'required|integer',
            'total_amount' => 'required|numeric',
            'exchanger_id' => 'required|exists:exchangers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cashier = new Cashier();
        $cashier->name = $request->name;
        $cashier->total_exchanges = $request->total_exchanges;
        $cashier->total_amount = $request->total_amount;
        $cashier->exchanger_id = $request->exchanger_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $cashier->photo_url = $path;
        }

        $cashier->save();

        return redirect()->route('cashiers.index')->with('status', 'Кассир успешно добавлен!');
    }


    public function edit($id)
    {
        // Find the cashier and fetch all exchangers
        $cashier = Cashier::findOrFail($id);
        $exchangers = Exchanger::all();
        return view('cashiers.edit', compact('cashier', 'exchangers'));
    }

    public function update(Request $request, Cashier $cashier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_exchanges' => 'required|integer',
            'total_amount' => 'required|numeric',
            'exchanger_id' => 'required|exists:exchangers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $cashier->name = $request->name;
        $cashier->total_exchanges = $request->total_exchanges;
        $cashier->total_amount = $request->total_amount;
        $cashier->exchanger_id = $request->exchanger_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $cashier->photo_url = $path;
        }

        $cashier->save();

        return redirect()->route('cashiers.index')->with('status', 'Cashier updated successfully!');
    }

    public function destroy($id)
    {
        $cashier = Cashier::findOrFail($id);
        $cashier->delete();

        return redirect()->route('cashiers.index')->with('status', 'Cashier deleted successfully!');
    }
}
