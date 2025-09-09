@php
    $pageTitle    = trim($__env->yieldContent('header')) ?: 'System Settings';
    $currentRoute = request()->route()->getName();

    $pageIcon = match($currentRoute) {
        'settings.index'           => 'settings',
        'settings.company'         => 'building-2',
        'settings.branding.edit'   => 'palette',
        'settings.branches.index'  => 'map-pin',
        'settings.templates.edit'  => 'mail',
        'admin.index'              => 'gauge',
        'admin.users'              => 'users',
        'admin.roles'              => 'shield-check',
        'admin.health'             => 'activity',
        'admin.logs'               => 'file-text',
        'admin.templates'          => 'file-text',   // <-- added mapping
        default                    => 'settings'
    };

    $isAdminRoute = str_starts_with($currentRoute, 'admin.');
@endphp

<div class="header-bar">
    {{-- (Removed header toggle to avoid duplication with sidebar toggle) --}}

    {{-- Left: Page info --}}
    <div class="header-left">
        <div class="header-page-info">
            <div class="header-page-icon {{ $isAdminRoute ? 'admin' : '' }}">
                @switch($pageIcon)
                    @case('palette')        <x-lucide-palette class="header-page-icon-svg" /> @break
                    @case('building-2')     <x-lucide-building-2 class="header-page-icon-svg" /> @break
                    @case('map-pin')        <x-lucide-map-pin class="header-page-icon-svg" /> @break
                    @case('mail')           <x-lucide-mail class="header-page-icon-svg" /> @break
                    @case('gauge')          <x-lucide-gauge class="header-page-icon-svg" /> @break
                    @case('users')          <x-lucide-users class="header-page-icon-svg" /> @break
                    @case('shield-check')   <x-lucide-shield-check class="header-page-icon-svg" /> @break
                    @case('activity')       <x-lucide-activity class="header-page-icon-svg" /> @break
                    @case('file-text')      <x-lucide-file-text class="header-page-icon-svg" /> @break
                    @default                <x-lucide-settings class="header-page-icon-svg" />
                @endswitch
            </div>
            <div class="header-page-details">
                <h1 class="header-page-title">{{ $pageTitle }}</h1>
                @if($isAdminRoute)
                    <div class="header-page-badge">System Administration</div>
                @else
                    <div class="header-page-badge">Business Settings</div>
                @endif
            </div>
        </div>
    </div>

    {{-- Center: search --}}
    <div class="header-search desktop-only">
        <div class="search-container">
            <x-lucide-search class="search-icon" />
            <input type="text"
                   class="search-input"
                   placeholder="Search settings, users, system..."
                   data-search="global"
                   id="global-search-input">
            <div class="search-shortcut"><kbd>⌘</kbd><kbd>K</kbd></div>
        </div>
    </div>

    {{-- Right: actions --}}
    <div class="header-actions">
        <div class="header-actions-desktop desktop-only">
            @if(Route::has('admin.health'))
            <a href="{{ route('admin.health') }}"
               class="header-action-btn"
               data-tooltip="System Health"
               data-tooltip-position="bottom">
                <x-lucide-activity class="header-action-icon" />
                <div class="header-notification-badge success"></div>
            </a>
            @endif

            {{-- Notifications (SweetAlert notice) --}}
            <button type="button"
                    class="header-action-btn notifications-toggle"
                    data-notifications-toggle
                    data-tooltip="Notifications"
                    data-tooltip-position="bottom">
                <x-lucide-bell class="header-action-icon" />
                <div class="header-notification-badge danger">3</div>
            </button>
        </div>

        {{-- Mobile search (SweetAlert notice for now) --}}
        <button type="button"
                class="header-action-btn mobile-only"
                id="mobile-search-btn"
                data-tooltip="Search"
                data-tooltip-position="bottom">
            <x-lucide-search class="header-action-icon" />
        </button>

        {{-- User Menu --}}
        @include('layouts.partials.user-menu')
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';

    const soon = (title, text='This feature is coming soon.') =>
        (window.Swal ? Swal.fire({icon:'info', title, text, confirmButtonColor: brand}) :
                       alert(`${title}\n\n${text}`));

    document.querySelector('[data-notifications-toggle]')?.addEventListener('click', () => {
        soon('Notifications', 'The notifications panel isn’t wired up yet. We’ll light it up soon.');
    });

    document.getElementById('mobile-search-btn')?.addEventListener('click', () => {
        soon('Search', 'Global search (⌘K) will ship in this module.');
    });

    document.getElementById('global-search-input')?.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            soon('Search', 'Search results UI is on the roadmap.');
        }
    });
});
</script>
