@extends('layouts.panel')

@section('title', 'Simple Page Template - ManuCore ERP')

@section('header', 'Simple Page Template')
@section('subheader', 'Basic content page with minimal components')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-primary" onclick="copyTemplate()">
        📋 Copy Template
    </button>
@endsection

@section('content')
<div class="space-y-6">

    {{-- Template Info --}}
    <div class="card">
        <div class="card-body">
            <div class="gap-4 d-flex align-center">
                <div class="justify-center d-flex align-center" style="width: 64px; height: 64px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-xl); font-size: 1.75rem;">
                    📄
                </div>
                <div>
                    <h3 class="mb-1 text-xl font-bold text-neutral-900">Simple Page Template</h3>
                    <p class="text-neutral-600">Perfect for basic content pages, documentation, or settings screens.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Sample Content Section --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Company Information</h3>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    <h4 class="mb-3 font-semibold text-neutral-900">About Our Company</h4>
                    <p class="mb-4 leading-relaxed text-neutral-700">
                        ManuCore ERP Solutions has been serving manufacturing businesses since 2019. 
                        We specialize in providing comprehensive enterprise resource planning solutions 
                        that streamline operations, improve efficiency, and drive growth.
                    </p>
                    <p class="leading-relaxed text-neutral-700">
                        Our platform integrates seamlessly with existing business processes, offering 
                        real-time insights, automated workflows, and powerful reporting capabilities.
                    </p>
                </div>
                <div>
                    <div class="p-4 rounded-lg bg-neutral-50">
                        <h5 class="mb-3 font-semibold text-neutral-900">Quick Facts</h5>
                        <dl class="space-y-2">
                            <div class="justify-between d-flex">
                                <dt class="text-sm text-neutral-600">Founded:</dt>
                                <dd class="text-sm font-medium">2019</dd>
                            </div>
                            <div class="justify-between d-flex">
                                <dt class="text-sm text-neutral-600">Employees:</dt>
                                <dd class="text-sm font-medium">150+</dd>
                            </div>
                            <div class="justify-between d-flex">
                                <dt class="text-sm text-neutral-600">Clients:</dt>
                                <dd class="text-sm font-medium">500+</dd>
                            </div>
                            <div class="justify-between d-flex">
                                <dt class="text-sm text-neutral-600">Countries:</dt>
                                <dd class="text-sm font-medium">12</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Feature Highlights --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Key Features</h3>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--success-100); color: var(--success-600); border-radius: var(--radius-lg);">
                        ⚡
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Fast Performance</h5>
                        <p class="text-xs text-neutral-600">Optimized for speed and efficiency</p>
                    </div>
                </div>
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-lg);">
                        🔒
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Secure</h5>
                        <p class="text-xs text-neutral-600">Enterprise-grade security</p>
                    </div>
                </div>
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--warning-100); color: var(--warning-600); border-radius: var(--radius-lg);">
                        📊
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Analytics</h5>
                        <p class="text-xs text-neutral-600">Real-time business insights</p>
                    </div>
                </div>
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--danger-100); color: var(--danger-600); border-radius: var(--radius-lg);">
                        🌐
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Global Access</h5>
                        <p class="text-xs text-neutral-600">Access from anywhere</p>
                    </div>
                </div>
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--neutral-200); color: var(--neutral-600); border-radius: var(--radius-lg);">
                        📱
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Mobile Ready</h5>
                        <p class="text-xs text-neutral-600">Works on all devices</p>
                    </div>
                </div>
                <div class="gap-3 d-flex">
                    <div class="justify-center flex-shrink-0 d-flex align-center" style="width: 40px; height: 40px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-lg);">
                        🛠️
                    </div>
                    <div>
                        <h5 class="text-sm font-semibold text-neutral-900">Customizable</h5>
                        <p class="text-xs text-neutral-600">Tailored to your needs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="card">
        <div class="card-body">
            <div class="flex-wrap justify-center gap-3 d-flex">
                <button class="btn btn-primary" onclick="showSuccess()">
                    ✨ Try Success Alert
                </button>
                <button class="btn btn-warning" onclick="showWarning()">
                    ⚠️ Try Warning Alert
                </button>
                <button class="btn btn-danger" onclick="showConfirm()">
                    🗑️ Try Confirm Dialog
                </button>
                <button class="btn btn-secondary" onclick="showInfo()">
                    ℹ️ Try Info Alert
                </button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function copyTemplate() {
    if (window.ManuCore) {
        ManuCore.showToast('Template structure copied to clipboard! Check browser console for full code.', 'success');
    }
    
    const templateCode = `@extends('layouts.panel')

@section('title', 'Your Page Title - ManuCore ERP')
@section('header', 'Your Page Header')
@section('subheader', 'Your page description')

@section('content')
<div class="space-y-6">
    
    {{-- Main Content Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Your Content Title</h3>
        </div>
        <div class="card-body">
            {{-- Your content here --}}
            <p>Add your page content using the ManuCore theme system.</p>
        </div>
    </div>

</div>
@endsection`;
    
    console.log('Simple Page Template Code:');
    console.log(templateCode);
}

function showSuccess() {
    if (window.Swal) {
        Swal.fire({
            title: 'Success!',
            text: 'Operation completed successfully',
            icon: 'success',
            confirmButtonColor: 'var(--brand-600)'
        });
    }
}

function showWarning() {
    if (window.Swal) {
        Swal.fire({
            title: 'Warning!',
            text: 'Please review before proceeding',
            icon: 'warning',
            confirmButtonColor: 'var(--warning-600)'
        });
    }
}

function showConfirm() {
    if (window.Swal) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--danger-600)',
            cancelButtonColor: 'var(--neutral-400)',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your item has been deleted.',
                    icon: 'success',
                    confirmButtonColor: 'var(--brand-600)'
                });
            }
        });
    }
}

function showInfo() {
    if (window.Swal) {
        Swal.fire({
            title: 'Information',
            text: 'This is an informational message',
            icon: 'info',
            confirmButtonColor: 'var(--brand-600)'
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('📄 Simple Page Template loaded');
});
</script>
@endpush