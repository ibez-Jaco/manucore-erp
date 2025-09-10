@extends('layouts.panel')

@section('title', 'Developer Templates - ManuCore ERP')

@section('header', 'Developer Templates')
@section('subheader', 'Professional ERP page templates and components for rapid development')

@section('page-actions')
    <button class="btn btn-secondary" onclick="toggleTheme()">
        Dark Mode
    </button>
    <button class="btn btn-secondary" onclick="showAccentPicker()">
        Test Colors
    </button>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Template Gallery Introduction --}}
    <div class="card">
        <div class="card-body">
            <div class="gap-4 d-flex align-center">
                <div class="justify-center d-flex align-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); border-radius: var(--radius-2xl); color: white; font-size: 2rem;">
                    T
                </div>
                <div class="flex-1">
                    <h3 class="mb-2 text-2xl font-bold text-neutral-900">ManuCore ERP Developer Templates</h3>
                    <p class="mb-4 text-neutral-600">Copy-paste ready templates that demonstrate professional ERP patterns using the ManuCore theme system. All templates support dark mode and color theming.</p>
                    <div class="flex-wrap gap-3 d-flex">
                        <span class="badge badge-primary">Laravel 12 Ready</span>
                        <span class="badge badge-success">Dark Mode Compatible</span>
                        <span class="badge badge-neutral">4 Color Themes</span>
                        <span class="badge badge-warning">Mobile Responsive</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Theme Testing Section --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Theme Testing</h3>
        </div>
        <div class="card-body">
            <p class="mb-4 text-sm text-neutral-600">Test how templates look across different color themes and light/dark modes:</p>
            <div class="flex-wrap gap-3 d-flex">
                <button class="btn btn-primary btn-sm" onclick="setAccent('blue')">Blue Theme</button>
                <button class="btn btn-success btn-sm" onclick="setAccent('green')">Green Theme</button>
                <button class="btn btn-secondary btn-sm" onclick="setAccent('purple')" style="background: #8b5cf6; border-color: #8b5cf6;">Purple Theme</button>
                <button class="btn btn-warning btn-sm" onclick="setAccent('orange')">Orange Theme</button>
                <button class="btn btn-secondary btn-sm" onclick="toggleTheme()">Toggle Dark Mode</button>
            </div>
        </div>
    </div>

    {{-- Page Templates --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Page Templates</h3>
        </div>
        <div class="card-body">
            @if(isset($templates) && isset($templates['pages']))
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($templates['pages'] as $template)
                    <div class="transition-all card hover:shadow-lg">
                        <div class="card-body">
                            <div class="gap-3 mb-3 d-flex align-center">
                                <div class="justify-center d-flex align-center" style="width: 48px; height: 48px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                    {{ $template['icon'] ?? 'T' }}
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-neutral-900">{{ $template['name'] ?? 'Template' }}</h4>
                                    <span class="badge badge-primary badge-sm">{{ $template['category'] ?? 'General' }}</span>
                                </div>
                            </div>
                            <p class="mb-4 text-sm text-neutral-600">{{ $template['description'] ?? 'Template description' }}</p>
                            <a href="{{ route($template['route']) }}" class="btn btn-primary btn-sm w-100">
                                View Template
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="py-8 text-center">
                    <div class="mb-4 text-neutral-500">No page templates available</div>
                    <p class="text-sm text-neutral-400">Templates data not found or not properly configured.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Component Examples --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Component Examples</h3>
        </div>
        <div class="card-body">
            @if(isset($templates) && isset($templates['components']))
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($templates['components'] as $component)
                    <div class="transition-all card hover:shadow-lg">
                        <div class="card-body">
                            <div class="gap-3 mb-3 d-flex align-center">
                                <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--success-100); color: var(--success-600); border-radius: var(--radius-lg); font-size: 1.25rem;">
                                    {{ $component['icon'] ?? 'C' }}
                                </div>
                                <div class="flex-1">
                                    <h5 class="text-sm font-medium text-neutral-900">{{ $component['name'] ?? 'Component' }}</h5>
                                </div>
                            </div>
                            <p class="mb-3 text-xs text-neutral-600">{{ $component['description'] ?? 'Component description' }}</p>
                            <a href="{{ route($component['route']) }}" class="btn btn-success btn-sm w-100">
                                View Examples
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="py-8 text-center">
                    <div class="mb-4 text-neutral-500">No components available</div>
                    <p class="text-sm text-neutral-400">Components data not found or not properly configured.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Development Guide --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Development Guide</h3>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div>
                    <h4 class="mb-3 font-semibold text-neutral-900">CSS Integration</h4>
                    <div class="p-4 font-mono text-sm rounded-lg bg-neutral-50">
                        <div class="mb-2 text-neutral-600">/* Use CSS variables for theming */</div>
                        <div class="text-brand-600">background: var(--brand-600);</div>
                        <div class="text-brand-600">color: var(--neutral-900);</div>
                        <div class="text-brand-600">border: 1px solid var(--neutral-200);</div>
                    </div>
                </div>
                <div>
                    <h4 class="mb-3 font-semibold text-neutral-900">Dark Mode Support</h4>
                    <div class="p-4 font-mono text-sm rounded-lg bg-neutral-50">
                        <div class="mb-2 text-neutral-600">/* Automatic dark mode styling */</div>
                        <div class="text-brand-600">[data-theme="dark"] .card {</div>
                        <div class="ml-4 text-brand-600">background: var(--neutral-100);</div>
                        <div class="text-brand-600">}</div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6">
                <h4 class="mb-3 font-semibold text-neutral-900">Quick Start</h4>
                <ol class="space-y-2 text-sm list-decimal list-inside text-neutral-700">
                    <li>Copy any template file to your views directory</li>
                    <li>Update the extends directive to match your layout</li>
                    <li>Replace dummy data with your models and logic</li>
                    <li>Customize colors using CSS variables</li>
                    <li>Test in both light and dark modes</li>
                </ol>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
// Theme testing functions
function setAccent(accent) {
    if (window.ManuCore) {
        ManuCore.setAccent(accent);
    } else {
        document.documentElement.setAttribute('data-accent', accent);
        console.log('Set accent to:', accent);
    }
}

function toggleTheme() {
    if (window.ManuCore) {
        ManuCore.toggleTheme();
    } else {
        const current = document.documentElement.getAttribute('data-theme') || 'light';
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        console.log('Toggled theme to:', newTheme);
    }
}

function showAccentPicker() {
    if (window.Swal) {
        Swal.fire({
            title: 'Choose Color Theme',
            html: '<div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-top: 20px;">' +
                  '<button onclick="setAccent(\'blue\'); Swal.close();" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid #2563eb; background: #2563eb; color: white; cursor: pointer;">Blue</button>' +
                  '<button onclick="setAccent(\'green\'); Swal.close();" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid #16a34a; background: #16a34a; color: white; cursor: pointer;">Green</button>' +
                  '<button onclick="setAccent(\'purple\'); Swal.close();" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid #8b5cf6; background: #8b5cf6; color: white; cursor: pointer;">Purple</button>' +
                  '<button onclick="setAccent(\'orange\'); Swal.close();" style="width: 60px; height: 60px; border-radius: 50%; border: 3px solid #ea580c; background: #ea580c; color: white; cursor: pointer;">Orange</button>' +
                  '</div>',
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: 'Close'
        });
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    console.log('ManuCore Template Gallery loaded');
    console.log('Current theme:', document.documentElement.getAttribute('data-theme'));
    console.log('Current accent:', document.documentElement.getAttribute('data-accent'));
});
</script>
@endpush