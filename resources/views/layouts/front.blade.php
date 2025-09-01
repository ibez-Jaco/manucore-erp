<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ManuCore - Modern ERP Solutions')</title>

    {{-- Basic SEO --}}
    <meta name="description" content="@yield('meta_description', 'Run your manufacturing on one modern ERP: quotes, customers, documents, audit logs, and professional PDFs.')">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="#2171B5">

    {{-- Icons (your real paths) --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('brand/front/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('brand/front/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('brand/front/ManucoreIcon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('brand/front/ManucoreIcon.png') }}">

    {{-- Social (safe defaults) --}}
    <meta property="og:title" content="@yield('og_title', 'ManuCore - Modern ERP Solutions')">
    <meta property="og:description" content="@yield('og_description', 'Modern manufacturing ERP with quoting, CRM, documents and audits.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('brand/front/ManucoreLogo.png') }}">

    {{-- Tailwind v4 + your theme + app JS --}}
    @vite(['resources/css/theme.css', 'resources/js/app.js'])

    {{-- Small CSS for the mobile menu (no frameworks) --}}
    <style>
        .nav-link { @apply text-sm font-medium text-[color:var(--gray-100)] hover:text-white; }
        .nav-cta  { @apply erp-btn erp-btn-primary; }
        .front-nav { background: linear-gradient(135deg, var(--primary-1), var(--primary-2)); }
        .mobile-menu { display: none; }
        @media (max-width: 768px) {
            .desktop-menu { display: none; }
            .mobile-menu { display: block; }
        }
    </style>
</head>
<body class="bg-[color:var(--gray-50)] text-[color:var(--gray-900)] antialiased">

    {{-- Top Navigation (no Alpine; minimal JS toggle) --}}
    <nav class="sticky top-0 z-40 text-white border-b front-nav backdrop-blur border-white/10">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between h-16">
                {{-- Brand (blue logo on light bg works; here header is a gradient so it pops) --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="ManuCore ERP Home">
                    <img src="{{ asset('brand/front/ManucoreLogo.png') }}" alt="ManuCore" class="block w-auto h-8" loading="eager" decoding="async">
                </a>

                {{-- Desktop nav --}}
                <div class="flex items-center space-x-8 desktop-menu">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    <a href="{{ route('dashboard') }}" class="nav-cta">Dashboard</a>
                </div>

                {{-- Mobile toggle --}}
                <button id="navToggle" class="mobile-menu erp-btn erp-btn-secondary" aria-controls="navSheet" aria-expanded="false">
                    Menu
                </button>
            </div>
        </div>

        {{-- Mobile sheet --}}
        <div id="navSheet" class="hidden md:hidden bg-white text-[color:var(--gray-900)] border-t border-[color:var(--gray-200)]">
            <div class="container px-4 py-3 mx-auto space-y-1">
                <a href="{{ route('home') }}" class="block py-2 text-[color:var(--gray-800)] hover:text-[color:var(--primary-1)]">Home</a>
                <a href="{{ route('about') }}" class="block py-2 text-[color:var(--gray-800)] hover:text-[color:var(--primary-1)]">About</a>
                <a href="{{ route('contact') }}" class="block py-2 text-[color:var(--gray-800)] hover:text-[color:var(--primary-1)]">Contact</a>
                <a href="{{ route('dashboard') }}" class="justify-center w-full mt-2 erp-btn erp-btn-primary">Dashboard</a>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="py-10 mt-16 front-footer">
        <div class="container px-4 mx-auto text-center">
            <div class="flex flex-col items-center gap-4">
                <img src="{{ asset('brand/front/ManucoreIcon.png') }}" alt="ManuCore Icon" class="w-8 h-8 opacity-90">
                <p class="text-sm text-white/80">&copy; {{ date('Y') }} ManuCore ERP. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- Tiny vanilla JS for the mobile menu; avoids Alpine/Livewire dependencies --}}
    <script>
        (function() {
            var btn = document.getElementById('navToggle');
            var sheet = document.getElementById('navSheet');
            if (!btn || !sheet) return;
            btn.addEventListener('click', function() {
                var isHidden = sheet.classList.contains('hidden');
                sheet.classList.toggle('hidden', !isHidden);
                btn.setAttribute('aria-expanded', String(isHidden));
            });
        })();
    </script>

    @stack('scripts')
</body>
</html>
