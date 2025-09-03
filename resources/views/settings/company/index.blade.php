{{-- resources/views/settings/company/index.blade.php --}}
@extends('layouts.panel')

@section('title', 'Company Settings — ManuCore ERP')

@section('content')
@includeIf('components.flash')

<div class="space-y-6 settings-content erp-fade-in">

    {{-- Tabs (shared across Company section) --}}
    @include('settings.company.partials.tabs', ['active' => 'overview'])

    {{-- Page header --}}
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company Overview</h1>
                <p class="text-sm text-gray-500">Quick summary of your organisation settings. Use the tabs to edit specific sections.</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('settings.branding.edit') }}" class="btn btn-secondary">Branding</a>
            </div>
        </div>

        {{-- Quick stats grid --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Basic</div>
                <div class="font-semibold">{{ $company->name }}</div>
                @if($company->legal_name)
                    <div class="text-sm text-muted">{{ $company->legal_name }}</div>
                @endif
                @if($company->registration_number)
                    <div class="text-sm text-muted">Reg: {{ $company->registration_number }}</div>
                @endif
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('settings.company.basic') }}">Edit Basic</a>
                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Contact</div>
                <div class="space-y-1 text-sm">
                    @if($company->email)<div><span class="font-semibold">Email:</span> {{ $company->email }}</div>@endif
                    @if($company->phone)<div><span class="font-semibold">Phone:</span> {{ $company->phone }}</div>@endif
                    @if($company->mobile)<div><span class="font-semibold">Mobile:</span> {{ $company->mobile }}</div>@endif
                    @if($company->website)<div><span class="font-semibold">Website:</span> {{ $company->website }}</div>@endif
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('settings.company.contact') }}">Edit Contact</a>
                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Address</div>
                <div class="text-sm">
                    <div class="font-semibold">Physical</div>
                    <div>{{ $company->full_address ?: '—' }}</div>
                    <div class="mt-2 font-semibold">Postal</div>
                    <div>{{ $company->full_postal_address ?: '—' }}</div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('settings.company.address') }}">Edit Address</a>
                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Financial</div>
                <div class="space-y-1 text-sm">
                    <div><span class="font-semibold">Currency:</span> {{ $company->currency_symbol }} ({{ strtoupper($company->currency_code) }})</div>
                    <div><span class="font-semibold">VAT Rate:</span> {{ number_format($company->vat_rate ?? 0, 2) }}%</div>
                    <div><span class="font-semibold">VAT Type:</span> {{ ucfirst($company->vat_type ?? 'exclusive') }}</div>
                    <div><span class="font-semibold">Year End:</span> {{ $company->financial_year_end ?: '—' }}</div>
                    <div><span class="font-semibold">VAT Reg:</span> {{ $company->is_vat_registered ? 'Yes' : 'No' }}</div>
                </div>
                <div class="flex gap-2 mt-3">
                    <a class="btn btn-secondary" href="{{ route('settings.company.financial') }}">Financial</a>
                    <a class="btn btn-primary" href="{{ route('settings.company.finance') }}">Banking & VAT</a>
                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">System</div>
                <div class="space-y-1 text-sm">
                    <div><span class="font-semibold">Timezone:</span> {{ $company->timezone }}</div>
                    <div><span class="font-semibold">Date:</span> {{ $company->date_format }}</div>
                    <div><span class="font-semibold">Time:</span> {{ $company->time_format }}</div>
                </div>
                <div class="mt-3">
                    @php use Illuminate\Support\Facades\Route as _Route; @endphp
                    <a class="btn btn-primary"
                    href="{{ _Route::has('settings.company.system') ? route('settings.company.system') : route('settings.company') }}">
                        Edit System
                    </a>

                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Email & Templates</div>
                <div class="space-y-1 text-sm">
                    <div><span class="font-semibold">From:</span> {{ $company->email_from_name ?: '—' }} {{ $company->email_from_address ? " <{$company->email_from_address}>" : '' }}</div>
                    <div><span class="font-semibold">Reply-To:</span> {{ $company->email_reply_to ?: '—' }}</div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('settings.company.email') }}">Edit Email & Templates</a>
                </div>
            </div>

            <div class="erp-card">
                <div class="mb-1 text-sm text-muted">Infrastructure</div>
                <div class="space-y-1 text-sm">
                    <div><span class="font-semibold">Mailer:</span> {{ strtoupper($company->mail_mailer ?? '—') }}</div>
                    <div><span class="font-semibold">Mail Host:</span> {{ $company->mail_host ?: '—' }}</div>
                    <div><span class="font-semibold">DB Host:</span> {{ $company->db_host ?: '—' }}</div>
                    <div><span class="font-semibold">DB Name:</span> {{ $company->db_database ?: '—' }}</div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-primary" href="{{ route('settings.company.infrastructure') }}">Edit Infrastructure</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick actions --}}
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('settings.branding.edit') }}" class="btn btn-secondary">Branding</a>
        <a href="{{ route('settings.branches.index') }}" class="btn btn-secondary">Branches</a>
    </div>
</div>
@endsection
