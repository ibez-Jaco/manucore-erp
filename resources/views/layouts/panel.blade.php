<!DOCTYPE html>
<html lang="en" data-theme="{{ $theme ?? 'blue' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ManuCore System Panel')</title>
    <link rel="icon" href="/brand/system/favicon.svg" type="image/svg+xml">
    @vite(['resources/css/theme.css', 'resources/css/panel.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-slate-800">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        @include('settings.partials.sidebar')

        {{-- Main content area --}}
        <div class="flex flex-col flex-1">
            {{-- Header --}}
            @include('settings.partials.header')

            <main class="flex-1 p-6 overflow-y-auto panel-content">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- SweetAlert2 flash notifications --}}
    @if (session('success'))
        <script>
            window.addEventListener('load', () => {
                if (window.Swal) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: @json(session('success')),
                        confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1')?.trim() || '#2171B5'
                    });
                }
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            window.addEventListener('load', () => {
                if (window.Swal) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: @json(session('error')),
                        confirmButtonColor: '#dc2626'
                    });
                }
            });
        </script>
    @endif
</body>
</html>
