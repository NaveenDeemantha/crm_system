<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CRM-Project') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Simple Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <div class="text-xl font-semibold text-gray-800">
                        
                    </div>
                    <div class="space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Simple Content -->
        <main class="flex-grow flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to CRM System</h1>
                <p class="text-gray-600 mb-8">Manage your business relationships effectively</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Get Started
                    </a>
                @endif
            </div>
        </main>

        <!-- Simple Footer -->
        <footer class="bg-white py-4">
            <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
            </div>
        </footer>
    </div>
</body>
</html>
