@extends('layouts.panel')

@section('title', 'Branding — ManuCore ERP')
@section('header', 'Branding & Theme')

@section('content')
<div x-data="brandingForm()" x-init="init()"
     class="grid grid-cols-1 gap-6 lg:grid-cols-3">

    {{-- Theme & Colors --}}
    <div class="lg:col-span-2 erp-card">
        <h2 class="mb-4 erp-header">Theme</h2>

        <form method="POST" action="{{ route('settings.branding.update') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                @php
                    $themes = ['blue','teal','purple','coral','slate','custom'];
                @endphp

                @foreach($themes as $t)
                    <label class="block">
                        <input type="radio" name="theme" value="{{ $t }}"
                               x-model="theme"
                               class="mr-2">
                        <span class="capitalize">{{ $t }}</span>
                    </label>
                @endforeach
            </div>

            {{-- Custom color fields (only when theme=custom) --}}
            <div x-show="theme === 'custom'" x-cloak class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="erp-label">Primary Color</label>
                    <input type="color" class="erp-input"
                           name="primary_color"
                           x-model="primary"
                           value="{{ $company->primary_color ?? '#2171B5' }}">
                    @error('primary_color')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="erp-label">Secondary Color</label>
                    <input type="color" class="erp-input"
                           name="secondary_color"
                           x-model="secondary"
                           value="{{ $company->secondary_color ?? '#6BAED6' }}">
                    @error('secondary_color')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="erp-label">Accent Color</label>
                    <input type="color" class="erp-input"
                           name="accent_color"
                           x-model="accent"
                           value="{{ $company->accent_color ?? '#BDD7E7' }}">
                    @error('accent_color')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="erp-label">Gradient Start</label>
                    <input type="color" class="erp-input"
                           name="gradient_start"
                           x-model="gradientStart"
                           value="{{ $company->gradient_start ?? ($company->primary_color ?? '#2171B5') }}">
                    @error('gradient_start')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="erp-label">Gradient End</label>
                    <input type="color" class="erp-input"
                           name="gradient_end"
                           x-model="gradientEnd"
                           value="{{ $company->gradient_end ?? '#0ea5e9' }}">
                    @error('gradient_end')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('settings.index') }}" class="erp-btn-secondary">Cancel</a>
                <button type="submit" class="erp-btn-primary">Save Branding</button>
            </div>
        </form>
    </div>

    {{-- Live Preview --}}
    <div class="erp-card">
        <h2 class="mb-4 erp-header">Preview</h2>

        {{-- When theme is preset, we set data-theme to that preset.
             When theme is custom, we still set data-theme="blue" (or any preset)
             and override variables inline via :style --}}
        <div class="p-4 text-white rounded-xl"
             :data-theme="theme === 'custom' ? 'blue' : theme"
             :style="theme === 'custom'
                    ? '--primary-1:' + primary + ';'
                      + '--primary-2:' + secondary + ';'
                      + '--primary-3:' + accent + ';'
                      + '--gradient-start:' + gradientStart + ';'
                      + '--gradient-end:' + gradientEnd + ';'
                    : ''"
             style="background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));">
            <div class="text-lg font-semibold">ManuCore Preview</div>
            <p class="opacity-90">Buttons, badges & sidebar pick up your theme vars.</p>
            <div class="flex gap-2 mt-4">
                <button class="erp-btn-primary">Primary</button>
                <button class="erp-btn-secondary">Secondary</button>
                <span class="erp-badge">Badge</span>
            </div>
        </div>
    </div>

    {{-- Logos (Media Library) --}}
    <div class="lg:col-span-3 erp-card">
        <h2 class="mb-4 erp-header">Brand Assets</h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-5">
            @php
                $collections = [
                    'logo-full-color' => 'Full Color',
                    'logo-white'      => 'White',
                    'logo-black'      => 'Black',
                    'logo-icon'       => 'Icon',
                    'favicon'         => 'Favicon',
                ];
            @endphp

            @foreach($collections as $key => $label)
                @php
                    $url = $company->getFirstMediaUrl($key, 'preview') ?: $company->{str_replace('-', '_', $key)};
                @endphp
                <div class="p-3 border rounded-lg">
                    <div class="mb-2 text-sm font-semibold">{{ $label }}</div>
                    <div class="flex items-center justify-center overflow-hidden border rounded aspect-video bg-gray-50">
                        @if($url)
                            <img src="{{ $url }}" alt="{{ $label }}" class="max-h-24">
                        @else
                            <span class="text-sm text-gray-400">No {{ strtolower($label) }}</span>
                        @endif
                    </div>

                    <form class="mt-3 space-y-2"
                          method="POST"
                          action="{{ route('settings.branding.logo.upload') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="logo_type" value="{{ $key }}">
                        <input type="file" name="logo_file" accept=".png,.jpg,.jpeg,.svg,.ico" class="erp-input">
                        <button type="submit" class="w-full erp-btn-primary">Upload</button>
                    </form>

                    @if($url)
                        <form class="mt-2"
                              method="POST"
                              action="{{ route('settings.branding.logo.remove') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="logo_type" value="{{ $key }}">
                            <button type="submit" class="w-full erp-btn-secondary">Remove</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Alpine helpers --}}
<script>
function brandingForm() {
    return {
        theme: @json($company->theme ?? 'blue'),
        primary: @json($company->primary_color ?? '#2171B5'),
        secondary: @json($company->secondary_color ?? '#6BAED6'),
        accent: @json($company->accent_color ?? '#BDD7E7'),
        gradientStart: @json($company->gradient_start ?? ($company->primary_color ?? '#2171B5')),
        gradientEnd: @json($company->gradient_end ?? '#0ea5e9'),

        init() {
            // nothing for now; kept for future live interactions
        }
    }
}
</script>
@endsection
