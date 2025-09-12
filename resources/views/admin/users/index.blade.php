@extends('layouts.panel')

@section('title', 'Users — ManuCore ERP')
@section('header', 'User Management')
@section('subheader', 'Search, manage status, assign roles, and edit users.')

@section('page-actions')
    <form method="GET" action="{{ route('admin.users') }}" class="d-inline">
        <div class="gap-2 d-flex">
            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Search name or email..." class="input input-sm" />
            <select name="status" class="input input-sm">
                <option value="">All</option>
                <option value="active" @selected(($status ?? '')==='active')>Active</option>
                <option value="inactive" @selected(($status ?? '')==='inactive')>Inactive</option>
            </select>
            <select name="sort" class="input input-sm">
                @php $sort = $sort ?? 'created_at'; $dir = $dir ?? 'desc'; @endphp
                <option value="created_at" @selected($sort==='created_at')>Joined</option>
                <option value="name" @selected($sort==='name')>Name</option>
                <option value="email" @selected($sort==='email')>Email</option>
                <option value="is_active" @selected($sort==='is_active')>Status</option>
            </select>
            <select name="dir" class="input input-sm">
                <option value="desc" @selected($dir==='desc')>Desc</option>
                <option value="asc" @selected($dir==='asc')>Asc</option>
            </select>
            <button class="btn btn-secondary btn-sm">Filter</button>
            @if(!empty($q) || !empty($status))
                <a class="btn btn-ghost btn-sm" href="{{ route('admin.users') }}">Clear</a>
            @endif
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">+ Create User</a>
        </div>
    </form>
@endsection

@section('content')
<div class="space-y-6">
    {{-- Snapshot cards --}}
    <div class="widget-grid widget-grid-3">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-users class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['users']) }}</div>
            <div class="widget-stat-label">Total Users</div>
        </div>
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-700);">
                    <x-lucide-badge-check class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['verified']) }}</div>
            <div class="widget-stat-label">Verified Emails</div>
        </div>
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--neutral-100); color: var(--neutral-700);">
                    <x-lucide-shield class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['roles']) }}</div>
            <div class="widget-stat-label">Roles</div>
        </div>
    </div>

    {{-- Role distribution --}}
    <div class="card">
        <div class="card-header"><h3 class="card-title">Role Distribution</h3></div>
        <div class="card-body">
            <div class="tool-grid">
                @forelse($roleCounts as $role)
                    <div class="tool-item">
                        <div class="tool-icon brand"><x-lucide-badge-check class="w-4 h-4" /></div>
                        <div class="tool-info">
                            <div class="tool-title">{{ $role->name }}</div>
                            <div class="tool-desc">{{ number_format($role->users_count) }} user(s)</div>
                        </div>
                        <a href="{{ route('admin.roles', ['q' => $role->name]) }}" class="btn btn-secondary btn-sm">View</a>
                    </div>
                @empty
                    <p class="text-muted">No roles found.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Users table --}}
    <div class="card">
        <div class="card-header"><h3 class="card-title">Users</h3></div>
        <div class="overflow-x-auto card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Roles</th>
                        <th class="text-left">Status</th>
                        <th class="text-left">Joined</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr>
                            <td class="whitespace-nowrap">{{ $u->name }}</td>
                            <td class="whitespace-nowrap">{{ $u->email }}</td>
                            <td class="whitespace-nowrap">
                                @php $names = $u->roles->pluck('name'); @endphp
                                @forelse($names as $r)
                                    <span class="badge badge-neutral">{{ $r }}</span>
                                @empty
                                    <span class="badge badge-warning">No role</span>
                                @endforelse
                            </td>
                            <td class="whitespace-nowrap">
                                @if($u->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Disabled</span>
                                @endif
                                @if($u->email_verified_at)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-warning">Unverified</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap">
                                {{ optional($u->created_at)->setTimezone('Africa/Johannesburg')->format('Y-m-d H:i') }}
                            </td>
                            <td class="whitespace-nowrap">
                                <div class="gap-2 d-flex">
                                    @if(!$u->email_verified_at)
                                        <form method="POST" action="{{ route('admin.users.resend-verification', $u) }}"
                                              onsubmit="return confirmResend(this, 'Resend verification to {{ $u->email }}?')">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm">Resend Verify</button>
                                        </form>
                                    @endif

                                    <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-secondary btn-sm">Edit</a>

                                    <form method="POST" action="{{ route('admin.users.toggle-active', $u) }}"
                                          onsubmit="return confirmToggle(this, '{{ $u->is_active ? 'Deactivate' : 'Activate' }} {{ $u->name }}?')">
                                        @csrf
                                        <button class="btn {{ $u->is_active ? 'btn-warning' : 'btn-success' }} btn-sm">
                                            {{ $u->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.users.destroy', $u) }}"
                                          onsubmit="return confirmDelete(this, 'Delete {{ $u->name }}? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="card-footer">{{ $users->onEachSide(1)->links() }}</div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function confirmResend(form, message){
    if (window.Swal) {
        return Swal.fire({icon:'info', title: message, showCancelButton:true, confirmButtonColor:'#2171B5'})
            .then(r => { if(r.isConfirmed) form.submit(); return false; }), false;
    }
    return confirm(message);
}
function confirmToggle(form, message){
    if (window.Swal) {
        return Swal.fire({icon:'warning', title: message, showCancelButton:true, confirmButtonColor:'#2171B5'})
            .then(r => { if(r.isConfirmed) form.submit(); return false; }), false;
    }
    return confirm(message);
}
function confirmDelete(form, message){
    if (window.Swal) {
        return Swal.fire({icon:'error', title: message, showCancelButton:true, confirmButtonColor:'#dc2626'})
            .then(r => { if(r.isConfirmed) form.submit(); return false; }), false;
    }
    return confirm(message);
}
</script>
@endpush
@endsection
