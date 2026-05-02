<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rice Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-white to-sky-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 w-96">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Rice Shop</h1>
            <p class="text-gray-500 text-sm mt-1">Login to your account</p>
        </div>

        <!-- Pass and Email -->
        <div class="bg-sky-50 border border-sky-200 rounded-lg p-3 mb-4">
            <p class="text-xs text-sky-700">Email: <span class="font-mono font-bold">admin@gmail.com</span></p>
            <p class="text-xs text-sky-700">Password: <span class="font-mono font-bold">12345</span></p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    placeholder="admin@gmail.com"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-sky-500">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" required 
                    placeholder="•••••"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-sky-500">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-sky-500 text-white py-2 rounded-lg hover:bg-sky-600 transition">
                Login
            </button>
        </form>
    </div>
</body>
</html>