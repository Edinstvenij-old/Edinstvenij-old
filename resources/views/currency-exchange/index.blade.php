<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Currency Exchange') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('currency-exchange.exchange') }}">
                        @csrf
                        <div>
                            <label for="amount">{{ __('Amount') }}</label>
                            <input type="number" id="amount" name="amount" step="0.01" required>
                        </div>
                        <div>
                            <label for="from_currency">{{ __('From Currency') }}</label>
                            <select id="from_currency" name="from_currency" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <!-- Добавьте другие валюты по мере необходимости -->
                            </select>
                        </div>
                        <div>
                            <label for="to_currency">{{ __('To Currency') }}</label>
                            <select id="to_currency" name="to_currency" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <!-- Добавьте другие валюты по мере необходимости -->
                            </select>
                        </div>
                        <div>
                            <button type="submit">{{ __('Exchange') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
