@extends('layouts.panel')

@section('title', 'Audit Logs - ManuCore ERP')
@section('header', 'System Audit Logs')
@section('subheader', 'View system activity and audit trail')

@section('content')
<div class="erp-card">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-900">Recent Activity</h2>
        <div class="flex items-center gap-3">
            <button type="button" class="erp-btn-secondary">
                <x-lucide-filter class="w-4 h-4"/>
                Filter
            </button>
            <button type="button" class="erp-btn-secondary">
                <x-lucide-download class="w-4 h-4"/>
                Export
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="erp-table">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Message</th>
                    <th>User</th>
                    <th>IP Address</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>
                            <span class="erp-badge {{ $log['level'] === 'error' ? 'error' : ($log['level'] === 'warning' ? 'warning' : '') }}">
                                {{ ucfirst($log['level']) }}
                            </span>
                        </td>
                        <td class="font-medium">{{ $log['message'] }}</td>
                        <td class="text-sm text-gray-600">{{ $log['user'] ?? 'System' }}</td>
                        <td class="font-mono text-sm text-gray-500">{{ $log['ip_address'] }}</td>
                        <td class="text-sm text-gray-500">{{ $log['created_at']->format('M d, H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(empty($logs))
        <div class="py-8 text-center">
            <x-lucide-scroll-text class="w-12 h-12 mx-auto mb-3 text-gray-400"/>
            <p class="text-gray-500">No log entries found</p>
        </div>
    @endif
</div>
@endsection