<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyExchangeService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.exchangerate.api_key');
    }

    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        $url = "https://v6.exchangerate-api.com/v6/{$this->apiKey}/latest/{$fromCurrency}";

        $response = Http::get($url);

        if ($response->successful()) {
            $rates = $response->json()['conversion_rates'];
            return $rates[$toCurrency] ?? null;
        }

        return null;
    }
}
