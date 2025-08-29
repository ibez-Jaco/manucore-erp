@extends('layouts.panel')
@section('title', 'Roles & Permissions - ManuCore ERP')
@section('header', 'Roles & Permissions')
@section('content')
<div class="erp-card">
    <div class="flex justify-between items-center mb-6">
        <h2 class="erp-header">System Roles</h2>
        <button class="erp-btn-primary">Add Role</button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Administrator</h3>
            <p class="text-sm text-gray-600">Full system access</p>
        </div>
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Manager</h3>
            <p class="text-sm text-gray-600">Business operations</p>
        </div>
        <div class="border-2 border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-lg mb-2">Staff</h3>
            <p class="text-sm text-gray-600">Limited access</p>
        </div>
    </div>
</div>
@endsection
