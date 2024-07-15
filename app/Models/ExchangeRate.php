<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;

    public function exchange(Request $request)
    {
        $amount = $request->input('amount');
        $fromCurrency = $request->input('from_currency');
        $toCurrency = $request->input('to_currency');

        $fromRate = ExchangeRate::where('currency_code', $fromCurrency)->first()->rate;
        $toRate = ExchangeRate::where('currency_code', $toCurrency)->first()->rate;

        // Расчет
        $amountInUsd = $amount / $fromRate;
        $convertedAmount = $amountInUsd * $toRate;

        return view('exchange-result', ['amount' => $convertedAmount, 'currency' => $toCurrency]);
    }
}
