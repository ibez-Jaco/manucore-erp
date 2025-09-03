@extends('layouts.panel')

@section('title','Company — Financial')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company — Financial</h1>
                <p class="text-sm text-gray-500">Currency, VAT baseline, financial year.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'financial'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.financial.update') }}" class="space-y-6">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="currency_code">Currency Code (ISO)</label>
                    <input id="currency_code" name="currency_code" type="text" class="uppercase form-input"
                           value="{{ old('currency_code', $company->currency_code ?? 'ZAR') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="currency_symbol">Currency Symbol</label>
                    <input id="currency_symbol" name="currency_symbol" type="text" class="form-input"
                           value="{{ old('currency_symbol', $company->currency_symbol ?? 'R') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="vat_rate">VAT Rate (%)</label>
                    <input id="vat_rate" name="vat_rate" type="number" min="0" max="100" step="0.01" class="form-input"
                           value="{{ old('vat_rate', $company->vat_rate ?? 15) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="vat_type">VAT Type</label>
                    @php $vatType = old('vat_type', $company->vat_type ?? 'exclusive'); @endphp
                    <select id="vat_type" name="vat_type" class="form-input" required>
                        <option value="inclusive" @selected($vatType==='inclusive')>Inclusive</option>
                        <option value="exclusive" @selected($vatType==='exclusive')>Exclusive</option>
                    </select>
                </div>
                <div class="form-group md:col-span-2">
                    <label class="form-label" for="financial_year_end">Financial Year End</label>
                    <input id="financial_year_end" name="financial_year_end" type="text" class="form-input" placeholder="e.g. 28 Feb"
                           value="{{ old('financial_year_end', $company->financial_year_end) }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="is_vat_registered" value="0">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="is_vat_registered" value="1" class="form-checkbox"
                               @checked(old('is_vat_registered', (bool)($company->is_vat_registered ?? false)))>
                        <span>VAT Registered</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Financial</button>
            </div>
        </form>
    </div>
</div>
@endsection
