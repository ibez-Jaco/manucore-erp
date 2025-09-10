@extends('layouts.panel')

@section('title', 'Roles & Permissions — ManuCore ERP')
@section('header', 'Roles & Permissions')
@section('subheader', 'Read-only quick view. Manage & CRUD follow in 6.3.')

@section('page-actions')
    <form method="GET" action="{{ route('admin.roles') }}" class="d-inline">
        <div class="gap-2 d-flex">
            <input type="text" name="q" value="{{ $q }}" placeholder="Search role..." class="input input-sm" />
            <button class="btn btn-secondary btn-sm">Search</button>
            @if($q)
            <a class="btn btn-ghost btn-sm" href="{{ route('admin.roles') }}">Clear</a>
            @endif
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
                    <x-lucide-shield class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['roles']) }}</div>
            <div class="widget-stat-label">Roles</div>
        </div>
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--neutral-100); color: var(--neutral-700);">
                    <x-lucide-users class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['users']) }}</div>
            <div class="widget-stat-label">Users</div>
        </div>
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-700);">
                    <x-lucide-key class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ number_format($totals['perms']) }}</div>
            <div class="widget-stat-label">Permissions</div>
        </div>
    </div>

    {{-- Roles table --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
        </div>
        <div class="overflow-x-auto card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="text-left">Role</th>
                        <th class="text-left">Users</th>
                        <th class="text-left">Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td class="whitespace-nowrap">{{ $role->name }}</td>
                            <td class="whitespace-nowrap">
                                <span class="badge badge-neutral">{{ number_format($role->users_count) }}</span>
                            </td>
                            <td class="whitespace-nowrap">
                                <span class="badge badge-neutral">{{ number_format($role->permissions_count) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted">No roles found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($roles->hasPages())
        <div class="card-footer">{{ $roles->onEachSide(1)->links() }}</div>
        @endif
    </div>
</div>
@endsection
