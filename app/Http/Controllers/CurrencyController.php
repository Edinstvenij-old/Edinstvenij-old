<?php

namespace App\Http\Controllers;

use App\Models\Exchanger;
use App\Models\Cashier;
use Illuminate\Http\Request;
use App\Services\CurrencyExchangeService;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyExchangeService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function showForm()
    {
        return view('currency-exchange');
    }

    public function exchange(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'from_currency' => 'required|string',
            'to_currency' => 'required|string',
            'exchanger_id' => 'required|exists:exchangers,id',
            'cashier_id' => 'required|exists:cashiers,id',
        ]);

        $amount = $request->input('amount');
        $fromCurrency = $request->input('from_currency');
        $toCurrency = $request->input('to_currency');
        $exchangeRate = $this->currencyService->getExchangeRate($fromCurrency, $toCurrency);

        if ($exchangeRate === null) {
            return redirect()->back()->with('error', 'Failed to retrieve exchange rate.');
        }

        $convertedAmount = $amount * $exchangeRate;

// Здесь вы можете сохранить данные обмена, обновить балансы и т.д.

        return redirect()->back()->with('success', "Converted Amount: $convertedAmount");
    }
}
