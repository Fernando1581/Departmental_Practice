<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Manage Orders</h2>
            <a href="{{ route('orders.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md font-semibold text-xs uppercase hover:bg-green-700 shadow-sm">
                + Create New Order
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Rice Item</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Quantity (Kg)</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Total Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4">#{{ $order->id }}</td>
                            <td class="px-6 py-4">{{ $order->riceItem->name }}</td>
                            <td class="px-6 py-4">{{ $order->quantity }} kg</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">₱ {{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $order->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $order->payment_status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">No orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>