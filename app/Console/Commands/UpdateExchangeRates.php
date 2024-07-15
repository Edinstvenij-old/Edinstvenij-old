<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ExchangeRate;

class UpdateExchangeRates extends Command
{
protected $signature = 'exchange-rates:update';
protected $description = 'Update exchange rates from API';

public function __construct()
{
parent::__construct();
}

public function handle()
{
$response = Http::get('https://api.exchangerate-api.com/v4/latest/USD'); // Пример API запроса
$rates = $response->json('rates');

foreach ($rates as $currency => $rate) {
ExchangeRate::updateOrCreate(
['currency_code' => $currency],
['rate' => $rate]
);
}

$this->info('Exchange rates updated successfully.');
}
}
