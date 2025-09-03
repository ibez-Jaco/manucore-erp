@extends('layouts.panel')

@section('title','Company — Email & Templates')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Email & Templates</h1>
                <p class="text-sm text-gray-500">Default “From” details and template text.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'email'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.email.update') }}" class="space-y-6">
            @csrf

            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Default From / Reply-To</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="email_from_name">From Name</label>
                        <input id="email_from_name" name="email_from_name" type="text" class="form-input"
                               value="{{ old('email_from_name', $company->email_from_name) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email_from_address">From Address</label>
                        <input id="email_from_address" name="email_from_address" type="email" class="form-input"
                               value="{{ old('email_from_address', $company->email_from_address) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email_reply_to">Reply-To</label>
                        <input id="email_reply_to" name="email_reply_to" type="email" class="form-input"
                               value="{{ old('email_reply_to', $company->email_reply_to) }}">
                    </div>
                </div>
            </div>

            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Reusable Template Blocks</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group md:col-span-2">
                        <label class="form-label" for="email_signature">Email Signature (HTML or Text)</label>
                        <textarea id="email_signature" name="email_signature" rows="4" class="form-input">{{ old('email_signature', $company->email_signature) }}</textarea>
                    </div>
                    <div class="form-group md:col-span-2">
                        <label class="form-label" for="email_footer">Email Footer (HTML or Text)</label>
                        <textarea id="email_footer" name="email_footer" rows="3" class="form-input">{{ old('email_footer', $company->email_footer) }}</textarea>
                    </div>
                    <div class="form-group md:col-span-2">
                        <label class="form-label" for="invoice_terms">Invoice Terms</label>
                        <textarea id="invoice_terms" name="invoice_terms" rows="4" class="form-input">{{ old('invoice_terms', $company->invoice_terms) }}</textarea>
                        <p class="form-help">Use variables later like <code>{{ '{' }}{company.name}{{ '}' }}</code> (Phase 4.6).</p>
                    </div>
                    <div class="form-group md:col-span-2">
                        <label class="form-label" for="quote_terms">Quote Terms</label>
                        <textarea id="quote_terms" name="quote_terms" rows="4" class="form-input">{{ old('quote_terms', $company->quote_terms) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Email & Templates</button>
            </div>
        </form>
    </div>
</div>
@endsection
