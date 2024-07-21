<?php

use App\Http\Controllers\CurrencyExchangeController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ExchangeRates;
use App\Http\Controllers\ExchangerController;
use App\Http\Controllers\CashierController;

Route::middleware(['auth'])->group(function () {
    Route::resource('cashiers', CashierController::class);
    Route::resource('exchangers', ExchangerController::class);
});

Route::delete('/cashiers/{id}', [CashierController::class, 'destroy'])
    ->name('cashiers.destroy');

Route::get('/currency-exchange', [CurrencyExchangeController::class, 'index'])
    ->name('currency-exchange');
Route::post('/currency-exchange', [CurrencyExchangeController::class, 'exchange'])
    ->name('currency-exchange.exchange');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/exchange-rates', ExchangeRates::class)
    ->name('exchange-rates');

Route::view('/', 'welcome');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
