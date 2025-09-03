<!DOCTYPE html>
<html lang="en"
      data-theme="{{ $activeTheme ?? 'blue' }}"
      @if(!empty($activeThemeVars)) style="{{ $activeThemeVars }}" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ManuCore — System Panel')</title>

    {{-- Favicons / icons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('brand/system/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('brand/system/ManucoreIcon.png') }}" sizes="64x64">
    <link rel="apple-touch-icon" href="{{ asset('brand/system/ManucoreIcon.png') }}">

    {{-- Styles & App (theme first, then panel custom, then JS) --}}
    @vite([
        'resources/css/theme.css',
        'resources/css/panel.css',
        'resources/js/app.js'
    ])

    @stack('head')
</head>
<body class="antialiased text-gray-900 bg-gray-50"
      x-data="{ sidebarOpen: false }"
      data-theme="{{ $activeTheme ?? 'blue' }}"
      @if(($activeTheme ?? 'blue') === 'custom' && !empty($activeThemeVars))
          style="{{ $activeThemeVars }}"
      @endif
>
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('settings.partials.sidebar')

    {{-- Main column --}}
    <div class="flex flex-col flex-1 min-w-0">
        {{-- Header --}}
        @include('settings.partials.header')

        {{-- Content --}}
        <main class="flex-1 p-6 overflow-y-auto panel-content">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">@yield('header')</h1>
                @hasSection('subheader')
                    <p class="mt-1 text-gray-600">@yield('subheader')</p>
                @endif
            </header>

            @yield('content')
        </main>
    </div>
</div>

{{-- Global Flash (SweetAlert2) --}}
@include('components.flash')

@stack('scripts')
</body>
</html>
