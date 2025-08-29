@extends('layouts.panel')
@section('title', 'Admin - ManuCore ERP')
@section('header', 'System Administration')
@section('content')
<div class="erp-card">
    <h2 class="erp-header mb-4">Admin Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-3xl font-bold mt-2">24</p>
        </div>
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">Active Sessions</h3>
            <p class="text-3xl font-bold mt-2">8</p>
        </div>
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
            <h3 class="text-lg font-semibold">System Health</h3>
            <p class="text-3xl font-bold mt-2">100%</p>
        </div>
    </div>
</div>
@endsection
