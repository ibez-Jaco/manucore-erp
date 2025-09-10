@extends('layouts.panel')

@section('title', 'System Health - ManuCore ERP')
@section('header', 'System Health')
@section('subheader', 'Live status of core services and application environment')

@section('content')
@php
    // Summaries
    $counts = ['healthy'=>0,'warning'=>0,'error'=>0,'unknown'=>0];
    foreach (($healthData ?? []) as $row) {
        $s = strtolower($row['status'] ?? 'unknown');
        if (!array_key_exists($s, $counts)) $s = 'unknown';
        $counts[$s]++;
    }
    $overall = $counts['error'] > 0 ? 'error' : ($counts['warning'] > 0 ? 'warning' : 'healthy');
    $badge = fn($s) => match(strtolower($s)) {
        'healthy' => 'badge-success',
        'warning' => 'badge-warning',
        'error'   => 'badge-danger',
        default   => 'badge-neutral',
    };
@endphp

<div class="space-y-6">
    {{-- Summary widgets --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-activity class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value text-capitalize">{{ $overall }}</div>
            <div class="widget-stat-label">Overall</div>
            <div class="widget-stat-change {{ $overall === 'healthy' ? 'positive' : ($overall === 'warning' ? 'neutral' : 'negative') }}">Live</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-700);">
                    <x-lucide-check-circle class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ $counts['healthy'] }}</div>
            <div class="widget-stat-label">OK</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-700);">
                    <x-lucide-alert-triangle class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ $counts['warning'] }}</div>
            <div class="widget-stat-label">Warnings</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-700);">
                    <x-lucide-x-octagon class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">{{ $counts['error'] }}</div>
            <div class="widget-stat-label">Failures</div>
        </div>
    </div>

    {{-- Checks table --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Checks</h3>
        </div>
        <div class="p-0 card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                @forelse(($healthData ?? []) as $k => $row)
                    @php
                        $s   = strtolower($row['status'] ?? 'unknown');
                        $msg = $row['message'] ?? '';
                        $meta = $row['meta'] ?? [];
                    @endphp
                    <tr>
                        <td class="font-medium">{{ $row['label'] ?? ucfirst($k) }}</td>
                        <td><span class="badge {{ $badge($s) }}">{{ ucfirst($s) }}</span></td>
                        <td>{{ $msg }}</td>
                        <td class="text-sm text-neutral-600">
                            @if(is_array($meta) && count($meta))
                                <pre class="p-2 overflow-auto text-xs rounded-md bg-neutral-50">{{ json_encode($meta, JSON_PRETTY_PRINT) }}</pre>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-6 text-center text-neutral-600">No checks returned.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="gap-2 card-footer d-flex">
            <a href="{{ route('admin.health') }}" class="btn btn-secondary btn-sm">Re-run</a>
            @if(Route::has('horizon.index'))
                <a href="{{ route('horizon.index') }}" class="btn btn-secondary btn-sm">Open Horizon</a>
            @endif
        </div>
    </div>
</div>
@endsection
