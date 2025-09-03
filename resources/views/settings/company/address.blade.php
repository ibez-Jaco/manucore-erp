@extends('layouts.panel')

@section('title','Company — Address')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in" x-data="{ usePostal: {{ json_encode((bool) old('use_postal_address', (bool) ($company->use_postal_address ?? false))) }} }">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company — Address</h1>
                <p class="text-sm text-gray-500">Physical and postal address.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'address'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.address.update') }}" class="space-y-6">
            @csrf

            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Physical Address</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="address_line_1">Address Line 1</label>
                        <input id="address_line_1" name="address_line_1" type="text" class="form-input" value="{{ old('address_line_1', $company->address_line_1) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address_line_2">Address Line 2</label>
                        <input id="address_line_2" name="address_line_2" type="text" class="form-input" value="{{ old('address_line_2', $company->address_line_2) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="city">City</label>
                        <input id="city" name="city" type="text" class="form-input" value="{{ old('city', $company->city) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="state_province">State / Province</label>
                        <input id="state_province" name="state_province" type="text" class="form-input" value="{{ old('state_province', $company->state_province) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_code">Postal Code</label>
                        <input id="postal_code" name="postal_code" type="text" class="form-input" value="{{ old('postal_code', $company->postal_code) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="country">Country</label>
                        <input id="country" name="country" type="text" class="form-input" value="{{ old('country', $company->country) }}">
                    </div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <div>
                        <h2 class="form-card-title">Postal Address</h2>
                        <p class="text-sm text-gray-500">Enable if different from physical.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="use_postal_address" value="0">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="use_postal_address" value="1" x-model="usePostal" class="form-checkbox">
                            <span class="text-sm">Use separate postal address</span>
                        </label>
                    </div>
                </div>
                <div class="form-grid" x-show="usePostal" x-cloak>
                    <div class="form-group">
                        <label class="form-label" for="postal_address_line_1">Address Line 1</label>
                        <input id="postal_address_line_1" name="postal_address_line_1" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_address_line_1', $company->postal_address_line_1) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_address_line_2">Address Line 2</label>
                        <input id="postal_address_line_2" name="postal_address_line_2" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_address_line_2', $company->postal_address_line_2) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_city">City</label>
                        <input id="postal_city" name="postal_city" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_city', $company->postal_city) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_state_province">State / Province</label>
                        <input id="postal_state_province" name="postal_state_province" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_state_province', $company->postal_state_province) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_postal_code">Postal Code</label>
                        <input id="postal_postal_code" name="postal_postal_code" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_postal_code', $company->postal_postal_code) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="postal_country">Country</label>
                        <input id="postal_country" name="postal_country" type="text" class="form-input" :disabled="!usePostal"
                               value="{{ old('postal_country', $company->postal_country) }}">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Address</button>
            </div>
        </form>
    </div>
</div>
@endsection
