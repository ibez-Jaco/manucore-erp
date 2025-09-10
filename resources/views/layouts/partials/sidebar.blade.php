@php
    use Illuminate\Support\Facades\Route;

    // Build Settings-side items
    $settingsItems = [];
    if (Route::has('settings.index'))          { $settingsItems[] = ['label'=>'Settings Dashboard','icon'=>'settings','route'=>'settings.index','active'=>request()->routeIs('settings.index')]; }
    if (Route::has('settings.company'))        { $settingsItems[] = ['label'=>'Company Profile','icon'=>'building-2','route'=>'settings.company','active'=>request()->routeIs('settings.company*')]; }
    if (Route::has('settings.branding.edit'))  { $settingsItems[] = ['label'=>'Branding & Theme','icon'=>'palette','route'=>'settings.branding.edit','active'=>request()->routeIs('settings.branding.*')]; }
    if (Route::has('settings.branches.index')) { $settingsItems[] = ['label'=>'Branches & Locations','icon'=>'map-pin','route'=>'settings.branches.index','active'=>request()->routeIs('settings.branches.*')]; }
    if (Route::has('settings.templates.edit')) { $settingsItems[] = ['label'=>'Email Templates','icon'=>'mail','route'=>'settings.templates.edit','active'=>request()->routeIs('settings.templates.*')]; }

    // Build Admin-side items (User Management lives here)
    $adminItems = [];
    if (Route::has('admin.index'))      { $adminItems[] = ['label'=>'Admin Dashboard','icon'=>'gauge','route'=>'admin.index','active'=>request()->routeIs('admin.index')]; }
    if (Route::has('admin.users'))      { $adminItems[] = ['label'=>'User Management','icon'=>'users','route'=>'admin.users','active'=>request()->routeIs('admin.users*')]; }
    if (Route::has('admin.roles'))      { $adminItems[] = ['label'=>'Role Management','icon'=>'shield-check','route'=>'admin.roles','active'=>request()->routeIs('admin.roles*')]; }
    if (Route::has('admin.health'))     { $adminItems[] = ['label'=>'System Health','icon'=>'activity','route'=>'admin.health','active'=>request()->routeIs('admin.health*')]; }
    if (Route::has('admin.logs'))       { $adminItems[] = ['label'=>'System Logs','icon'=>'file-text','route'=>'admin.logs','active'=>request()->routeIs('admin.logs*')]; }
    if (Route::has('admin.templates'))  { $adminItems[] = ['label'=>'System Templates','icon'=>'file-text','route'=>'admin.templates','active'=>request()->routeIs('admin.templates*')]; }

    $homeHref      = Route::has('settings.index') ? route('settings.index') : url('/system/settings');
    $dashboardHref = Route::has('dashboard') ? route('dashboard') : url('/dashboard');

    // Safer current view detection (no method calls on null)
    $route       = request()->route();
    $routeName   = $route ? $route->getName() : '';
    $currentView = (is_string($routeName) && str_starts_with($routeName, 'admin.')) ? 'admin' : 'settings';
@endphp

<div class="sidebar"
     x-data="{
         currentView: localStorage.getItem('manucore-sidebar-view') || '{{ $currentView }}',
         collapsed: localStorage.getItem('manucore-sidebar-collapsed') === 'true'
     }"
     x-init="window.dispatchEvent(new CustomEvent('sidebar-view-changed', { detail: currentView }));"
     :class="{ 'collapsed': collapsed }">

    <div class="sidebar-header">
        <a href="{{ $homeHref }}" class="sidebar-logo" @click.stop>
            <div class="sidebar-logo-full" :class="{ 'hidden': collapsed }">
                <img src="{{ asset('brand/system/ManucoreLogo.png') }}" alt="ManuCore ERP" class="sidebar-logo-image">
            </div>
            <div class="sidebar-logo-icon" :class="{ 'hidden': !collapsed }">
                <img src="{{ asset('brand/system/ManucoreIcon.png') }}" alt="M" class="sidebar-icon-image">
            </div>
        </a>

        <button type="button" class="sidebar-collapse-btn" aria-label="Toggle sidebar"
                @click="
                    collapsed = !collapsed;
                    localStorage.setItem('manucore-sidebar-collapsed', collapsed);
                    if (window.ManuCore) {
                        window.ManuCore.config.sidebarCollapsed = collapsed;
                        window.ManuCore.updateMainContentMargin();
                    }
                    $nextTick(() => document.querySelector('.sidebar').classList.toggle('collapsed', collapsed));
                ">
            <x-lucide-chevrons-left class="sidebar-collapse-icon" />
        </button>
    </div>

    @if(auth()->check() && auth()->user()->hasRole('Admin'))
    <div class="sidebar-view-toggle" :class="{ 'collapsed': collapsed }">
        <div class="view-toggle-container">
            <button type="button" class="view-toggle-btn"
                    :class="currentView === 'settings' ? 'active' : ''"
                    @click="
                        currentView = 'settings';
                        localStorage.setItem('manucore-sidebar-view', 'settings');
                        window.dispatchEvent(new CustomEvent('sidebar-view-changed', { detail: 'settings' }));
                        window.dispatchEvent(new CustomEvent('manucore-toast', { detail: { type:'info', title:'Switched to Business Settings' }}));
                    ">
                <x-lucide-settings class="view-toggle-icon" />
                <span class="view-toggle-text" :class="{ 'hidden': collapsed }">Business Settings</span>
            </button>

            <button type="button" class="view-toggle-btn admin"
                    :class="currentView === 'admin' ? 'active' : ''"
                    @click="
                        currentView = 'admin';
                        localStorage.setItem('manucore-sidebar-view', 'admin');
                        window.dispatchEvent(new CustomEvent('sidebar-view-changed', { detail: 'admin' }));
                        window.dispatchEvent(new CustomEvent('manucore-toast', { detail: { type:'info', title:'Switched to System Admin' }}));
                    ">
                <x-lucide-shield-check class="view-toggle-icon" />
                <span class="view-toggle-text" :class="{ 'hidden': collapsed }">System Admin</span>
            </button>
        </div>
    </div>
    @endif

    <div class="sidebar-nav" @sidebar-view-changed.window="currentView = $event.detail">
        {{-- Settings --}}
        <div x-show="currentView === 'settings'" x-transition:enter="animate-fadeIn" x-cloak>
            <div class="nav-section">
                <div class="nav-section-title" :class="{ 'collapsed': collapsed }">
                    <x-lucide-settings class="nav-section-icon" />
                    <span :class="{ 'hidden': collapsed }">Business Settings</span>
                </div>
                @foreach ($settingsItems as $item)
                    <div class="nav-item">
                        <a href="{{ route($item['route']) }}"
                           class="nav-link {{ $item['active'] ? 'active' : '' }}"
                           @click.stop
                           @if($item['active']) aria-current="page" @endif>
                            <div class="nav-icon">
                                @switch($item['icon'])
                                    @case('palette')     <x-lucide-palette class="nav-icon-svg" /> @break
                                    @case('building-2')  <x-lucide-building-2 class="nav-icon-svg" /> @break
                                    @case('map-pin')     <x-lucide-map-pin class="nav-icon-svg" /> @break
                                    @case('mail')        <x-lucide-mail class="nav-icon-svg" /> @break
                                    @case('users')       <x-lucide-users class="nav-icon-svg" /> @break
                                    @case('settings')    <x-lucide-settings class="nav-icon-svg" /> @break
                                    @default             <div class="nav-icon-placeholder"></div>
                                @endswitch
                            </div>
                            <div class="nav-text" :class="{ 'hidden': collapsed }">{{ $item['label'] }}</div>
                            @if($item['active'])
                                <div class="nav-active-indicator"></div>
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Admin --}}
        @if(auth()->check() && auth()->user()->hasRole('Admin'))
        <div x-show="currentView === 'admin'" x-transition:enter="animate-fadeIn" x-cloak>
            <div class="nav-section">
                <div class="nav-section-title admin" :class="{ 'collapsed': collapsed }">
                    <x-lucide-shield-alert class="nav-section-icon" />
                    <span :class="{ 'hidden': collapsed }">System Administration</span>
                </div>
                @foreach ($adminItems as $item)
                    <div class="nav-item">
                        <a href="{{ route($item['route']) }}"
                           class="nav-link admin {{ $item['active'] ? 'active' : '' }}"
                           @click.stop
                           @if($item['active']) aria-current="page" @endif>
                            <div class="nav-icon">
                                @switch($item['icon'])
                                    @case('gauge')          <x-lucide-gauge class="nav-icon-svg" /> @break
                                    @case('users')          <x-lucide-users class="nav-icon-svg" /> @break
                                    @case('shield-check')   <x-lucide-shield-check class="nav-icon-svg" /> @break
                                    @case('activity')       <x-lucide-activity class="nav-icon-svg" /> @break
                                    @case('file-text')      <x-lucide-file-text class="nav-icon-svg" /> @break
                                    @default                <div class="nav-icon-placeholder admin"></div>
                                @endswitch
                            </div>
                            <div class="nav-text" :class="{ 'hidden': collapsed }">{{ $item['label'] }}</div>
                            @if($item['active'])
                                <div class="nav-active-indicator admin"></div>
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <div class="sidebar-footer">
        <a href="{{ $dashboardHref }}" class="sidebar-user" @click.stop>
            <div class="sidebar-user-avatar">
                <x-lucide-arrow-left class="sidebar-user-icon" />
            </div>
            <div class="sidebar-user-info" :class="{ 'hidden': collapsed }">
                <div class="sidebar-user-name">Back to Dashboard</div>
                <div class="sidebar-user-role">Main Application</div>
            </div>
        </a>
    </div>
</div>

<style>
.sidebar.collapsed .sidebar-collapse-btn { opacity: 0; pointer-events: none; transform: translateY(-50%) scale(0.95); }
.sidebar.collapsed:hover .sidebar-collapse-btn { opacity: 1; pointer-events: auto; transform: translateY(-50%) scale(1); }
.sidebar.collapsed .sidebar-collapse-btn { right: 8px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    window.addEventListener('manucore-toast', (e) => {
        const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';
        const { type = 'info', title = 'Notice', text = '' } = e.detail || {};
        if (window.Swal) {
            Swal.fire({
                icon: type, title, text,
                timer: 1500, showConfirmButton: false,
                timerProgressBar: true, confirmButtonColor: brand,
                toast: true, position: 'top-end'
            });
        } else if (window.ManuCore?.showToast) {
            ManuCore.showToast(title, type);
        }
    });
});
</script>
