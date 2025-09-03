@extends('layouts.panel')

@section('title','Company — Basic')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company — Basic</h1>
                <p class="text-sm text-gray-500">Update core identifiers.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        {{-- Tabs --}}
        @include('settings.company.partials.tabs', ['active' => 'basic'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.basic.update') }}" class="space-y-6">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="name">Company Name <span class="text-red-500">*</span></label>
                    <input id="name" name="name" type="text" class="form-input" value="{{ old('name', $company->name) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="legal_name">Legal Name</label>
                    <input id="legal_name" name="legal_name" type="text" class="form-input" value="{{ old('legal_name', $company->legal_name) }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="registration_number">Registration Number</label>
                    <input id="registration_number" name="registration_number" type="text" class="form-input" value="{{ old('registration_number', $company->registration_number) }}">
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Basic</button>
            </div>
        </form>
    </div>
</div>
@endsection
