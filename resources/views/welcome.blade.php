<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CRM-Project') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="home-body">
    <div class="home-container">
        <!-- Simple Navigation -->
        <nav class="home-nav">
            <div class="home-nav-content">
                <div class="home-logo">
                    <!-- Logo or Branding here -->
                </div>
                <div class="home-auth-links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="home-nav-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="home-nav-link">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="home-nav-link">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Simple Content -->
        <main class="home-main-content">
            <div class="home-welcome-text">
                <h1 class="home-main-title">Welcome to CRM System</h1>
                <p class="home-main-description">Manage your business relationships effectively</p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="home-register-btn">
                        Get Started
                    </a>
                @endif
            </div>
        </main>

        <!-- Simple Footer -->
        <footer class="home-footer">
            <div class="home-footer-text">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
            </div>
        </footer>
    </div>
</body>
</html>