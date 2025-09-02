<aside class="w-64 text-white panel-sidebar">
    <div class="p-4">
        <a href="{{ route('settings.index') }}" class="inline-flex items-center gap-2 mb-8">
            <img src="/brand/system/logo.svg" alt="ManuCore System" class="h-8">
            <span class="font-semibold">System</span>
        </a>

        <nav class="space-y-6">
            <div>
                <h3 class="mb-2 text-xs tracking-wider uppercase opacity-75">Settings</h3>
                <a href="{{ route('settings.index') }}"
                   class="panel-link {{ request()->routeIs('settings.index') ? 'panel-link-active' : '' }}">Overview</a>
                <a href="{{ route('settings.company') }}"
                   class="panel-link {{ request()->routeIs('settings.company') ? 'panel-link-active' : '' }}">Company</a>
                <a href="{{ route('settings.branches') }}"
                   class="panel-link {{ request()->routeIs('settings.branches') ? 'panel-link-active' : '' }}">Branches</a>
                <a href="{{ route('settings.branding.edit') }}"
                   class="panel-link {{ request()->routeIs('settings.branding.*') ? 'panel-link-active' : '' }}">Branding</a>
            </div>

            <div>
                <h3 class="mb-2 text-xs tracking-wider uppercase opacity-75">Administration</h3>
                <a href="{{ route('admin.index') }}"  class="panel-link">Overview</a>
                <a href="{{ route('admin.users') }}"  class="panel-link">Users</a>
                <a href="{{ route('admin.roles') }}"  class="panel-link">Roles</a>
            </div>
        </nav>
    </div>
</aside>
