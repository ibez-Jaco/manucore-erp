<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="ManuCore ERP - Intelligent Manufacturing Resource Planning for modern manufacturers">
    
    <title>{{ config('app.name', 'ManuCore ERP') }} - @yield('title', 'Intelligent Manufacturing Resource Planning')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('brand/front/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('brand/front/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('brand/front/favicon-16x16.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/theme.css', 'resources/css/front.css'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    
    @include('front.partials.navigation')
    
    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
    
    @include('front.partials.footer')
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    
    <!-- Page Specific Scripts -->
    @stack('scripts')
    
    <!-- Global Script -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-xl', 'bg-white');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('shadow-xl');
                if (navbar.dataset.transparent === 'true') {
                    navbar.classList.add('bg-transparent');
                    navbar.classList.remove('bg-white');
                }
            }
        });
        
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>