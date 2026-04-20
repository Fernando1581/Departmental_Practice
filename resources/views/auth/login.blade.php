<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Rice Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased flex h-screen bg-gray-100 items-center justify-center">

    <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Rice System</h1>
            <p class="text-sm text-gray-500 mt-1">Sign in to your account</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" name="email" value="admin@example.com" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" value="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-3 border">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Log in
                </button>
            </div>
        </form>
    </div>

</body>
</html>