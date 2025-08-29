@extends('layouts.panel')
@section('title', 'Company Settings - ManuCore ERP')
@section('header', 'Company Information')
@section('content')
<div class="erp-card">
    <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="erp-label">Company Name</label>
                <input type="text" class="erp-input" value="ManuCore Industries">
            </div>
            <div>
                <label class="erp-label">Registration Number</label>
                <input type="text" class="erp-input" value="2025/123456/07">
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <button type="button" class="erp-btn-secondary">Cancel</button>
            <button type="submit" class="erp-btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
