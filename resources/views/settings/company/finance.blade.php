@extends('layouts.panel')

@section('title','Company — Banking & VAT')
@section('header','Banking & VAT')
@section('subheader','Used on invoices, quotes and statements.')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">

        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Banking & VAT</h1>
                <p class="text-sm text-gray-500">Manage your company’s banking details and default VAT rate.</p>
            </div>
            <div class="flex items-center gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'finance'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M12 9v2m0 4h.01M4.938 21h14.124C20.07 21 21 20.07 21 18.938V5.062C21 3.93 20.07 3 18.938 3H5.062C3.93 3 3 3.93 3 5.062v13.876C3 20.07 3.93 21 5.062 21z"/></svg>
                <div>
                    <div class="font-medium">Please correct the following:</div>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.finance.update') }}" class="space-y-6">
            @csrf

            {{-- Banking --}}
            <div class="form-card">
                <div class="form-card-header">
                    <div>
                        <h2 class="form-card-title">Banking</h2>
                        <p class="text-sm text-gray-500">Displayed on customer-facing documents.</p>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="bank_name">Bank Name</label>
                        <input id="bank_name" name="bank_name" type="text" class="form-input"
                               value="{{ old('bank_name', $company->bank_name) }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bank_branch">Branch</label>
                        <input id="bank_branch" name="bank_branch" type="text" class="form-input"
                               value="{{ old('bank_branch', $company->bank_branch) }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bank_branch_code">Branch Code</label>
                        <input id="bank_branch_code" name="bank_branch_code" type="text" class="form-input"
                               value="{{ old('bank_branch_code', $company->bank_branch_code) }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bank_account_name">Account Name</label>
                        <input id="bank_account_name" name="bank_account_name" type="text" class="form-input"
                               value="{{ old('bank_account_name', $company->bank_account_name) }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bank_account_number">Account Number</label>
                        <input id="bank_account_number" name="bank_account_number" type="text" class="form-input"
                               value="{{ old('bank_account_number', $company->bank_account_number) }}">
                        <p class="form-help">Digits, spaces and dashes only.</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bank_account_type">Account Type</label>
                        @php $type = old('bank_account_type', $company->bank_account_type); @endphp
                        <select id="bank_account_type" name="bank_account_type" class="form-input">
                            <option value="">—</option>
                            @foreach (['Current','Cheque','Savings','Transmission'] as $opt)
                                <option value="{{ $opt }}" @selected($type === $opt)>{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- VAT --}}
            <div class="form-card">
                <div class="form-card-header">
                    <div>
                        <h2 class="form-card-title">VAT</h2>
                        <p class="text-sm text-gray-500">Configure default tax rate and registration number.</p>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="vat_number">VAT Number</label>
                        <input id="vat_number" name="vat_number" type="text" class="form-input"
                               value="{{ old('vat_number', $company->vat_number) }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="default_tax_rate">Default Tax Rate (%)</label>
                        <input id="default_tax_rate" name="default_tax_rate" type="number" step="0.01" min="0" max="100"
                               class="form-input" placeholder="15.00"
                               value="{{ old('default_tax_rate', $company->default_tax_rate ?? 15.00) }}">
                        <p class="form-help">South Africa VAT is typically 15%.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Banking & VAT</button>
            </div>
        </form>
    </div>
</div>
@endsection
