@extends('layouts.panel')

@section('title','Company — System')

@section('content')
@includeIf('components.flash')

<div class="settings-content erp-fade-in">
    <div class="form-card">
        <div class="form-card-header">
            <div>
                <h1 class="form-card-title">Company — System</h1>
                <p class="text-sm text-gray-500">Timezone & formats.</p>
            </div>
            <div class="flex gap-2">
                <a class="btn btn-secondary btn-sm" href="{{ route('settings.company') }}">Overview</a>
            </div>
        </div>

        @include('settings.company.partials.tabs', ['active' => 'system'])

        @php
            $zones = \DateTimeZone::listIdentifiers();
            $tz = old('timezone', $company->timezone ?? config('app.timezone', 'Africa/Johannesburg'));
            $dateFormats = ['Y-m-d','d/m/Y','m/d/Y','d M Y','M d, Y'];
            $df = old('date_format', $company->date_format ?? 'd/m/Y');
            $timeFormats = ['H:i','H:i:s','g:i A','g:i:s A'];
            $tf = old('time_format', $company->time_format ?? 'H:i');
        @endphp

        @if ($errors->any())
            <div class="mb-4 alert alert-error">
                <div class="font-medium">Please correct the following:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        @php use Illuminate\Support\Facades\Route as _Route; @endphp
        <form method="POST"
            action="{{ _Route::has('settings.company.system.update') ? route('settings.company.system.update') : route('settings.company.update') }}"
            class="space-y-6">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="timezone">Timezone</label>
                    <select id="timezone" name="timezone" class="form-input" required>
                        @foreach ($zones as $z)
                            <option value="{{ $z }}" @selected($tz === $z)>{{ $z }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="date_format">Date Format</label>
                    <select id="date_format" name="date_format" class="form-input" required>
                        @foreach ($dateFormats as $f)
                            <option value="{{ $f }}" @selected($df === $f)>{{ $f }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="time_format">Time Format</label>
                    <select id="time_format" name="time_format" class="form-input" required>
                        @foreach ($timeFormats as $f)
                            <option value="{{ $f }}" @selected($tf === $f)>{{ $f }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('settings.company') }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">Save System</button>
            </div>
        </form>
    </div>
</div>
@endsection
