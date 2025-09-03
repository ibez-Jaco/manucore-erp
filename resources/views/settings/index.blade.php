{{-- resources/views/settings/index.blade.php --}}
@extends('layouts.panel')

@section('title', 'Settings - ManuCore ERP')
@section('header', 'Business Settings')

@section('content')
<div class="erp-card">
    <h2 class="mb-4 erp-header">Settings Overview</h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <a href="{{ route('settings.company') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="mb-2 text-lg font-semibold">Company Information</h3>
            <p class="text-sm text-gray-600">Manage company details</p>
        </a>

        {{-- FIXED: use settings.branches.index --}}
        <a href="{{ route('settings.branches.index') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="mb-2 text-lg font-semibold">Branches</h3>
            <p class="text-sm text-gray-600">Configure branches</p>
        </a>

        <a href="{{ route('settings.branding.edit') }}" class="settings-card erp-card hover:shadow-xl">
            <h3 class="mb-2 text-lg font-semibold">Branding</h3>
            <p class="text-sm text-gray-600">Theme & logo uploads</p>
        </a>
    </div>
</div>
@endsection
