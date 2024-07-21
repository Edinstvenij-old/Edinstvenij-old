<x-app-layout>

    <div class="py-6">
        <!-- Currency Exchange Form -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('currency-exchange.exchange') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Amount') }}</label>
                            <input type="number" id="amount" name="amount" step="0.01" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="from_currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('From Currency') }}</label>
                            <select id="from_currency" name="from_currency" class="mt-1 block w-full rounded-md shadow-sm" required>
                                <option value="USD">USD (US Dollar)</option>
                                <option value="EUR">EUR (Euro)</option>
                                <option value="GBP">GBP (British Pound)</option>
                                <option value="JPY">JPY (Japanese Yen)</option>
                                <option value="UAH">UAH (Ukrainian Hryvnia)</option>
                                <option value="RUB">RUB (Russian Ruble)</option>
                                <!-- Add other currencies as needed -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="to_currency" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('To Currency') }}</label>
                            <select id="to_currency" name="to_currency" class="mt-1 block w-full rounded-md shadow-sm" required>
                                <option value="USD">USD (US Dollar)</option>
                                <option value="EUR">EUR (Euro)</option>
                                <option value="GBP">GBP (British Pound)</option>
                                <option value="JPY">JPY (Japanese Yen)</option>
                                <option value="UAH">UAH (Ukrainian Hryvnia)</option>
                                <option value="RUB">RUB (Russian Ruble)</option>
                                <!-- Add other currencies as needed -->
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exchanger_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Exchanger') }}</label>
                            <select id="exchanger_id" name="exchanger_id" class="mt-1 block w-full rounded-md shadow-sm" required>
                                @foreach(App\Models\Exchanger::all() as $exchanger)
                                    <option value="{{ $exchanger->id }}">{{ $exchanger->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="cashier_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Cashier') }}</label>
                            <select id="cashier_id" name="cashier_id" class="mt-1 block w-full rounded-md shadow-sm" required>
                                @foreach(App\Models\Cashier::all() as $cashier)
                                    <option value="{{ $cashier->id }}">{{ $cashier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Exchange') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Exchanger and Cashier Statistics -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Exchanger Statistics') }}</h3>
                    <ul>
                        @foreach(App\Models\Exchanger::all() as $exchanger)
                            <li>{{ $exchanger->name }}: Balance - {{ $exchanger->balance }}</li>
                        @endforeach
                    </ul>

                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-6">{{ __('Cashier Statistics') }}</h3>
                    <ul>
                        @foreach(App\Models\Cashier::all() as $cashier)
                            <li>{{ $cashier->name }}: Total Exchanges - {{ $cashier->total_exchanges }}, Total Amount - {{ $cashier->total_amount }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
