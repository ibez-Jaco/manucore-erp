@extends('layouts.panel')

@section('title','Company — Infrastructure')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Infrastructure</h1>
                <p class="text-sm text-gray-500">Mail server and database connection (per company).</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'infrastructure'])

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('settings.company.infrastructure.update') }}" class="space-y-6">
            @csrf

            {{-- Mail server --}}
            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Mail Server</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="mail_mailer">Mailer</label>
                        @php
                            $mailers = ['smtp','sendmail','postmark','ses','mailgun','log','array','failover'];
                            $curMailer = old('mail_mailer', $company->mail_mailer);
                        @endphp
                        <select id="mail_mailer" name="mail_mailer" class="form-input">
                            <option value="">—</option>
                            @foreach($mailers as $m)
                                <option value="{{ $m }}" @selected($curMailer===$m)>{{ strtoupper($m) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail_host">Host</label>
                        <input id="mail_host" name="mail_host" type="text" class="form-input"
                               value="{{ old('mail_host', $company->mail_host) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail_port">Port</label>
                        <input id="mail_port" name="mail_port" type="number" min="1" max="65535" class="form-input"
                               value="{{ old('mail_port', $company->mail_port) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail_username">Username</label>
                        <input id="mail_username" name="mail_username" type="text" class="form-input"
                               value="{{ old('mail_username', $company->mail_username) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail_password">Password</label>
                        <input id="mail_password" name="mail_password" type="password" class="form-input" placeholder="Leave blank to keep current">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail_encryption">Encryption</label>
                        @php $enc = old('mail_encryption', $company->mail_encryption); @endphp
                        <select id="mail_encryption" name="mail_encryption" class="form-input">
                            <option value="">—</option>
                            @foreach (['tls','ssl','starttls','none'] as $e)
                                <option value="{{ $e }}" @selected($enc===$e)>{{ strtoupper($e) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Database --}}
            <div class="form-card">
                <div class="form-card-header">
                    <h2 class="form-card-title">Database</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="db_host">Host</label>
                        <input id="db_host" name="db_host" type="text" class="form-input"
                               value="{{ old('db_host', $company->db_host) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="db_port">Port</label>
                        <input id="db_port" name="db_port" type="number" min="1" max="65535" class="form-input"
                               value="{{ old('db_port', $company->db_port) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="db_database">Database</label>
                        <input id="db_database" name="db_database" type="text" class="form-input"
                               value="{{ old('db_database', $company->db_database) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="db_username">Username</label>
                        <input id="db_username" name="db_username" type="text" class="form-input"
                               value="{{ old('db_username', $company->db_username) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="db_password">Password</label>
                        <input id="db_password" name="db_password" type="password" class="form-input" placeholder="Leave blank to keep current">
                    </div>
                </div>
                <p class="form-help">Passwords are stored encrypted. Leave blank to keep the current value.</p>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save Infrastructure</button>
            </div>
        </form>
    </div>
</div>
@endsection
