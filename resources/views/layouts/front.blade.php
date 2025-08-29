<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore - Modern ERP Solutions')</title>
    <link rel="icon" type="image/svg+xml" href="/brand/front/favicon.svg">
    @vite(['resources/css/theme.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <nav class="front-nav text-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <img src="/brand/front/logo.svg" alt="ManuCore" class="h-8">
                <div class="flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:opacity-80">Home</a>
                    <a href="{{ route('about') }}" class="hover:opacity-80">About</a>
                    <a href="{{ route('contact') }}" class="hover:opacity-80">Contact</a>
                    <a href="{{ route('dashboard') }}" class="erp-btn-primary">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>
    <main>@yield('content')</main>
    <footer class="front-footer mt-16 py-8">
        <div class="container mx-auto px-4 text-center text-gray-600">
            <p>&copy; 2025 ManuCore ERP. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
