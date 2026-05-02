<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 text-center">Add Rice Item</h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-[80vh]">
        <div class="bg-white rounded-lg shadow-sm border p-6 w-full max-w-2xl">
            <form method="POST" action="{{ route('rice.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rice Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price per Kilogram (₱)</label>
                    <input type="number" step="0.01" name="price_per_kg" value="{{ old('price_per_kg') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                    @error('price_per_kg')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity (kg)</label>
                    <input type="number" step="0.01" name="stock_quantity" value="{{ old('stock_quantity') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                    @error('stock_quantity')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('rice.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>