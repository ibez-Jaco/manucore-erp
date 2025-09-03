@extends('layouts.panel')

@section('title','Company — Contact')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company — Contact</h1>
                <p class="text-sm text-gray-500">Email, phone, website.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'contact'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.contact.update') }}" class="space-y-6">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-input" value="{{ old('email', $company->email) }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Phone</label>
                    <input id="phone" name="phone" type="text" class="form-input" value="{{ old('phone', $company->phone) }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="mobile">Mobile</label>
                    <input id="mobile" name="mobile" type="text" class="form-input" value="{{ old('mobile', $company->mobile) }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="website">Website</label>
                    <input id="website" name="website" type="url" class="form-input" value="{{ old('website', $company->website) }}">
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Contact</button>
            </div>
        </form>
    </div>
</div>
@endsection
