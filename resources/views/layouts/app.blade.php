<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rice Shop Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Simple Navigation -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex space-x-6">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-sky-600 font-medium">Dashboard</a>
                <a href="{{ route('rice.index') }}" class="text-gray-700 hover:text-sky-600 font-medium">Rice Items</a>
                <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-sky-600 font-medium">Orders</a>
                <a href="{{ route('payments.index') }}" class="text-gray-700 hover:text-sky-600 font-medium">Payments</a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Page Header -->
    @isset($header)
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-4">
                {{ $header }}
            </div>
        </div>
    @endisset

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-6">
        {{ $slot }}
    </main>
</body>
</html>