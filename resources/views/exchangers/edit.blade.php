<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Exchanger') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('exchangers.update', $exchanger->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ $exchanger->name }}" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="balance" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Balance') }}</label>
                            <input type="number" id="balance" name="balance" value="{{ $exchanger->balance }}" step="0.01" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Location') }}</label>
                            <input type="text" id="location" name="location" value="{{ $exchanger->location }}" class="mt-1 block w-full rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Update Exchanger') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
