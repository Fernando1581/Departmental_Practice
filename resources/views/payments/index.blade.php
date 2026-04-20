<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Payment History</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded relative">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded relative">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Total Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($orders as $order)
                        <tr>
                            <td class="px-6 py-4">#{{ $order->id }} - {{ $order->riceItem->name }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">₱ {{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $order->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $order->payment_status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($order->payment_status == 'Unpaid')
                                    <form action="{{ route('payments.process', $order->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="amount_paid" value="{{ $order->total_amount }}">
                                        <button type="submit" class="bg-purple-600 text-white px-3 py-1 rounded text-sm hover:bg-purple-700">Mark as Paid</button>
                                    </form>
                                @else
                                    <span class="text-gray-500 text-sm italic">Payment Completed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">No payment history.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>