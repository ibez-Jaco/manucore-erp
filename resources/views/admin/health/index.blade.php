@extends('layouts.panel')

@section('title', 'System Health - ManuCore ERP')
@section('header', 'System Health Monitor')
@section('subheader', 'Monitor system performance and health status')

@section('content')
<div class="space-y-6">
    {{-- Health Status Grid --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        @foreach($healthData as $service => $data)
            <div class="erp-card {{ $data['status'] === 'healthy' ? 'border-green-200 bg-green-50' : ($data['status'] === 'warning' ? 'border-yellow-200 bg-yellow-50' : 'border-red-200 bg-red-50') }}">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $service) }}</h3>
                    <div class="w-3 h-3 rounded-full {{ $data['status'] === 'healthy' ? 'bg-green-500' : ($data['status'] === 'warning' ? 'bg-yellow-500' : 'bg-red-500') }}"></div>
                </div>
                <p class="mb-2 text-sm text-gray-600">{{ $data['message'] }}</p>
                
                @if(isset($data['response_time']))
                    <p class="text-xs text-gray-500">Response: {{ $data['response_time'] }}</p>
                @endif
                
                @if(isset($data['used_percentage']))
                    <div class="mt-2">
                        <div class="h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-blue-600 rounded-full" style="width: {{ $data['used_percentage'] }}%"></div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Health Details --}}
    <div class="erp-card">
        <h2 class="mb-4 text-xl font-bold text-gray-900">System Status Details</h2>
        
        <div class="overflow-x-auto">
            <table class="erp-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Last Checked</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($healthData as $service => $data)
                        <tr>
                            <td class="font-medium capitalize">{{ str_replace('_', ' ', $service) }}</td>
                            <td>
                                <span class="erp-badge {{ $data['status'] === 'healthy' ? 'success' : ($data['status'] === 'warning' ? 'warning' : 'error') }}">
                                    {{ ucfirst($data['status']) }}
                                </span>
                            </td>
                            <td class="text-sm text-gray-600">{{ $data['message'] }}</td>
                            <td class="text-sm text-gray-500">{{ now()->format('H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection