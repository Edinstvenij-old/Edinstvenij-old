<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchanger;
use App\Models\Cashier;

class CurrencyExchangeController extends Controller
{
public function exchange(Request $request)
{
$amount = $request->input('amount');
$fromCurrency = $request->input('from_currency');
$toCurrency = $request->input('to_currency');
$exchangerId = $request->input('exchanger_id');
$cashierId = $request->input('cashier_id');

// Выполните обмен валют

// Обновите баланс обменника
$exchanger = Exchanger::find($exchangerId);
$exchanger->balance -= $amount; // Уменьшите баланс на сумму обмена
$exchanger->save();

// Обновите статистику кассира
$cashier = Cashier::find($cashierId);
$cashier->total_exchanges += 1; // Увеличьте счетчик обменов
$cashier->total_amount += $amount; // Увеличьте сумму обменов
$cashier->save();

return redirect()->back()->with('status', 'Exchange completed successfully!');
}
}
