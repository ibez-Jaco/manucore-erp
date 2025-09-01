<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore ERP')</title>
    
    <!-- Include all CSS files via Vite -->
    @vite(['resources/css/theme.css', 'resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="icon" href="/brand/app/favicon.svg" type="image/svg+xml">
    <style>
        .dashboard-stat { 
            background: linear-gradient(135deg, var(--primary-1), var(--primary-2)); 
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="erp-navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="/brand/app/logo.svg" alt="ManuCore ERP" class="h-8 w-auto">
                    <span class="ml-3 text-xl font-semibold text-white">ManuCore ERP</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Dashboard</a>
                    <a href="{{ route('dashboard.analytics') }}" class="text-white hover:text-gray-200">Analytics</a>
                    
                    @auth
                    <div class="relative">
                        <span class="text-white">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="ml-4 text-white hover:text-gray-200">Logout</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(isset($header) || View::hasSection('header'))
                <h1 class="text-3xl font-bold text-gray-900 mb-6">@yield('header', $header ?? '')</h1>
            @endif
            
            @yield('content')
        </div>
    </main>
</body>
</html>
