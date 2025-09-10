@extends('layouts.panel')

@section('title', 'Admin - ManuCore ERP')
@section('header', 'System Administration')
@section('subheader', 'Central place to monitor health, run maintenance and jump to tools')

{{-- Optional page actions (use real routes if available) --}}
@section('page-actions')
    @if(Route::has('admin.backup'))
        <form id="admin-backup-form" class="d-inline" method="POST" action="{{ route('admin.backup') }}">
            @csrf
            <button type="submit" class="btn btn-secondary">🗄️ Run Backup</button>
        </form>
    @else
        <button type="button" class="btn btn-secondary" data-soon="Run Backup">🗄️ Run Backup</button>
    @endif

    @if(Route::has('admin.cache.clear'))
        <form id="admin-cache-form" class="d-inline" method="POST" action="{{ route('admin.cache.clear') }}">
            @csrf
            <button type="submit" class="btn btn-primary">🧹 Clear Cache</button>
        </form>
    @else
        <button type="button" class="btn btn-primary" data-soon="Clear Cache">🧹 Clear Cache</button>
    @endif
@endsection

@section('content')
<div class="space-y-6">
    {{-- Snapshot widgets --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-users class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($stats['users'] ?? 0) }}</div>
            <div class="widget-stat-label">Total Users</div>
            <div class="widget-stat-change positive">
                {{-- You can replace this with a real weekly delta later --}}
                &nbsp;
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-700);">
                    <x-lucide-activity class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($stats['sessions'] ?? 0) }}</div>
            <div class="widget-stat-label">Active Sessions</div>
            <div class="widget-stat-change {{ ($stats['sessions'] ?? 0) > 0 ? 'positive' : 'neutral' }}">
                {{ ($stats['sessions'] ?? 0) > 0 ? 'Active' : 'Idle' }}
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-700);">
                    <x-lucide-shield-check class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ ($stats['health_ok'] ?? false) ? '100%' : '—' }}</div>
            <div class="widget-stat-label">System Health</div>
            <div class="widget-stat-change {{ ($stats['health_ok'] ?? false) ? 'positive' : 'neutral' }}">
                {{ ($stats['health_ok'] ?? false) ? 'All checks passing' : 'Review' }}
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--neutral-100); color: var(--neutral-700);">
                    <x-lucide-gauge class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($stats['jobs'] ?? 0) }}</div>
            <div class="widget-stat-label">Queued Jobs</div>
            <div class="widget-stat-change {{ ($stats['jobs'] ?? 0) > 0 ? 'warning' : 'neutral' }}">
                {{ ($stats['jobs'] ?? 0) > 0 ? 'Processing' : 'Queue idle' }}
            </div>
        </div>
    </div>

    {{-- Two-column overview --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Services status --}}
        <div class="lg:col-span-1">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services Status</h3>
                </div>
                <div class="p-0 card-body">
                    <ul class="status-list">
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot success"></span>
                                <span class="status-name">App / PHP-FPM</span>
                            </div>
                            <span class="badge badge-success">Running</span>
                        </li>
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot success"></span>
                                <span class="status-name">MySQL 8</span>
                            </div>
                            <span class="badge badge-success">Connected</span>
                        </li>
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot success"></span>
                                <span class="status-name">Redis</span>
                            </div>
                            <span class="badge badge-success">OK</span>
                        </li>
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot neutral"></span>
                                <span class="status-name">Queue Worker</span>
                            </div>
                            <span class="badge badge-neutral">{{ ($stats['jobs'] ?? 0) > 0 ? 'Busy' : 'Idle' }}</span>
                        </li>
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot neutral"></span>
                                <span class="status-name">Mail</span>
                            </div>
                            <span class="badge badge-neutral">Ready</span>
                        </li>
                        <li class="status-row">
                            <div class="status-left">
                                <span class="status-dot success"></span>
                                <span class="status-name">Storage</span>
                            </div>
                            <span class="badge badge-success">Writable</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    @if(Route::has('admin.health'))
                        <a href="{{ route('admin.health') }}" class="btn btn-secondary btn-sm">View Health</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Health">View Health</button>
                    @endif
                    @if(Route::has('admin.logs'))
                        <a href="{{ route('admin.logs') }}" class="btn btn-secondary btn-sm">View Logs</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Logs">View Logs</button>
                    @endif
                </div>
            </div>
        </div>

        {{-- Recent admin activity --}}
        <div class="lg:col-span-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Admin Activity</h3>
                </div>
                <div class="card-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Event</th>
                                <th>User</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Today 09:14</td>
                                <td><span class="badge badge-primary">Role Update</span></td>
                                <td>admin@manucore.local</td>
                                <td>Assigned <strong>Manager</strong> to user #18</td>
                            </tr>
                            <tr>
                                <td>Yesterday 16:20</td>
                                <td><span class="badge badge-success">Backup</span></td>
                                <td>system</td>
                                <td>Nightly backup completed (34.2 MB)</td>
                            </tr>
                            <tr>
                                <td>Yesterday 10:05</td>
                                <td><span class="badge badge-warning">Config</span></td>
                                <td>admin@manucore.local</td>
                                <td>Cache cleared & config cached</td>
                            </tr>
                            <tr>
                                <td>2024-09-03 14:48</td>
                                <td><span class="badge badge-neutral">Login</span></td>
                                <td>ops@manucore.local</td>
                                <td>Successful login (2FA)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="gap-2 card-footer d-flex">
                    @if(Route::has('admin.users'))
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-sm">Manage Users</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Users">Manage Users</button>
                    @endif

                    @if(Route::has('admin.roles'))
                        <a href="{{ route('admin.roles') }}" class="btn btn-secondary btn-sm">Manage Roles</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Roles">Manage Roles</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Tools & shortcuts --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Maintenance & Tools</h3>
        </div>
        <div class="card-body">
            <div class="tool-grid">
                <div class="tool-item">
                    <div class="tool-icon brand">
                        <x-lucide-server class="w-4 h-4" />
                    </div>
                    <div class="tool-info">
                        <div class="tool-title">Horizon</div>
                        <div class="tool-desc">Queue monitoring dashboard</div>
                    </div>
                    @if(Route::has('horizon.index'))
                        <a href="{{ route('horizon.index') }}" class="btn btn-secondary btn-sm">Open</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Horizon">Open</button>
                    @endif
                </div>

                <div class="tool-item">
                    <div class="tool-icon success">
                        <x-lucide-database class="w-4 h-4" />
                    </div>
                    <div class="tool-info">
                        <div class="tool-title">Backup Now</div>
                        <div class="tool-desc">Create on-demand snapshot</div>
                    </div>
                    @if(Route::has('admin.backup'))
                        <button form="admin-backup-form" class="btn btn-primary btn-sm">Run</button>
                    @else
                        <button class="btn btn-primary btn-sm" data-soon="Run Backup">Run</button>
                    @endif
                </div>

                <div class="tool-item">
                    <div class="tool-icon warning">
                        <x-lucide-rotate-ccw class="w-4 h-4" />
                    </div>
                    <div class="tool-info">
                        <div class="tool-title">Clear Cache</div>
                        <div class="tool-desc">Config, routes & views</div>
                    </div>
                    @if(Route::has('admin.cache.clear'))
                        <button form="admin-cache-form" class="btn btn-secondary btn-sm">Clear</button>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Clear Cache">Clear</button>
                    @endif
                </div>

                <div class="tool-item">
                    <div class="tool-icon neutral">
                        <x-lucide-file-text class="w-4 h-4" />
                    </div>
                    <div class="tool-info">
                        <div class="tool-title">System Logs</div>
                        <div class="tool-desc">Review recent errors</div>
                    </div>
                    @if(Route::has('admin.logs'))
                        <a href="{{ route('admin.logs') }}" class="btn btn-secondary btn-sm">Open</a>
                    @else
                        <button class="btn btn-secondary btn-sm" data-soon="Logs">Open</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('head')
<style>
/* compact status list */
.status-list { list-style:none; margin:0; padding:0; }
.status-row {
    display:flex; align-items:center; justify-content:space-between;
    padding: var(--space-3) var(--space-4); border-bottom:1px solid var(--neutral-200);
}
.status-row:last-child { border-bottom:0; }
.status-left { display:flex; align-items:center; gap: var(--space-2); }
.status-name { font-weight:500; color: var(--neutral-800); }
.status-dot { width:10px; height:10px; border-radius:9999px; display:inline-block; background: var(--neutral-300); }
.status-dot.success { background: var(--success-500); }
.status-dot.neutral { background: var(--neutral-400); }

/* tool list */
.tool-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: var(--space-4); }
.tool-item {
    display:flex; align-items:center; gap: var(--space-3);
    padding: var(--space-4); border:1px solid var(--neutral-200); border-radius: var(--radius-lg);
    background: white;
}
.tool-icon { width:40px; height:40px; border-radius: var(--radius-lg); display:grid; place-items:center; flex-shrink:0;
    background: var(--neutral-100); color: var(--neutral-700); }
.tool-icon.brand   { background: var(--brand-100);   color: var(--brand-700); }
.tool-icon.success { background: var(--success-100); color: var(--success-700); }
.tool-icon.warning { background: var(--warning-100); color: var(--warning-700); }
.tool-icon.neutral { background: var(--neutral-100); color: var(--neutral-700); }
.tool-info { flex:1; min-width:0; }
.tool-title { font-weight:600; color: var(--neutral-900); }
.tool-desc { color: var(--neutral-600); font-size: var(--text-sm); }

@media (prefers-color-scheme: dark), (color-scheme: dark) {
    [data-theme="dark"] .tool-item { background: var(--neutral-800); border-color: var(--neutral-700); }
    [data-theme="dark"] .tool-title { color: var(--neutral-50); }
    [data-theme="dark"] .tool-desc  { color: var(--neutral-300); }
    [data-theme="dark"] .status-row { border-color: var(--neutral-700); }
    [data-theme="dark"] .status-name { color: var(--neutral-100); }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';

    const soon = (title, text='This tool is coming soon.') =>
        (window.Swal ? Swal.fire({icon:'info', title, text, confirmButtonColor: brand}) :
                       alert(`${title}\n\n${text}`));

    // “Coming soon” buttons
    document.querySelectorAll('[data-soon]')?.forEach(btn => {
        btn.addEventListener('click', (e) => { e.preventDefault(); soon(btn.getAttribute('data-soon')); });
    });

    // Confirm + submit for maintenance forms (if present)
    const wireConfirm = (formId, title, text) => {
        const form = document.getElementById(formId);
        if (!form) return;
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (window.Swal) {
                Swal.fire({
                    icon:'warning',
                    title, text,
                    showCancelButton:true,
                    confirmButtonText:'Proceed',
                    confirmButtonColor: brand
                }).then(res => { if (res.isConfirmed) form.submit(); });
            } else {
                if (confirm(`${title}\n\n${text}`)) form.submit();
            }
        }, { once: true });
    };

    wireConfirm('admin-backup-form', 'Run backup now?', 'This may take a minute and will use disk space.');
    wireConfirm('admin-cache-form',  'Clear and rebuild cache?', 'Config, routes and views will be refreshed.');
});
</script>
@endpush
