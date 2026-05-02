<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Payment History</h2>
            <a href="{{ route('payments.index') }}" class="bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600">Back to Payments</a>
        </div>
    </x-slot>

    <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <table class="w-full table-fixed">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Payment ID</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Order #</th>
                    <th class="w-1/4 px-4 py-3 text-left text-sm font-medium text-gray-500">Rice Item</th>
                    <th class="w-1/6 px-4 py-3 text-left text-sm font-medium text-gray-500">Amount</th>
                    <th class="w-1/3 px-4 py-3 text-left text-sm font-medium text-gray-500">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($orders as $order)
                <tr>
                    <td class="px-4 py-3">#{{ $order->payment->id ?? 'N/A' }}</td>
                    <td class="px-4 py-3">#{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->riceItem->name }}</td>
                    <td class="px-4 py-3">₱{{ number_format($order->total_amount, 2) }}</td>
                    <td class="px-4 py-3">{{ $order->updated_at->format('M d, Y H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">No payment records.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>