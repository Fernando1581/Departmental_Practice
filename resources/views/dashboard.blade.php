<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <!-- Total Rice Items -->
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex justify-between items-start">
                <p class="text-gray-500 text-sm">Total Rice Items</p>
                <p class="text-2xl font-bold text-sky-600 text-right">{{ \App\Models\RiceItem::count() }}</p>
            </div>
        </div>
        
        <!-- Total Orders -->
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex justify-between items-start">
                <p class="text-gray-500 text-sm">Total Orders</p>
                <p class="text-2xl font-bold text-sky-600 text-right">{{ \App\Models\Order::count() }}</p>
            </div>
        </div>
        
        <!-- Total Revenue -->
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="flex justify-between items-start">
                <p class="text-gray-500 text-sm">Total Revenue</p>
                <p class="text-2xl font-bold text-green-600 text-right">₱ {{ number_format(\App\Models\Order::where('payment_status', 'Paid')->sum('total_amount'), 2) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="font-bold text-lg mb-4">Recent Orders</h3>
        @php $recent = \App\Models\Order::with('riceItem')->latest()->take(5)->get(); @endphp
        @if($recent->count() > 0)
            <table class="w-full">
                <thead class="border-b">
                    <tr>
                        <th class="text-left py-2 text-sm font-medium text-gray-500">Order #</th>
                        <th class="text-left py-2 text-sm font-medium text-gray-500">Rice</th>
                        <th class="text-left py-2 text-sm font-medium text-gray-500">Qty</th>
                        <th class="text-left py-2 text-sm font-medium text-gray-500">Total</th>
                        <th class="text-left py-2 text-sm font-medium text-gray-500">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recent as $order)
                    <tr class="border-b">
                        <td class="py-2 text-sm">#{{ $order->id }}</td>
                        <td class="py-2 text-sm">{{ $order->riceItem->name }}</td>
                        <td class="py-2 text-sm">{{ $order->quantity }} kg</td>
                        <td class="py-2 text-sm">₱{{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-2">
                            <span class="px-2 py-1 text-xs rounded {{ $order->payment_status == 'Paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $order->payment_status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500 text-center py-4">No orders yet</p>
        @endif
    </div>
</x-app-layout>