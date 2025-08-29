#!/bin/bash

echo "Creating ManuCore ERP Phase 0 Views..."

# Create layouts/front.blade.php
cat > resources/views/layouts/front.blade.php << 'EOF'
<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore - Modern ERP Solutions')</title>
    <link rel="icon" type="image/svg+xml" href="/brand/front/favicon.svg">
    @vite(['resources/css/front.css', 'resources/js/app.js'])
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
EOF

# Create layouts/app.blade.php
cat > resources/views/layouts/app.blade.php << 'EOF'
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
EOF

# Create layouts/panel.blade.php
cat > resources/views/layouts/panel.blade.php << 'EOF'
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
EOF

# Create front views
cat > resources/views/front/home.blade.php << 'EOF'
@extends('layouts.front')
@section('title', 'ManuCore - Modern ERP Solutions')
@section('content')
<div class="front-hero text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to ManuCore ERP</h1>
        <p class="text-xl mb-8">Modern Manufacturing Resource Planning</p>
        <a href="{{ route('dashboard') }}" class="erp-btn bg-white text-blue-600 hover:bg-gray-100">Get Started</a>
    </div>
</div>
<div class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="erp-card">
            <h3 class="erp-header mb-4">Customer Management</h3>
            <p class="text-gray-600">Comprehensive CRM capabilities.</p>
        </div>
        <div class="erp-card">
            <h3 class="erp-header mb-4">Quote Builder</h3>
            <p class="text-gray-600">Dynamic quote generation.</p>
        </div>
        <div class="erp-card">
            <h3 class="erp-header mb-4">Document Management</h3>
            <p class="text-gray-600">Secure document storage.</p>
        </div>
    </div>
</div>
@endsection
EOF

cat > resources/views/front/about.blade.php << 'EOF'
@extends('layouts.front')
@section('title', 'About - ManuCore ERP')
@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="erp-header text-3xl mb-8">About ManuCore ERP</h1>
    <div class="erp-card">
        <p class="text-gray-600 mb-4">ManuCore ERP is a comprehensive Enterprise Resource Planning solution.</p>
        <p class="text-gray-600">Built with Laravel 12 and modern web technologies.</p>
    </div>
</div>
@endsection
EOF

cat > resources/views/front/contact.blade.php << 'EOF'
@extends('layouts.front')
@section('title', 'Contact - ManuCore ERP')
@section('content')
<div class="container mx-auto px-4 py-16">
    <h1 class="erp-header text-3xl mb-8">Contact Us</h1>
    <div class="erp-card max-w-2xl mx-auto">
        <form class="space-y-4">
            <div>
                <label class="erp-label">Name</label>
                <input type="text" class="erp-input" placeholder="Your name">
            </div>
            <div>
                <label class="erp-label">Email</label>
                <input type="email" class="erp-input" placeholder="your@email.com">
            </div>
            <div>
                <label class="erp-label">Message</label>
                <textarea class="erp-input" rows="4" placeholder="Your message"></textarea>
            </div>
            <button type="submit" class="erp-btn-primary">Send Message</button>
        </form>
    </div>
</div>
@endsection
EOF

# Create app views
cat > resources/views/app/dashboard.blade.php << 'EOF'
@extends('layouts.app')
@section('title', 'Dashboard - ManuCore ERP')
@section('header', 'Dashboard')
@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Total Customers</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['customers'] ?? 0 }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Active Quotes</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['quotes'] ?? 0 }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Revenue (ZAR)</h3>
            <p class="text-3xl font-bold mt-2">R{{ number_format($stats['revenue'] ?? 0, 2) }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Pending Tasks</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['pending'] ?? 0 }}</p>
        </div>
    </div>
    <div class="erp-card">
        <h2 class="erp-header mb-4">Recent Activity</h2>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-sm">New customer registered</span>
                <span class="erp-badge">2 hours ago</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-sm">Quote approved</span>
                <span class="erp-badge">4 hours ago</span>
            </div>
        </div>
    </div>
</div>
@endsection
EOF

cat > resources/views/app/analytics.blade.php << 'EOF'
@extends('layouts.app')
@section('title', 'Analytics - ManuCore ERP')
@section('header', 'Analytics')
@section('content')
<div class="erp-card">
    <h2 class="erp-header mb-4">Business Analytics</h2>
    <p class="text-gray-600">Analytics features will be available in Phase 2.</p>
</div>
@endsection
EOF

# Create settings views
cat > resources/views/settings/index.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Settings - ManuCore ERP')
@section('header', 'Business Settings')
@section('content')
<div class="erp-card">
    <h2 class="erp-header mb-4">Settings Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('settings.company') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="font-semibold text-lg mb-2">Company Information</h3>
            <p class="text-sm text-gray-600">Manage company details</p>
        </a>
        <a href="{{ route('settings.branches') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="font-semibold text-lg mb-2">Branches</h3>
            <p class="text-sm text-gray-600">Configure branches</p>
        </a>
    </div>
</div>
@endsection
EOF

cat > resources/views/settings/company.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Company Settings - ManuCore ERP')
@section('header', 'Company Information')
@section('content')
<div class="erp-card">
    <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="erp-label">Company Name</label>
                <input type="text" class="erp-input" value="ManuCore Industries">
            </div>
            <div>
                <label class="erp-label">Registration Number</label>
                <input type="text" class="erp-input" value="2025/123456/07">
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <button type="button" class="erp-btn-secondary">Cancel</button>
            <button type="submit" class="erp-btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
EOF

cat > resources/views/settings/branches.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Branches - ManuCore ERP')
@section('header', 'Branch Management')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">Branches</h2>
        <button class="erp-btn-primary">Add Branch</button>
    </div>
    <table class="erp-table">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-3 text-left">Branch Name</th>
                <th class="px-4 py-3 text-left">Location</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3">Head Office</td>
                <td class="px-4 py-3">Johannesburg</td>
                <td class="px-4 py-3"><span class="erp-badge">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
EOF

# Create admin views
cat > resources/views/admin/index.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Admin - ManuCore ERP')
@section('header', 'System Administration')
@section('content')
<div class="erp-card">
    <h2 class="erp-header mb-4">Admin Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-3xl font-bold mt-2">24</p>
        </div>
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">Active Sessions</h3>
            <p class="text-3xl font-bold mt-2">8</p>
        </div>
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">System Health</h3>
            <p class="text-3xl font-bold mt-2">100%</p>
        </div>
    </div>
</div>
@endsection
EOF

cat > resources/views/admin/users.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Users - ManuCore ERP')
@section('header', 'User Management')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">System Users</h2>
        <button class="erp-btn-primary">Add User</button>
    </div>
    <table class="erp-table">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-3">Admin User</td>
                <td class="px-4 py-3">admin@manucore.co.za</td>
                <td class="px-4 py-3">Administrator</td>
                <td class="px-4 py-3"><span class="erp-badge">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
EOF

cat > resources/views/admin/roles.blade.php << 'EOF'
@extends('layouts.panel')
@section('title', 'Roles & Permissions - ManuCore ERP')
@section('header', 'Roles & Permissions')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">System Roles</h2>
        <button class="erp-btn-primary">Add Role</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Administrator</h3>
            <p class="text-sm text-gray-600">Full system access</p>
        </div>
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Manager</h3>
            <p class="text-sm text-gray-600">Business operations</p>
        </div>
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Staff</h3>
            <p class="text-sm text-gray-600">Limited access</p>
        </div>
    </div>
</div>
@endsection
EOF

# Create 404 error page
cat > resources/views/errors/404.blade.php << 'EOF'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    @vite(['resources/css/theme.css'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-blue-600 mb-4">404</h1>
        <p class="text-xl text-gray-600 mb-8">Page not found</p>
        <a href="/" class="erp-btn-primary">Go Home</a>
    </div>
</body>
</html>
EOF

echo "Views created successfully!"
