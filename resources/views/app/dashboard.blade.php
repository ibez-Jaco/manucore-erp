@extends('layouts.app')
@section('title', 'Dashboard - ManuCore ERP')
@section('header', 'Dashboard')
@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Total Customers</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['customers'] ?? 0 }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Active Quotes</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['quotes'] ?? 0 }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Revenue (ZAR)</h3>
            <p class="text-3xl font-bold mt-2">R{{ number_format($stats['revenue'] ?? 0, 2) }}</p>
        </div>
        <div class="erp-card dashboard-stat text-white">
            <h3 class="text-lg font-semibold">Pending Tasks</h3>
            <p class="text-3xl font-bold mt-2">{{ $stats['pending'] ?? 0 }}</p>
        </div>
    </div>
    <div class="erp-card">
        <h2 class="erp-header mb-4">Recent Activity</h2>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-sm">New customer registered</span>
                <span class="erp-badge">2 hours ago</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-sm">Quote approved</span>
                <span class="erp-badge">4 hours ago</span>
            </div>
        </div>
    </div>
</div>
@endsection
