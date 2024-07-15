<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashier;
use App\Models\Exchanger;

class CashierController extends Controller
{
    public function index()
    {
        $cashiers = Cashier::with('exchanger')->get(); // Загрузка кассиров с их обменниками
        return view('cashiers.index', compact('cashiers'));
    }

    public function create()
    {
        $exchangers = Exchanger::all(); // Получение списка обменников для выбора
        return view('cashiers.create', compact('exchangers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_exchanges' => 'required|integer|min:0',
            'total_amount' => 'required|numeric|min:0',
            'exchanger_id' => 'required|exists:exchangers,id', // Добавлена валидация для внешнего ключа
        ]);

        Cashier::create($request->all());
        return redirect()->route('cashiers.index')->with('status', 'Cashier created successfully!');
    }

    public function edit($id)
    {
        $cashier = Cashier::findOrFail($id);
        $exchangers = Exchanger::all(); // Получение списка обменников для выбора
        return view('cashiers.edit', compact('cashier', 'exchangers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_exchanges' => 'required|integer|min:0',
            'total_amount' => 'required|numeric|min:0',
            'exchanger_id' => 'required|exists:exchangers,id', // Добавлена валидация для внешнего ключа
        ]);

        $cashier = Cashier::findOrFail($id);
        $cashier->update($request->all());

        return redirect()->route('cashiers.index')->with('status', 'Cashier updated successfully!');
    }

    public function destroy($id)
    {
        // Найти кассира по ID
        $cashier = Cashier::findOrFail($id);

        // Удалить кассира
        $cashier->delete();

        // Перенаправление с сообщением об успешном удалении
        return redirect()->route('cashiers.index')->with('status', 'Cashier deleted successfully!');
    }

}
