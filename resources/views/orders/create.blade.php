<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 text-center">New Order</h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-[80vh]">
        <div class="bg-white rounded-lg shadow-sm border p-6 w-full max-w-2xl">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select Rice Item</label>
                    <select name="rice_item_id" id="rice_item_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                        <option value="">Choose rice...</option>
                        @foreach($rice_items as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->price_per_kg }}">{{ $item->name }} - ₱{{ number_format($item->price_per_kg, 2) }}/kg (Stock: {{ $item->stock_quantity }} kg)</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity (kg)</label>
                    <input type="number" step="0.01" name="quantity" id="quantity" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-sky-500">
                </div>

                <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                    <p class="text-lg">Total Amount: ₱ <span id="total" class="font-bold">0.00</span></p>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">Create Order</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const riceSelect = document.getElementById('rice_item_id');
        const quantity = document.getElementById('quantity');
        const totalSpan = document.getElementById('total');
        
        function calculate() {
            const price = riceSelect.options[riceSelect.selectedIndex]?.dataset.price || 0;
            const qty = parseFloat(quantity.value) || 0;
            totalSpan.textContent = (price * qty).toFixed(2);
        }
        
        riceSelect.addEventListener('change', calculate);
        quantity.addEventListener('input', calculate);
    </script>
</x-app-layout>