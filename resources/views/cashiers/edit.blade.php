<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Cashier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('cashiers.update', $cashier->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ $cashier->name }}" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="total_exchanges" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Total Exchanges') }}</label>
                            <input type="number" id="total_exchanges" name="total_exchanges" value="{{ $cashier->total_exchanges }}" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="total_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Total Amount') }}</label>
                            <input type="number" id="total_amount" name="total_amount" value="{{ $cashier->total_amount }}" step="0.01" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="exchanger_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Exchanger') }}</label>
                            <select id="exchanger_id" name="exchanger_id" class="mt-1 block w-full rounded-md shadow-sm" required>
                                @foreach(App\Models\Exchanger::all() as $exchanger)
                                    <option value="{{ $exchanger->id }}" {{ $cashier->exchanger_id == $exchanger->id ? 'selected' : '' }}>
                                        {{ $exchanger->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Update Cashier') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
