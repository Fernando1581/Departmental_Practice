<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Rice Items</h2>
            <a href="{{ route('rice.create') }}" class="bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600">+ Add Rice</a>
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
                    <th class="w-2/5 px-4 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                    <th class="w-1/5 px-4 py-3 text-left text-sm font-medium text-gray-500">Price/Kg</th>
                    <th class="w-1/5 px-4 py-3 text-left text-sm font-medium text-gray-500">Stock</th>
                    <th class="w-1/5 px-4 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($rice_items as $item)
                <tr>
                    <td class="px-4 py-3">
                        <div class="font-medium">{{ $item->name }}</div>
                        <div class="text-sm text-gray-500 truncate">{{ $item->description }}</div>
                    </td>
                    <td class="px-4 py-3">₱{{ number_format($item->price_per_kg, 2) }}</td>
                    <td class="px-4 py-3">{{ number_format($item->stock_quantity, 2) }} kg</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('rice.edit', $item) }}" class="text-sky-600 hover:text-sky-800 mr-3">Edit</a>
                        <form action="{{ route('rice.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-gray-500">No rice items found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>