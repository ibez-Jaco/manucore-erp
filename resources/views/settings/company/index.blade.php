@extends('layouts.panel')

@section('title', 'Company Settings - ManuCore ERP')
@section('header', 'Company Information')

@section('content')
<div class="erp-card">
    <form class="space-y-6" method="post" action="#">
        @csrf
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label class="erp-label">Company Name</label>
                <input type="text" class="erp-input" value="{{ $company->name ?? 'ManuCore Industries' }}">
            </div>
            <div>
                <label class="erp-label">Registration Number</label>
                <input type="text" class="erp-input" value="{{ $company->registration_number ?? '' }}">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('settings.index') }}" class="erp-btn-secondary">Cancel</a>
            <button type="submit" class="erp-btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
