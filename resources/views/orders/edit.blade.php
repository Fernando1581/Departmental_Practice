<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 text-center">Edit Order #{{ $order->id }}</h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-[80vh]">
        <div class="bg-white rounded-lg shadow-sm border p-6 w-full max-w-2xl">
            <form method="POST" action="{{ route('orders.update', $order) }}">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rice Item</label>
                    <select name="rice_item_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                        @foreach($rice_items as $item)
                            <option value="{{ $item->id }}" {{ $order->rice_item_id == $item->id ? 'selected' : '' }}>{{ $item->name }} - ₱{{ number_format($item->price_per_kg, 2) }}/kg</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity (kg)</label>
                    <input type="number" step="0.01" name="quantity" value="{{ $order->quantity }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>