<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h3 class="text-xl font-medium text-gray-700">Quick Actions</h3>
                <p class="text-gray-500 text-sm">Select a module below to manage your business.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <a href="{{ route('rice.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-xl hover:shadow-lg hover:-translate-y-1 transition transform duration-200 border-t-4 border-blue-500">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Rice Inventory</h4>
                            <p class="text-sm text-gray-500">Add, edit, or remove rice products.</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('orders.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-xl hover:shadow-lg hover:-translate-y-1 transition transform duration-200 border-t-4 border-green-500">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Manage Orders</h4>
                            <p class="text-sm text-gray-500">Create new orders and view sales.</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('payments.history') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-xl hover:shadow-lg hover:-translate-y-1 transition transform duration-200 border-t-4 border-purple-500">
                    <div class="p-6 flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Payments</h4>
                            <p class="text-sm text-gray-500">Update statuses and view receipts.</p>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout> 