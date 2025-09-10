@extends('layouts.panel')

@section('title', 'Button Components - ManuCore ERP')

@section('header', 'ERP/CRM Button Component Library')
@section('subheader', 'Comprehensive button system for manufacturing and business management interfaces')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-primary" onclick="exportButtonLibrary()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        Export Library
    </button>
@endsection

@section('content')
<div class="space-y-8">

    {{-- Hero Section --}}
    <div class="library-hero">
        <div class="hero-content">
            <div class="hero-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                </svg>
            </div>
            <h2 class="hero-title">ERP/CRM Button Components</h2>
            <p class="hero-description">Professional button system for business applications with consistent styling, interactive states, and comprehensive variant support for manufacturing and customer management workflows.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Button Types</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Size Variants</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">6</div>
                    <div class="stat-label">State Options</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Color Themes</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Primary Action Buttons --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Primary Action Buttons</h3>
                    <p class="showcase-subtitle">Main call-to-action buttons for critical business operations</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('primary')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Standard Primary</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-primary" onclick="handleButtonAction('create-order')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Create Order
                        </button>
                        <button class="btn btn-primary" onclick="handleButtonAction('save-changes')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Loading States</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-primary" onclick="simulateLoading(this, 'Processing Order...')">
                            <span class="btn-text">Process Order</span>
                            <span class="btn-spinner" style="display: none;">
                                <div class="spinner"></div>
                            </span>
                        </button>
                        <button class="btn btn-primary" onclick="simulateLoading(this, 'Generating Report...')">
                            <span class="btn-text">Generate Report</span>
                            <span class="btn-spinner" style="display: none;">
                                <div class="spinner"></div>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Size Variants</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-primary btn-sm" onclick="handleButtonAction('quick-add')">Quick Add</button>
                        <button class="btn btn-primary" onclick="handleButtonAction('standard')">Standard</button>
                        <button class="btn btn-primary btn-lg" onclick="handleButtonAction('large')">Large Action</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Secondary & Navigation Buttons --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon secondary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Secondary & Navigation</h3>
                    <p class="showcase-subtitle">Supporting actions and navigation controls for workflows</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('secondary')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Secondary Actions</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-secondary" onclick="handleButtonAction('cancel')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Cancel
                        </button>
                        <button class="btn btn-secondary" onclick="handleButtonAction('draft')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            Save as Draft
                        </button>
                        <button class="btn btn-secondary" onclick="handleButtonAction('export')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Export Data
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Navigation Controls</h4>
                    <div class="button-demo-actions">
                        <div class="btn-group">
                            <button class="btn btn-secondary" onclick="handleButtonAction('first-page')" title="First Page">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button class="btn btn-secondary" onclick="handleButtonAction('prev-page')" title="Previous">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button class="btn btn-secondary" onclick="handleButtonAction('next-page')" title="Next">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                            <button class="btn btn-secondary" onclick="handleButtonAction('last-page')" title="Last Page">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Ghost Buttons</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-ghost" onclick="handleButtonAction('close')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Close
                        </button>
                        <button class="btn btn-ghost" onclick="handleButtonAction('more-options')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>
                            More Options
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Status & Action Buttons --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon status">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Status & Action Buttons</h3>
                    <p class="showcase-subtitle">Status-specific actions for order management and approvals</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('status')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Success Actions</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-success" onclick="handleStatusAction('approve')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Approve Order
                        </button>
                        <button class="btn btn-success" onclick="handleStatusAction('complete')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Mark Complete
                        </button>
                        <button class="btn btn-success" onclick="handleStatusAction('activate')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Activate Account
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Warning Actions</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-warning" onclick="handleStatusAction('pending')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Mark Pending
                        </button>
                        <button class="btn btn-warning" onclick="handleStatusAction('review')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Needs Review
                        </button>
                        <button class="btn btn-warning" onclick="handleStatusAction('hold')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Put on Hold
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Danger Actions</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-danger" onclick="confirmDangerAction('delete')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Item
                        </button>
                        <button class="btn btn-danger" onclick="confirmDangerAction('suspend')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18 12M6 12l12 0"/>
                            </svg>
                            Suspend Account
                        </button>
                        <button class="btn btn-danger" onclick="confirmDangerAction('reject')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Reject Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Action Buttons --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon table-actions">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Table Action Buttons</h3>
                    <p class="showcase-subtitle">Row-level actions for data tables and list management</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('table-actions')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Primary Table Actions</h4>
                    <div class="button-demo-actions">
                        <div class="table-action-group">
                            <button class="table-action-btn view" onclick="handleTableAction('view', 123)" title="View Details">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button class="table-action-btn edit" onclick="handleTableAction('edit', 123)" title="Edit Item">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="table-action-btn duplicate" onclick="handleTableAction('duplicate', 123)" title="Duplicate">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </button>
                            <button class="table-action-btn delete" onclick="handleTableAction('delete', 123)" title="Delete">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Bulk Actions</h4>
                    <div class="button-demo-actions">
                        <div class="bulk-actions-demo">
                            <span class="selection-count">3 items selected</span>
                            <div class="bulk-action-buttons">
                                <button class="btn btn-secondary btn-sm" onclick="handleBulkAction('export')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Export
                                </button>
                                <button class="btn btn-warning btn-sm" onclick="handleBulkAction('archive')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8l6 6 6-6"/>
                                    </svg>
                                    Archive
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="handleBulkAction('delete')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Status Actions</h4>
                    <div class="button-demo-actions">
                        <div class="table-action-group">
                            <button class="table-action-btn approve" onclick="handleTableAction('approve', 123)" title="Approve">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </button>
                            <button class="table-action-btn reject" onclick="handleTableAction('reject', 123)" title="Reject">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            <button class="table-action-btn send" onclick="handleTableAction('send', 123)" title="Send">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                            <button class="table-action-btn download" onclick="handleTableAction('download', 123)" title="Download">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Button Groups & Combinations --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon groups">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Button Groups & Combinations</h3>
                    <p class="showcase-subtitle">Grouped controls and combined action patterns</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('groups')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Tab Groups</h4>
                    <div class="button-demo-actions">
                        <div class="btn-group" role="tablist">
                            <button class="btn btn-secondary active" onclick="selectTab(this, 'overview')" role="tab">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                Overview
                            </button>
                            <button class="btn btn-secondary" onclick="selectTab(this, 'details')" role="tab">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Details
                            </button>
                            <button class="btn btn-secondary" onclick="selectTab(this, 'settings')" role="tab">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Settings
                            </button>
                        </div>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Action Combinations</h4>
                    <div class="button-demo-actions">
                        <div class="action-combo">
                            <button class="btn btn-primary" onclick="handleComboAction('save')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                Save
                            </button>
                            <button class="btn btn-success" onclick="handleComboAction('save-continue')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                </svg>
                                Save & Continue
                            </button>
                            <button class="btn btn-ghost" onclick="handleComboAction('cancel')">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Toolbar Groups</h4>
                    <div class="button-demo-actions">
                        <div class="toolbar-group">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('bold')" title="Bold">
                                    <strong>B</strong>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('italic')" title="Italic">
                                    <em>I</em>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('underline')" title="Underline">
                                    <u>U</u>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('align-left')" title="Align Left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                                    </svg>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('align-center')" title="Align Center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M8 12h8m-8 6h16"/>
                                    </svg>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="handleToolbarAction('align-right')" title="Align Right">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M12 12h8M4 18h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Styled Buttons --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon custom">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4 4 4 0 004-4V5z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Custom & Specialty Buttons</h3>
                    <p class="showcase-subtitle">Enhanced styling and special-purpose button variations</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('custom')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="button-grid">
                <div class="button-demo-card">
                    <h4 class="button-demo-title">Gradient Buttons</h4>
                    <div class="button-demo-actions">
                        <button class="btn-gradient btn-gradient-primary" onclick="handleCustomAction('premium')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                            Premium Feature
                        </button>
                        <button class="btn-gradient btn-gradient-success" onclick="handleCustomAction('achievement')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            Achievement Unlocked
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Outlined Buttons</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-outline-primary" onclick="handleCustomAction('outline-primary')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Learn More
                        </button>
                        <button class="btn btn-outline-success" onclick="handleCustomAction('outline-success')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Verify Account
                        </button>
                        <button class="btn btn-outline-danger" onclick="handleCustomAction('outline-danger')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            Report Issue
                        </button>
                    </div>
                </div>

                <div class="button-demo-card">
                    <h4 class="button-demo-title">Rounded & Special</h4>
                    <div class="button-demo-actions">
                        <button class="btn btn-primary btn-rounded" onclick="handleCustomAction('rounded-primary')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add New
                        </button>
                        <button class="btn btn-floating" onclick="handleCustomAction('floating')" title="Quick Action">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </button>
                        <button class="btn btn-icon-circle" onclick="handleCustomAction('icon-circle')" title="Settings">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Implementation Code Examples --}}
    <div class="button-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon code">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Implementation Examples</h3>
                    <p class="showcase-subtitle">Ready-to-use code patterns and component structures</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyButtonCode('implementation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="code-examples">
                <div class="code-example-card">
                    <h4 class="code-example-title">Basic Button Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Primary Action Button --&gt;
&lt;button class="btn btn-primary" onclick="action()"&gt;
    &lt;svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
        &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/&gt;
    &lt;/svg&gt;
    Save Changes
&lt;/button&gt;

&lt;!-- Secondary Button --&gt;
&lt;button class="btn btn-secondary"&gt;Cancel&lt;/button&gt;

&lt;!-- Button with Loading State --&gt;
&lt;button class="btn btn-primary"&gt;
    &lt;span class="btn-text"&gt;Process Order&lt;/span&gt;
    &lt;span class="btn-spinner" style="display: none;"&gt;
        &lt;div class="spinner"&gt;&lt;/div&gt;
    &lt;/span&gt;
&lt;/button&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Button Groups</h4>
                    <pre class="code-block"><code>&lt;!-- Tab Button Group --&gt;
&lt;div class="btn-group" role="tablist"&gt;
    &lt;button class="btn btn-secondary active" role="tab"&gt;Overview&lt;/button&gt;
    &lt;button class="btn btn-secondary" role="tab"&gt;Details&lt;/button&gt;
    &lt;button class="btn btn-secondary" role="tab"&gt;Settings&lt;/button&gt;
&lt;/div&gt;

&lt;!-- Table Action Group --&gt;
&lt;div class="table-action-group"&gt;
    &lt;button class="table-action-btn view" title="View"&gt;👁️&lt;/button&gt;
    &lt;button class="table-action-btn edit" title="Edit"&gt;✏️&lt;/button&gt;
    &lt;button class="table-action-btn delete" title="Delete"&gt;🗑️&lt;/button&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Custom Button Styles</h4>
                    <pre class="code-block"><code>&lt;!-- Gradient Button --&gt;
&lt;button class="btn-gradient btn-gradient-primary"&gt;
    ✨ Premium Feature
&lt;/button&gt;

&lt;!-- Outlined Button --&gt;
&lt;button class="btn btn-outline-primary"&gt;
    Learn More
&lt;/button&gt;

&lt;!-- Floating Action Button --&gt;
&lt;button class="btn btn-floating" title="Quick Action"&gt;
    &lt;svg class="w-5 h-5"&gt;...&lt;/svg&gt;
&lt;/button&gt;

&lt;!-- Icon Circle Button --&gt;
&lt;button class="btn btn-icon-circle" title="Settings"&gt;
    &lt;svg class="w-5 h-5"&gt;...&lt;/svg&gt;
&lt;/button&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('head')
<style>
/* Hero Section */
.library-hero {
    background: linear-gradient(135deg, var(--brand-50) 0%, var(--brand-100) 100%);
    border-radius: var(--radius-3xl);
    padding: var(--space-12) var(--space-8);
    margin-bottom: var(--space-8);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.library-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 10px,
        rgba(59, 130, 246, 0.03) 10px,
        rgba(59, 130, 246, 0.03) 20px
    );
    opacity: 0.7;
}

.hero-content {
    position: relative;
    z-index: 1;
}

.hero-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--brand-600), var(--brand-700));
    border-radius: var(--radius-3xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0 auto var(--space-6);
    box-shadow: var(--shadow-xl);
}

.hero-title {
    font-size: var(--text-4xl);
    font-weight: 800;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
    letter-spacing: -0.025em;
}

.hero-description {
    font-size: var(--text-lg);
    color: var(--neutral-700);
    max-width: 700px;
    margin: 0 auto var(--space-8);
    line-height: 1.6;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: var(--space-8);
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: var(--text-3xl);
    font-weight: 700;
    color: var(--brand-700);
    line-height: 1;
    margin-bottom: var(--space-1);
}

.stat-label {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    font-weight: 500;
}

/* Button Showcases */
.button-showcase {
    background: white;
    border-radius: var(--radius-3xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-slow);
    margin-bottom: var(--space-8);
}

.button-showcase:hover {
    box-shadow: var(--shadow-xl);
    transform: translateY(-4px);
    border-color: var(--brand-200);
}

.showcase-header {
    padding: var(--space-8) var(--space-8) var(--space-6);
    background: var(--neutral-50);
    border-bottom: 1px solid var(--neutral-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
    flex-wrap: wrap;
}

.showcase-info {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    flex: 1;
}

.showcase-icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: var(--shadow-lg);
}

.showcase-icon.primary {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.secondary {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
}

.showcase-icon.status {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.table-actions {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.groups {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.custom {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.code {
    background: linear-gradient(135deg, var(--neutral-600), var(--neutral-800));
}

.showcase-text {
    flex: 1;
}

.showcase-title {
    font-size: var(--text-2xl);
    font-weight: 700;
    color: var(--neutral-900);
    margin: 0 0 var(--space-2) 0;
    line-height: 1.2;
}

.showcase-subtitle {
    font-size: var(--text-base);
    color: var(--neutral-600);
    margin: 0;
    line-height: 1.4;
}

.copy-btn {
    width: 48px;
    height: 48px;
    background: var(--brand-600);
    color: white;
    border: none;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    flex-shrink: 0;
}

.copy-btn:hover {
    background: var(--brand-700);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.showcase-body {
    padding: var(--space-8);
}

/* Button Grids */
.button-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.button-demo-card {
    background: var(--neutral-50);
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    border: 1px solid var(--neutral-200);
    transition: all var(--transition-base);
}

.button-demo-card:hover {
    background: white;
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.button-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
    text-align: center;
}

.button-demo-actions {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    align-items: center;
}

/* Button Groups */
.btn-group {
    display: inline-flex;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.btn-group .btn {
    border-radius: 0;
    border-right: 1px solid rgba(255,255,255,0.2);
    margin-right: 0;
}

.btn-group .btn:last-child {
    border-right: none;
}

.btn-group .btn:first-child {
    border-top-left-radius: var(--radius-lg);
    border-bottom-left-radius: var(--radius-lg);
}

.btn-group .btn:last-child {
    border-top-right-radius: var(--radius-lg);
    border-bottom-right-radius: var(--radius-lg);
}

/* Table Action Buttons */
.table-action-group {
    display: flex;
    gap: var(--space-2);
    align-items: center;
    justify-content: center;
}

.table-action-btn {
    width: 36px;
    height: 36px;
    border: 1px solid var(--neutral-300);
    background: white;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    color: var(--neutral-600);
    font-size: var(--text-base);
}

.table-action-btn:hover {
    background: var(--neutral-50);
    border-color: var(--brand-400);
    color: var(--brand-600);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.table-action-btn.view:hover {
    background: var(--brand-50);
    color: var(--brand-600);
}

.table-action-btn.edit:hover {
    background: var(--warning-50);
    color: var(--warning-600);
    border-color: var(--warning-300);
}

.table-action-btn.delete:hover {
    background: var(--danger-50);
    color: var(--danger-600);
    border-color: var(--danger-300);
}

.table-action-btn.approve:hover {
    background: var(--success-50);
    color: var(--success-600);
    border-color: var(--success-300);
}

.table-action-btn.reject:hover {
    background: var(--danger-50);
    color: var(--danger-600);
    border-color: var(--danger-300);
}

.table-action-btn.send:hover {
    background: var(--brand-50);
    color: var(--brand-600);
    border-color: var(--brand-300);
}

.table-action-btn.download:hover {
    background: var(--success-50);
    color: var(--success-600);
    border-color: var(--success-300);
}

/* Bulk Actions */
.bulk-actions-demo {
    background: var(--brand-50);
    border-radius: var(--radius-xl);
    padding: var(--space-4);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
    border: 1px solid var(--brand-200);
    flex-wrap: wrap;
}

.selection-count {
    font-weight: 500;
    color: var(--brand-700);
    font-size: var(--text-sm);
}

.bulk-action-buttons {
    display: flex;
    gap: var(--space-2);
}

/* Action Combinations */
.action-combo {
    display: flex;
    gap: var(--space-3);
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
}

.toolbar-group {
    display: flex;
    gap: var(--space-4);
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
}

/* Custom Button Styles */
.btn-gradient {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
    color: white;
    border: none;
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    box-shadow: var(--shadow-sm);
}

.btn-gradient:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-lg);
}

.btn-gradient-primary {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.btn-gradient-success {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

/* Outlined buttons */
.btn-outline-primary {
    background: transparent;
    color: var(--brand-600);
    border: 2px solid var(--brand-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-primary:hover {
    background: var(--brand-600);
    color: white;
}

.btn-outline-success {
    background: transparent;
    color: var(--success-600);
    border: 2px solid var(--success-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-success:hover {
    background: var(--success-600);
    color: white;
}

.btn-outline-danger {
    background: transparent;
    color: var(--danger-600);
    border: 2px solid var(--danger-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-danger:hover {
    background: var(--danger-600);
    color: white;
}

/* Rounded buttons */
.btn-rounded {
    border-radius: var(--radius-full);
}

/* Floating action button */
.btn-floating {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-full);
    background: var(--brand-600);
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
}

.btn-floating:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    background: var(--brand-700);
}

.btn-floating::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1));
    transition: opacity var(--transition-fast);
    opacity: 0;
}

.btn-floating:hover::before {
    opacity: 1;
}

/* Icon circle button */
.btn-icon-circle {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    background: var(--neutral-100);
    color: var(--neutral-700);
    border: 1px solid var(--neutral-300);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-base);
}

.btn-icon-circle:hover {
    background: var(--brand-50);
    color: var(--brand-600);
    border-color: var(--brand-300);
    transform: translateY(-1px);
}

/* Button spinner styles */
.btn-spinner {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.spinner {
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: white;
    border-radius: var(--radius-full);
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Code Examples */
.code-examples {
    display: grid;
    gap: var(--space-6);
}

.code-example-card {
    background: var(--neutral-50);
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    border: 1px solid var(--neutral-200);
}

.code-example-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
}

.code-block {
    background: var(--neutral-900);
    color: var(--neutral-100);
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    overflow-x: auto;
    font-size: var(--text-sm);
    line-height: 1.5;
    font-family: var(--font-mono);
    margin: 0;
}

.code-block code {
    background: none;
    color: inherit;
    padding: 0;
    font-size: inherit;
    font-family: inherit;
}

/* Dark Mode Support */
[data-theme="dark"] .library-hero {
    background: linear-gradient(135deg, var(--neutral-200) 0%, var(--neutral-300) 100%);
}

[data-theme="dark"] .button-showcase {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .showcase-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .button-demo-card {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .button-demo-card:hover {
    background: var(--neutral-100);
}

[data-theme="dark"] .bulk-actions-demo {
    background: var(--brand-950);
    border-color: var(--brand-700);
}

[data-theme="dark"] .table-action-btn {
    background: var(--neutral-100);
    border-color: var(--neutral-400);
    color: var(--neutral-700);
}

[data-theme="dark"] .table-action-btn:hover {
    background: var(--neutral-200);
}

[data-theme="dark"] .btn-icon-circle {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
    color: var(--neutral-700);
}

[data-theme="dark"] .btn-icon-circle:hover {
    background: var(--brand-950);
    color: var(--brand-300);
    border-color: var(--brand-700);
}

[data-theme="dark"] .code-example-card {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .btn-outline-primary {
    color: var(--brand-400);
    border-color: var(--brand-400);
}

[data-theme="dark"] .btn-outline-primary:hover {
    background: var(--brand-400);
    color: var(--neutral-900);
}

[data-theme="dark"] .btn-outline-success {
    color: var(--success-400);
    border-color: var(--success-400);
}

[data-theme="dark"] .btn-outline-success:hover {
    background: var(--success-400);
    color: var(--neutral-900);
}

[data-theme="dark"] .btn-outline-danger {
    color: var(--danger-400);
    border-color: var(--danger-400);
}

[data-theme="dark"] .btn-outline-danger:hover {
    background: var(--danger-400);
    color: var(--neutral-900);
}

/* Responsive Design */
@media (max-width: 768px) {
    .library-hero {
        padding: var(--space-8) var(--space-4);
    }
    
    .hero-title {
        font-size: var(--text-3xl);
    }
    
    .hero-stats {
        gap: var(--space-4);
    }
    
    .showcase-header {
        flex-direction: column;
        align-items: stretch;
        gap: var(--space-4);
    }
    
    .showcase-info {
        justify-content: center;
        text-align: center;
    }
    
    .copy-btn {
        align-self: center;
    }
    
    .button-grid {
        grid-template-columns: 1fr;
    }
    
    .action-combo,
    .toolbar-group {
        justify-content: flex-start;
    }
    
    .bulk-actions-demo {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-group .btn {
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        border-radius: 0;
    }
    
    .btn-group .btn:last-child {
        border-bottom: none;
    }
    
    .btn-group .btn:first-child {
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }
    
    .btn-group .btn:last-child {
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }
}
</style>
@endpush

@push('scripts')
@verbatim
<script>
// Button interaction functions
function handleButtonAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`${action} action triggered!`, 'info');
    }
    console.log(`Button action: ${action}`);
}

function handleStatusAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Status changed to: ${action}`, 'success');
    }
    console.log(`Status action: ${action}`);
}

function handleTableAction(action, id) {
    if (window.ManuCore) {
        ManuCore.showToast(`${action} action for item ${id}`, 'info');
    }
    console.log(`Table action: ${action} for ID: ${id}`);
}

function handleBulkAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Bulk ${action} completed!`, 'success');
    }
    console.log(`Bulk action: ${action}`);
}

function handleComboAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Combo action: ${action}`, 'info');
    }
    console.log(`Combo action: ${action}`);
}

function handleToolbarAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Toolbar: ${action}`, 'info');
    }
    console.log(`Toolbar action: ${action}`);
}

function handleCustomAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Custom action: ${action}`, 'info');
    }
    console.log(`Custom action: ${action}`);
}

function confirmDangerAction(action) {
    if (window.ManuCore) {
        ManuCore.confirmDelete(`${action.charAt(0).toUpperCase() + action.slice(1)} Item?`, 'This action cannot be undone!').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast(`${action} completed successfully`, 'success');
            }
        });
    }
}

function simulateLoading(button, text = 'Processing...') {
    const textSpan = button.querySelector('.btn-text');
    const spinnerSpan = button.querySelector('.btn-spinner');
    
    if (!textSpan || !spinnerSpan) {
        // Fallback for buttons without loading structure
        const originalText = button.textContent;
        button.disabled = true;
        button.innerHTML = '<div class="spinner"></div> ' + text;
        
        setTimeout(() => {
            button.disabled = false;
            button.textContent = originalText;
            if (window.ManuCore) {
                ManuCore.showToast('Process completed!', 'success');
            }
        }, 3000);
        return;
    }
    
    // Show loading state
    textSpan.style.display = 'none';
    spinnerSpan.style.display = 'inline-flex';
    button.disabled = true;
    
    // Simulate processing time
    setTimeout(() => {
        // Restore normal state
        textSpan.style.display = 'inline';
        spinnerSpan.style.display = 'none';
        button.disabled = false;
        
        if (window.ManuCore) {
            ManuCore.showToast('Process completed!', 'success');
        }
    }, 3000);
}

function selectTab(button, tab) {
    // Remove active class from all buttons in the group
    const group = button.closest('.btn-group');
    group.querySelectorAll('.btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Add active class to clicked button
    button.classList.add('active');
    
    if (window.ManuCore) {
        ManuCore.showToast(`Selected tab: ${tab}`, 'info');
    }
}

function copyButtonCode(category) {
    const buttonExamples = {
        primary: `<!-- Primary Action Buttons -->
<button class="btn btn-primary" onclick="action()">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
    </svg>
    Create Order
</button>

<!-- Loading Button -->
<button class="btn btn-primary" onclick="simulateLoading(this)">
    <span class="btn-text">Process Order</span>
    <span class="btn-spinner" style="display: none;">
        <div class="spinner"></div>
    </span>
</button>`,

        secondary: `<!-- Secondary Actions -->
<button class="btn btn-secondary">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
    Cancel
</button>

<!-- Navigation Group -->
<div class="btn-group">
    <button class="btn btn-secondary" title="First Page">⏮</button>
    <button class="btn btn-secondary" title="Previous">◀</button>
    <button class="btn btn-secondary" title="Next">▶</button>
    <button class="btn btn-secondary" title="Last Page">⏭</button>
</div>`,

        status: `<!-- Status Action Buttons -->
<button class="btn btn-success">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
    </svg>
    Approve Order
</button>

<button class="btn btn-warning">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    Mark Pending
</button>

        <button class="btn btn-danger" onclick="confirmDelete()">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
    </svg>
    Delete Item
</button>`,

        'table-actions': `<!-- Table Action Buttons -->
<div class="table-action-group">
    <button class="table-action-btn view" onclick="handleTableAction('view', 123)" title="View Details">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
    </button>
    <button class="table-action-btn edit" onclick="handleTableAction('edit', 123)" title="Edit Item">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
        </svg>
    </button>
    <button class="table-action-btn delete" onclick="handleTableAction('delete', 123)" title="Delete">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
    </button>
</div>

<!-- Bulk Actions -->
<div class="bulk-actions-demo">
    <span class="selection-count">3 items selected</span>
    <div class="bulk-action-buttons">
        <button class="btn btn-secondary btn-sm" onclick="handleBulkAction('export')">Export</button>
        <button class="btn btn-warning btn-sm" onclick="handleBulkAction('archive')">Archive</button>
        <button class="btn btn-danger btn-sm" onclick="handleBulkAction('delete')">Delete</button>
    </div>
</div>`,

        groups: `<!-- Button Groups -->
<div class="btn-group" role="tablist">
    <button class="btn btn-secondary active" onclick="selectTab(this, 'overview')" role="tab">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        Overview
    </button>
    <button class="btn btn-secondary" onclick="selectTab(this, 'details')" role="tab">Details</button>
    <button class="btn btn-secondary" onclick="selectTab(this, 'settings')" role="tab">Settings</button>
</div>

<!-- Action Combinations -->
<div class="action-combo">
    <button class="btn btn-primary">Save</button>
    <button class="btn btn-success">Save & Continue</button>
    <button class="btn btn-ghost">Cancel</button>
</div>`,

        custom: `<!-- Gradient Buttons -->
<button class="btn-gradient btn-gradient-primary">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
    </svg>
    Premium Feature
</button>

<!-- Outlined Buttons -->
<button class="btn btn-outline-primary">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    Learn More
</button>

<!-- Floating Action Button -->
<button class="btn btn-floating" title="Quick Action">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
    </svg>
</button>

<!-- Icon Circle Button -->
<button class="btn btn-icon-circle" title="Settings">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
    </svg>
</button>`,

        implementation: `<!-- Complete Button Implementation Examples -->

<!-- Basic Button Structure -->
<button class="btn btn-primary" onclick="action()">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
    </svg>
    Save Changes
</button>

<!-- Button Sizes -->
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Regular</button>
<button class="btn btn-primary btn-lg">Large</button>
<button class="btn btn-primary btn-xl">Extra Large</button>

<!-- Button States -->
<button class="btn btn-primary">Normal</button>
<button class="btn btn-primary active">Active</button>
<button class="btn btn-primary" disabled>Disabled</button>

<!-- Loading State -->
<button class="btn btn-primary" onclick="simulateLoading(this)">
    <span class="btn-text">Process Order</span>
    <span class="btn-spinner" style="display: none;">
        <div class="spinner"></div>
    </span>
</button>

<!-- Button Groups -->
<div class="btn-group">
    <button class="btn btn-secondary active">Tab 1</button>
    <button class="btn btn-secondary">Tab 2</button>
    <button class="btn btn-secondary">Tab 3</button>
</div>

<!-- Table Actions -->
<div class="table-action-group">
    <button class="table-action-btn view" title="View">👁️</button>
    <button class="table-action-btn edit" title="Edit">✏️</button>
    <button class="table-action-btn delete" title="Delete">🗑️</button>
</div>

<!-- Custom Styles -->
<button class="btn-gradient btn-gradient-primary">Premium</button>
<button class="btn btn-outline-primary">Outlined</button>
<button class="btn btn-floating">+</button>`
    };
    
    const code = buttonExamples[category];
    if (!code) {
        console.error('Button category not found:', category);
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast(`${category.charAt(0).toUpperCase() + category.slice(1)} button code copied!`, 'success');
        }
    }).catch(() => {
        console.log('Button code:', code);
        if (window.ManuCore) {
            ManuCore.showToast('Code logged to console', 'info');
        }
    });
}

function exportButtonLibrary() {
    const completeLibrary = `/* MANUCORE ERP - BUTTON LIBRARY */
Complete ERP/CRM button system with professional styling:
- Primary, Secondary, Success, Warning, Danger variants
- Multiple sizes (sm, regular, lg, xl)
- Loading states with spinners
- Button groups and combinations
- Table action buttons
- Custom gradients and outlined styles
- Floating action buttons
- Full dark mode support
- Responsive design patterns
- Complete accessibility support`;

    navigator.clipboard.writeText(completeLibrary).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast('Complete button library exported!', 'success');
        }
    });
}

// Initialize button functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔘 Enhanced Button Examples loaded');
    
    // Add hover effects to gradient buttons
    const gradientButtons = document.querySelectorAll('.btn-gradient');
    gradientButtons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'translateY(-2px)';
            button.style.boxShadow = 'var(--shadow-xl)';
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.transform = '';
            button.style.boxShadow = '';
        });
    });
    
    // Add ripple effect to floating buttons
    const floatingButtons = document.querySelectorAll('.btn-floating');
    floatingButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add CSS for ripple animation
    if (!document.querySelector('#ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Initialize tooltips
    if (window.ManuCore && ManuCore.initTooltips) {
        ManuCore.initTooltips();
    }
    
    // Enhanced button interactions
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('mousedown', function() {
            if (!this.disabled) {
                this.style.transform = 'translateY(1px)';
            }
        });
        
        button.addEventListener('mouseup', function() {
            this.style.transform = '';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
});
</script>
@endverbatim
@endpush