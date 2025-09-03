@php
    use Illuminate\Support\Facades\Route as _Route;

    $navActive = fn (string $pattern) =>
        request()->routeIs($pattern)
            ? 'bg-white/15 ring-1 ring-white/15'
            : 'hover:bg-white/10';

    // Optional phpMyAdmin URL (fallback to /phpmyadmin)
    $phpMyAdminUrl = config('app.phpmyadmin_url', env('PMA_URL', '/phpmyadmin'));
@endphp

<aside
    class="panel-sidebar w-64 text-white bg-[var(--primary-1)]/95 backdrop-blur supports-[backdrop-filter]:bg-[var(--primary-1)]/90
           hidden sm:flex sm:flex-col sm:relative z-30"
    :class="{'!block fixed inset-y-0 left-0 shadow-xl': sidebarOpen}"
    @click.outside="sidebarOpen = false"
    aria-label="Primary">

    {{-- Brand --}}
    <div class="flex items-center gap-3 p-4 border-b border-white/10">
        <img src="{{ asset('brand/system/ManucoreLogo.png') }}" alt="ManuCore System" class="w-auto h-8">
        <span class="font-medium text-sm/5 opacity-90">System Panel</span>
    </div>

    {{-- Nav --}}
    <nav class="p-4 space-y-6 overflow-y-auto">
        {{-- Settings --}}
        <div>
            <h3 class="mb-2 text-xs tracking-wider uppercase text-white/70">Settings</h3>

            <a href="{{ route('settings.index') }}"
               class="block px-4 py-2 rounded-md transition {{ $navActive('settings.index') }}"
               @click="sidebarOpen=false">
                Overview
            </a>

            <a href="{{ route('settings.company') }}"
               class="block px-4 py-2 rounded-md transition {{ $navActive('settings.company') }}"
               @click="sidebarOpen=false">
                Company
            </a>

            <a href="{{ route('settings.branches.index') }}"
               class="block px-4 py-2 rounded-md transition {{ $navActive('settings.branches.*') }}"
               @click="sidebarOpen=false">
                Branches
            </a>

            <a href="{{ route('settings.branding.edit') }}"
               class="block px-4 py-2 rounded-md transition {{ $navActive('settings.branding.*') }}"
               @click="sidebarOpen=false">
                Branding & Theme
            </a>

            {{-- NEW: Email Templates --}}
            <a href="{{ route('settings.templates.edit') }}"
               class="block px-4 py-2 rounded-md transition {{ $navActive('settings.templates.*') }}"
               @click="sidebarOpen=false">
                Email Templates
            </a>
        </div>

        {{-- Administration (only if routes exist) --}}
        @if(_Route::has('admin.index') || _Route::has('admin.users') || _Route::has('admin.roles'))
            <div>
                <h3 class="mb-2 text-xs tracking-wider uppercase text-white/70">Administration</h3>

                @if(_Route::has('admin.index'))
                    <a href="{{ route('admin.index') }}"
                       class="block px-4 py-2 rounded-md transition {{ $navActive('admin.index') }}"
                       @click="sidebarOpen=false">
                        Overview
                    </a>
                @endif

                @if(_Route::has('admin.users'))
                    <a href="{{ route('admin.users') }}"
                       class="block px-4 py-2 rounded-md transition {{ $navActive('admin.users') }}"
                       @click="sidebarOpen=false">
                        Users
                    </a>
                @endif

                @if(_Route::has('admin.roles'))
                    <a href="{{ route('admin.roles') }}"
                       class="block px-4 py-2 rounded-md transition {{ $navActive('admin.roles') }}"
                       @click="sidebarOpen=false">
                        Roles
                    </a>
                @endif
            </div>
        @endif
    </nav>

    {{-- Footer links (stick to bottom) --}}
    <div class="p-4 mt-auto border-t border-white/10">
        <a href="{{ $phpMyAdminUrl }}"
           target="_blank" rel="noopener noreferrer"
           class="flex items-center justify-between gap-2 px-4 py-2 transition rounded-md group bg-white/10 hover:bg-white/15">
            <span class="inline-flex items-center gap-2">
                {{-- Database icon --}}
                <svg class="w-4 h-4 opacity-90 group-hover:opacity-100" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 2C7.03 2 3 3.79 3 6v12c0 2.21 4.03 4 9 4s9-1.79 9-4V6c0-2.21-4.03-4-9-4Zm0 2c4.41 0 7 .99 7 2s-2.59 2-7 2-7-.99-7-2 2.59-2 7-2Zm7 6c0 1.01-2.59 2-7 2s-7-.99-7-2v-1.09C6.22 9.55 8.86 10 12 10s5.78-.45 7-1.09V10Zm0 4c0 1.01-2.59 2-7 2s-7-.99-7-2v-1.09C6.22 13.55 8.86 14 12 14s5.78-.45 7-1.09V14Zm0 4c0 1.01-2.59 2-7 2s-7-.99-7-2v-1.09C6.22 17.55 8.86 18 12 18s5.78-.45 7-1.09V18Z"/>
                </svg>
                <span>phpMyAdmin</span>
            </span>
            <svg class="w-4 h-4 opacity-70 group-hover:opacity-100" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707A1 1 0 018.707 5.293l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </a>
    </div>
</aside>
