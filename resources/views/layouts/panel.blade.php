<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore System Panel')</title>
    <link rel="icon" type="image/svg+xml" href="/brand/system/favicon.svg">
    @vite(['resources/css/panel.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <aside class="panel-sidebar w-64 text-white">
            <div class="p-4">
                <img src="/brand/system/logo.svg" alt="ManuCore System" class="h-8 mb-8">
                <nav class="space-y-4">
                    <div>
                        <h3 class="text-xs uppercase tracking-wider opacity-75 mb-2">Settings</h3>
                        <a href="{{ route('settings.index') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Overview</a>
                        <a href="{{ route('settings.company') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Company</a>
                        <a href="{{ route('settings.branches') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Branches</a>
                    </div>
                    <div>
                        <h3 class="text-xs uppercase tracking-wider opacity-75 mb-2">Administration</h3>
                        <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Overview</a>
                        <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Users</a>
                        <a href="{{ route('admin.roles') }}" class="block px-4 py-2 rounded hover:bg-white hover:bg-opacity-10">Roles</a>
                    </div>
                </nav>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="panel-header h-16 flex items-center px-6">
                <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'System Panel')</h1>
                <div class="ml-auto">
                    <a href="{{ route('dashboard') }}" class="erp-btn-secondary">Back to Dashboard</a>
                </div>
            </header>
            <main class="flex-1 p-6 panel-content overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
