<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Branding — ManuCore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/theme.css','resources/css/panel.css','resources/js/app.js'])
</head>
<body data-theme="{{ $activeTheme ?? 'blue' }}" @if(!empty($activeThemeVars)) style="{{ $activeThemeVars }}" @endif>
    <main class="max-w-5xl mx-auto p-6">
        @if (session('success'))
            <div class="mb-4 p-3 rounded border border-green-300 bg-green-50 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 p-3 rounded border border-red-300 bg-red-50 text-red-800">
                Fix the errors below.
            </div>
        @endif

        <h1 class="text-2xl font-semibold mb-6">Branding & Theme</h1>

        <form method="POST" action="{{ route('settings.branding.update') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Theme Preset</label>
                <select name="theme" class="w-full border rounded p-2"
                        x-data x-on:change="document.getElementById('custom-fields').classList.toggle('hidden', this.value !== 'custom')">
                    @foreach (['blue','teal','purple','coral','slate','custom'] as $t)
                        <option value="{{ $t }}" {{ ($company->theme ?? 'blue') === $t ? 'selected' : '' }}>
                            {{ ucfirst($t) }}
                        </option>
                    @endforeach
                </select>
            </div>

            @php
                $p1 = $company->primary_color ?? '#2171b5';
                $p2 = $company->secondary_color ?? '#6baed6';
                $p3 = $company->accent_color ?? '#bdd7e7';
                $gs = $company->gradient_start ?? $p1;
                $ge = $company->gradient_end ?? $p2;
            @endphp

            <div id="custom-fields" class="{{ ($company->theme ?? 'blue') === 'custom' ? '' : 'hidden' }}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Primary (#RRGGBB)</label>
                        <input class="w-full border rounded p-2" name="primary_color" value="{{ old('primary_color', $p1) }}">
                        @error('primary_color')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Secondary (#RRGGBB)</label>
                        <input class="w-full border rounded p-2" name="secondary_color" value="{{ old('secondary_color', $p2) }}">
                        @error('secondary_color')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Accent (#RRGGBB)</label>
                        <input class="w-full border rounded p-2" name="accent_color" value="{{ old('accent_color', $p3) }}">
                        @error('accent_color')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gradient Start</label>
                        <input class="w-full border rounded p-2" name="gradient_start" value="{{ old('gradient_start', $gs) }}">
                        @error('gradient_start')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Gradient End</label>
                        <input class="w-full border rounded p-2" name="gradient_end" value="{{ old('gradient_end', $ge) }}">
                        @error('gradient_end')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4 p-4 rounded border" style="background: linear-gradient(135deg, {{ $gs }} 0%, {{ $ge }} 100%);">
                    <div class="text-white font-semibold">Preview</div>
                    <div class="mt-2 flex gap-3">
                        <span class="px-3 py-1 rounded text-white" style="background: {{ $p1 }}">Primary</span>
                        <span class="px-3 py-1 rounded text-white" style="background: {{ $p2 }}">Secondary</span>
                        <span class="px-3 py-1 rounded text-black" style="background: {{ $p3 }}">Accent</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button class="px-4 py-2 rounded bg-[var(--primary-1)] text-white" type="submit">Save</button>
                <a class="px-4 py-2 rounded border" href="{{ route('settings.index') }}">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>
