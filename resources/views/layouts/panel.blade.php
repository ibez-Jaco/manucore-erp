<!DOCTYPE html>
<html lang="en" data-theme="light" data-accent="{{ $activeAccent ?? 'blue' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ManuCore — System Panel')</title>

    {{-- Favicons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('brand/system/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('brand/system/ManucoreIcon.png') }}" sizes="64x64">
    <link rel="apple-touch-icon" href="{{ asset('brand/system/ManucoreIcon.png') }}">

    {{-- Custom theme variables (company accent overrides) --}}
    @if(!empty($activeThemeVars))
        <style id="company-custom-vars">:root { {!! $activeThemeVars !!} }</style>
    @endif

    {{-- ManuCore ERP CSS/JS Stack --}}
    @vite([
        'resources/css/theme.css',
        'resources/css/panel.css',
        'resources/css/dark-mode.css',
        'resources/js/app.js',
        'resources/js/manucore.js',
    ])

    @stack('head')
</head>
<body class="bg-neutral-50">
    <div class="dashboard-wrapper">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main content --}}
        <div class="main-content">
            {{-- Header --}}
            @include('layouts.partials.header')

            {{-- Page content --}}
            <div class="page-content">
                @hasSection('header')
                    <div class="page-header">
                        <div class="justify-between d-flex align-center">
                            <div class="flex-1 min-w-0">
                                <h1 class="page-title">@yield('header')</h1>
                                @hasSection('subheader')
                                    <p class="page-description">@yield('subheader')</p>
                                @endif
                            </div>
                            @hasSection('page-actions')
                                <div class="gap-3 d-flex align-center">
                                    @yield('page-actions')
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Flash alerts --}}
                @if(session('success'))
                    <div class="alert alert-success animate-slideDown">
                        <div class="alert-icon">✅</div>
                        <div class="alert-content">
                            <div class="alert-title">Success</div>
                            <div class="alert-message">{{ session('success') }}</div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-sm" onclick="this.parentElement.remove()" aria-label="Close">×</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger animate-slideDown">
                        <div class="alert-icon">❌</div>
                        <div class="alert-content">
                            <div class="alert-title">Error</div>
                            <div class="alert-message">{{ session('error') }}</div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-sm" onclick="this.parentElement.remove()" aria-label="Close">×</button>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="alert alert-warning animate-slideDown">
                        <div class="alert-icon">⚠️</div>
                        <div class="alert-content">
                            <div class="alert-title">Warning</div>
                            <div class="alert-message">{{ session('warning') }}</div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-sm" onclick="this.parentElement.remove()" aria-label="Close">×</button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger animate-slideDown">
                        <div class="alert-icon">⚠️</div>
                        <div class="alert-content">
                            <div class="alert-title">Please fix the following errors:</div>
                            <div class="alert-message">
                                <ul class="space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-sm" onclick="this.parentElement.remove()" aria-label="Close">×</button>
                    </div>
                @endif

                <div class="space-y-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- Session → Toast bridge --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.ManuCore) {
                @if(session('success')) ManuCore.showToast(@json(session('success')), 'success'); @endif
                @if(session('error'))   ManuCore.showToast(@json(session('error')), 'error');     @endif
                @if(session('warning')) ManuCore.showToast(@json(session('warning')), 'warning'); @endif
                @if($errors->any())     ManuCore.showToast('Please review the highlighted errors.', 'error'); @endif

                @if(config('app.debug'))
                console.log('🎨 Active Theme:', { accent: '{{ $activeAccent ?? 'blue' }}', hasCustomVars: {{ !empty($activeThemeVars) ? 'true' : 'false' }} });
                @endif
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
