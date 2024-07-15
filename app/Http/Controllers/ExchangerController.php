<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchanger;

class ExchangerController extends Controller
{
    public function index()
    {
        $exchangers = Exchanger::all();
        return view('exchangers.index', compact('exchangers'));
    }

    public function create()
    {
        return view('exchangers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
        ]);

        Exchanger::create($request->all());
        return redirect()->route('exchangers.index')->with('status', 'Exchanger created successfully!');
    }

    public function edit($id)
    {
        $exchanger = Exchanger::findOrFail($id);
        return view('exchangers.edit', compact('exchanger'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
        ]);

        $exchanger = Exchanger::findOrFail($id);
        $exchanger->update($request->all());

        return redirect()->route('exchangers.index')->with('status', 'Exchanger updated successfully!');
    }


    public function destroy($id)
    {
        $exchanger = Exchanger::findOrFail($id);
        $exchanger->delete();
        return redirect()->route('exchangers.index')->with('status', 'Exchanger deleted successfully!');
    }
}
