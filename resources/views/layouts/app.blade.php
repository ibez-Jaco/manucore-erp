<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore ERP - Dashboard')</title>
    <link rel="icon" type="image/svg+xml" href="/brand/app/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="app-sidebar w-64 text-white">
            <div class="p-4">
                <img src="/brand/app/logo.svg" alt="ManuCore ERP" class="h-8 mb-8">
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-20">Dashboard</a>
                    <a href="{{ route('dashboard.analytics') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-20">Analytics</a>
                    <div class="pt-4 mt-4 border-t border-white border-opacity-20">
                        <a href="{{ route('settings.index') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-20">Settings</a>
                        <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-20">Admin</a>
                    </div>
                </nav>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="app-topbar h-16 flex items-center px-6">
                <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                <div class="ml-auto flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Theme:</span>
                    <select id="theme-selector" class="erp-input w-32 py-1">
                        <option value="blue">Blue</option>
                        <option value="purple">Purple</option>
                        <option value="green">Green</option>
                        <option value="red">Red</option>
                        <option value="mixed">Mixed</option>
                    </select>
                </div>
            </header>
            <main class="flex-1 p-6 app-content overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
