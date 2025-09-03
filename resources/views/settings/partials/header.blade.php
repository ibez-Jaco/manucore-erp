@php
    // Drive theme chip from ApplyTheme middleware
    $resolvedTheme = $activeTheme ?? 'blue';
@endphp

<header class="panel-header h-16 flex items-center gap-4 px-6 bg-white/90 border-b border-gray-200 backdrop-blur supports-[backdrop-filter]:bg-white/60">
    {{-- Mobile: sidebar toggle --}}
    <button class="inline-flex items-center justify-center border border-gray-200 rounded-md sm:hidden h-9 w-9"
            @click="sidebarOpen = !sidebarOpen" aria-label="Toggle Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    {{-- Page title (from layout section) --}}
    <h1 class="text-xl font-semibold text-gray-800 truncate">
        @yield('header', 'System Panel')
    </h1>

    {{-- Right cluster --}}
    <div class="flex items-center gap-2 ml-auto">
        {{-- Theme chip links to Branding --}}
        <a href="{{ route('settings.branding.edit') }}"
           class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-sm border border-gray-200 hover:bg-gray-50 transition"
           title="Branding & Theme">
            <span class="inline-block w-3 h-3 rounded-full" style="background: var(--primary-1)"></span>
            <span class="text-gray-700 capitalize">{{ $resolvedTheme }}</span>
        </a>

        {{-- Back to dashboard (if present) --}}
        @if(\Illuminate\Support\Facades\Route::has('dashboard'))
            <a href="{{ route('dashboard') }}" class="erp-btn-secondary">
                Back to Dashboard
            </a>
        @endif>
    </div>
</header>
