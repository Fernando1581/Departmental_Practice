<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Orders</h2>
            <a href="{{ route('orders.create') }}" class="bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600">+ New Order</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <table class="w-full table-fixed">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Order #</th>
                    <th class="w-1/4 px-4 py-3 text-left text-sm font-medium text-gray-500">Rice Item</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Quantity</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Total</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($orders as $order)
                <tr>
                    <td class="px-4 py-3">#{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->riceItem->name }}</td>
                    <td class="px-4 py-3">{{ $order->quantity }} kg</td>
                    <td class="px-4 py-3">₱{{ number_format($order->total_amount, 2) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded {{ $order->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $order->payment_status }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        @if($order->payment_status == 'Unpaid')
                            <a href="{{ route('orders.edit', $order) }}" class="text-sky-600 hover:text-sky-800 mr-3">Edit</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline" onsubmit="return confirm('Delete this order?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        @else
                            <span class="text-gray-400">Paid</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">No orders found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>