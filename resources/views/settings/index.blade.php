@extends('layouts.panel')
@section('title', 'Settings - ManuCore ERP')
@section('header', 'Business Settings')
@section('content')
<div class="erp-card">
    <h2 class="erp-header mb-4">Settings Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('settings.company') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="font-semibold text-lg mb-2">Company Information</h3>
            <p class="text-sm text-gray-600">Manage company details</p>
        </a>
        <a href="{{ route('settings.branches') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="font-semibold text-lg mb-2">Branches</h3>
            <p class="text-sm text-gray-600">Configure branches</p>
        </a>
    </div>
</div>
@endsection
