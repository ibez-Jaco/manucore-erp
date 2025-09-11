@extends('layouts.panel')

@section('title', 'Form Components - ManuCore ERP')

@section('header', 'ERP/CRM Form Component Library')
@section('subheader', 'Comprehensive form system for data entry, validation, and complex business workflows')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-primary" onclick="exportFormLibrary()">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h2 class="hero-title">ERP/CRM Form Components</h2>
            <p class="hero-description">Professional form system for manufacturing and business management with comprehensive validation, complex data entry patterns, and advanced workflow components for quotes, orders, and customer management.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">12+</div>
                    <div class="stat-label">Form Types</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">25+</div>
                    <div class="stat-label">Input Components</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Validation Patterns</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Layout Options</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Basic Form Elements --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon basic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Basic Form Elements</h3>
                    <p class="showcase-subtitle">Standard input components with consistent styling and validation</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('basic')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Standard Form Controls</h4>
                </div>
                <div class="card-body">
                    <form class="space-y-4">
                        @csrf
                        
                        {{-- Text Inputs --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Text Input</label>
                                <input type="text" class="form-input" placeholder="Enter text here">
                                <div class="form-help">Standard text input field</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Required Field *</label>
                                <input type="text" class="form-input" required placeholder="This field is required">
                            </div>
                        </div>

                        {{-- Email and Password --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Email Input</label>
                                <input type="email" class="form-input" placeholder="user@example.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password Input</label>
                                <input type="password" class="form-input" placeholder="••••••••">
                            </div>
                        </div>

                        {{-- Number and Tel --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Number Input</label>
                                <input type="number" class="form-input" placeholder="123" min="0" max="1000">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-input" placeholder="+27 11 123 4567">
                            </div>
                        </div>

                        {{-- Select and Textarea --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Select Dropdown</label>
                                <select class="form-select">
                                    <option value="">Choose an option</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2" selected>Option 2 (Selected)</option>
                                    <option value="option3">Option 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">File Upload</label>
                                <input type="file" class="form-input" accept=".pdf,.doc,.docx">
                                <div class="form-help">Supported formats: PDF, DOC, DOCX</div>
                            </div>
                        </div>

                        {{-- Textarea --}}
                        <div class="form-group">
                            <label class="form-label">Textarea</label>
                            <textarea class="form-textarea" rows="4" placeholder="Enter detailed description...">Sample textarea content with multiple lines of text that demonstrates how the component handles longer form content.</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Form States & Validation --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon validation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Form States & Validation</h3>
                    <p class="showcase-subtitle">Input states with real-time validation feedback</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('validation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Input States & Validation</h4>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        {{-- Success State --}}
                        <div class="form-group">
                            <label class="form-label">Valid Input</label>
                            <input type="text" class="form-input form-input-success" value="john@example.com">
                            <div class="form-success">✓ Email format is valid</div>
                        </div>

                        {{-- Error State --}}
                        <div class="form-group">
                            <label class="form-label">Invalid Input</label>
                            <input type="text" class="form-input form-input-error" value="invalid-email">
                            <div class="form-error">Please enter a valid email address</div>
                        </div>

                        {{-- Disabled State --}}
                        <div class="form-group">
                            <label class="form-label">Disabled Input</label>
                            <input type="text" class="form-input" value="This field is disabled" disabled>
                        </div>

                        {{-- Size Variants --}}
                        <div class="space-y-3">
                            <div class="form-group">
                                <label class="form-label">Small Input</label>
                                <input type="text" class="form-input form-input-sm" placeholder="Small input field">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Large Input</label>
                                <input type="text" class="form-input form-input-lg" placeholder="Large input field">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Form Components --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon custom">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Custom Form Components</h3>
                    <p class="showcase-subtitle">Advanced controls and interactive elements</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('custom')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Advanced Form Controls</h4>
                </div>
                <div class="card-body">
                    <div class="space-y-6">
                        {{-- Toggle Switch --}}
                        <div class="form-group">
                            <label class="form-label">Toggle Switch</label>
                            <div class="gap-3 d-flex align-center">
                                <div class="toggle-switch" onclick="toggleSwitch(this)">
                                    <div class="toggle-slider"></div>
                                </div>
                                <span class="text-sm">Enable notifications</span>
                            </div>
                        </div>

                        {{-- Range Slider --}}
                        <div class="form-group">
                            <label class="form-label">Range Slider</label>
                            <div class="gap-4 d-flex align-center">
                                <input type="range" class="flex-1" min="0" max="100" value="75" id="range-slider">
                                <span class="w-12 text-sm font-medium text-center" id="range-value">75</span>
                            </div>
                        </div>

                        {{-- Color Picker --}}
                        <div class="form-group">
                            <label class="form-label">Color Selection</label>
                            <div class="gap-2 d-flex align-center">
                                <input type="color" class="form-input" value="#2563eb" style="width: 60px; height: 40px; padding: 4px;">
                                <input type="text" class="form-input" value="#2563eb" style="font-family: monospace;">
                            </div>
                        </div>

                        {{-- Tag Input --}}
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <div class="tag-input">
                                <div class="tag-container">
                                    <span class="tag">Manufacturing <button onclick="removeTag(this)">×</button></span>
                                    <span class="tag">Industrial <button onclick="removeTag(this)">×</button></span>
                                    <span class="tag">ERP <button onclick="removeTag(this)">×</button></span>
                                    <input type="text" class="tag-input-field" placeholder="Add tag..." onkeypress="addTag(event)">
                                </div>
                            </div>
                        </div>

                        {{-- File Upload Area --}}
                        <div class="form-group">
                            <label class="form-label">Drag & Drop Upload</label>
                            <div class="upload-area" onclick="document.getElementById('file-upload').click()">
                                <div class="upload-content">
                                    <div class="upload-icon">
                                        <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                    </div>
                                    <div class="upload-text">
                                        <div class="upload-title">Click to upload or drag and drop</div>
                                        <div class="upload-subtitle">PDF, DOC, XLS up to 10MB</div>
                                    </div>
                                </div>
                                <input type="file" id="file-upload" multiple accept=".pdf,.doc,.docx,.xls,.xlsx" style="display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Multi-step Forms --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon multistep">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Multi-step Forms</h3>
                    <p class="showcase-subtitle">Progressive forms with step navigation and validation</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('multistep')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Customer Registration Wizard</h4>
                </div>
                <div class="card-body">
                    {{-- Progress Indicator --}}
                    <div class="mb-6">
                        <div class="justify-between mb-2 d-flex align-center">
                            <span class="text-sm font-medium text-brand-600">Step 2 of 4</span>
                            <span class="text-sm text-neutral-500">50% Complete</span>
                        </div>
                        <div class="h-2 rounded-full w-100 bg-neutral-200">
                            <div class="h-2 rounded-full bg-brand-600" style="width: 50%"></div>
                        </div>
                    </div>

                    {{-- Step Content --}}
                    <div class="space-y-4">
                        <h5 class="font-medium text-neutral-900">Company Information</h5>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Company Name *</label>
                                <input type="text" class="form-input" value="Acme Manufacturing Ltd.">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Registration Number</label>
                                <input type="text" class="form-input" value="2019/123456/07">
                            </div>
                            <div class="form-group">
                                <label class="form-label">VAT Number</label>
                                <input type="text" class="form-input" placeholder="4123456789">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Industry Type</label>
                                <select class="form-select">
                                    <option value="">Select Industry</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="retail">Retail</option>
                                    <option value="services">Services</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Navigation --}}
                    <div class="justify-between mt-6 d-flex">
                        <button class="btn btn-secondary" onclick="handleStepNavigation('previous')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Previous
                        </button>
                        <button class="btn btn-primary" onclick="handleStepNavigation('next')">
                            Next
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quote Item Entry Forms --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon quote">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 00-4-4H4a2 2 0 01-2-2v-1a2 2 0 012-2h1a4 4 0 004-4V2a2 2 0 012-2h2a2 2 0 012 2v1a4 4 0 004 4h1a2 2 0 012 2v1a2 2 0 01-2 2h-1a4 4 0 00-4 4v2a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Quote Item Entry Forms</h3>
                    <p class="showcase-subtitle">Product and service line item forms for quotes and orders</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('quote')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="space-y-6">
                {{-- Standard Product Entry --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">Standard Product Entry</h4>
                        <p class="text-sm text-neutral-600">Manual entry with dimensions and specifications</p>
                    </div>
                    <div class="card-body">
                        <div class="quote-items-table">
                            <div class="table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Height (mm)</th>
                                            <th>Width (mm)</th>
                                            <th>Depth (mm)</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" value="Custom Steel Frame" placeholder="Enter description">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2000" placeholder="0" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1500" placeholder="0" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="300" placeholder="0" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1250.00" step="0.01" style="width: 100px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 2,500.00</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)" title="Remove">
                                                    <svg class="w-4 h-4 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" value="Premium Finish Coating" placeholder="Enter description">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2000" placeholder="0" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1500" placeholder="0" style="width: 90px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="" placeholder="N/A" style="width: 90px;" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="850.00" step="0.01" style="width: 100px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 850.00</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)" title="Remove">
                                                    <svg class="w-4 h-4 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-actions">
                                <button class="btn btn-secondary btn-sm" onclick="addQuoteItem('standard')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Add Item
                                </button>
                                <div class="quote-total">
                                    <strong>Subtotal: R 3,350.00</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Dropdown Product Selection --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">Product Catalog Entry</h4>
                        <p class="text-sm text-neutral-600">Select from existing product catalog with automatic pricing</p>
                    </div>
                    <div class="card-body">
                        <div class="quote-items-table">
                            <div class="table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>SKU</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Discount %</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-select form-input-sm" onchange="updateProductDetails(this)">
                                                    <option value="">Select Product</option>
                                                    <option value="STL-001" selected>Steel Frame - Standard</option>
                                                    <option value="STL-002">Steel Frame - Premium</option>
                                                    <option value="ALU-001">Aluminium Frame - Standard</option>
                                                    <option value="ALU-002">Aluminium Frame - Premium</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" value="STL-001" readonly style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="5" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1200.00" step="0.01" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="10" min="0" max="100" style="width: 80px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 5,400.00</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)" title="Remove">
                                                    <svg class="w-4 h-4 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-select form-input-sm" onchange="updateProductDetails(this)">
                                                    <option value="">Select Product</option>
                                                    <option value="STL-001">Steel Frame - Standard</option>
                                                    <option value="STL-002">Steel Frame - Premium</option>
                                                    <option value="ALU-001">Aluminium Frame - Standard</option>
                                                    <option value="ALU-002" selected>Aluminium Frame - Premium</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" value="ALU-002" readonly style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="3" min="1" style="width: 80px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1850.00" step="0.01" style="width: 100px;">
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="5" min="0" max="100" style="width: 80px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 5,267.50</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)" title="Remove">
                                                    <svg class="w-4 h-4 text-danger-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-actions">
                                <button class="btn btn-secondary btn-sm" onclick="addQuoteItem('catalog')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Add Product
                                </button>
                                <div class="quote-total">
                                    <strong>Subtotal: R 10,667.50</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Complex & Nested Forms --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon nested">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Complex & Nested Forms</h3>
                    <p class="showcase-subtitle">Dynamic forms with calculated components and nested structures</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('nested')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Custom Furniture Configuration</h4>
                    <p class="text-sm text-neutral-600">Enter dimensions and automatically generate required components</p>
                </div>
                <div class="card-body">
                    <div class="space-y-6">
                        {{-- Main Configuration --}}
                        <div class="form-section">
                            <div class="form-section-title">
                                <h5 class="font-medium text-neutral-900">Cupboard Specifications</h5>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
                                <div class="form-group">
                                    <label class="form-label">Cupboard Type *</label>
                                    <select class="form-select" id="cupboard-type" onchange="updateCupboardComponents()">
                                        <option value="">Select Type</option>
                                        <option value="kitchen" selected>Kitchen Cupboard</option>
                                        <option value="bedroom">Bedroom Wardrobe</option>
                                        <option value="office">Office Cabinet</option>
                                        <option value="bathroom">Bathroom Vanity</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Height (mm) *</label>
                                    <input type="number" class="form-input" id="cupboard-height" value="2100" min="500" max="3000" onchange="updateCupboardComponents()">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Width (mm) *</label>
                                    <input type="number" class="form-input" id="cupboard-width" value="1800" min="300" max="5000" onchange="updateCupboardComponents()">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Depth (mm) *</label>
                                    <input type="number" class="form-input" id="cupboard-depth" value="600" min="200" max="800" onchange="updateCupboardComponents()">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div class="form-group">
                                    <label class="form-label">Material</label>
                                    <select class="form-select" id="cupboard-material" onchange="updateCupboardComponents()">
                                        <option value="melamine" selected>Melamine Board</option>
                                        <option value="plywood">Plywood</option>
                                        <option value="mdf">MDF</option>
                                        <option value="solid-wood">Solid Wood</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Finish</label>
                                    <select class="form-select" id="cupboard-finish" onchange="updateCupboardComponents()">
                                        <option value="natural" selected>Natural</option>
                                        <option value="white">White</option>
                                        <option value="black">Black</option>
                                        <option value="oak">Oak Veneer</option>
                                        <option value="walnut">Walnut Veneer</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Generated Components Table --}}
                        <div class="form-section">
                            <div class="form-section-title">
                                <h5 class="font-medium text-neutral-900">Required Components</h5>
                                <p class="text-sm text-neutral-600">Auto-generated based on specifications above</p>
                            </div>
                            <div class="table-container">
                                <table class="data-table" id="components-table">
                                    <thead>
                                        <tr>
                                            <th>Component</th>
                                            <th>Qty</th>
                                            <th>Dimensions (H×W×D)</th>
                                            <th>Material</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Side Panels</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2" readonly style="width: 60px;">
                                            </td>
                                            <td>
                                                <span class="font-mono text-sm">2100×600×18mm</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Melamine Board</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="245.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 490.00</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" placeholder="Optional notes" style="width: 150px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Top/Bottom Panels</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2" readonly style="width: 60px;">
                                            </td>
                                            <td>
                                                <span class="font-mono text-sm">1782×582×18mm</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Melamine Board</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="195.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 390.00</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" placeholder="Optional notes" style="width: 150px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Back Panel</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1" readonly style="width: 60px;">
                                            </td>
                                            <td>
                                                <span class="font-mono text-sm">2082×1782×6mm</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Hardboard</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="125.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 125.00</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" placeholder="Optional notes" style="width: 150px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Shelves</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="3" min="0" max="10" style="width: 60px;" onchange="updateShelfCost(this)">
                                            </td>
                                            <td>
                                                <span class="font-mono text-sm">1782×564×18mm</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Melamine Board</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="175.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 525.00</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-input form-input-sm" placeholder="Adjustable height" style="width: 150px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Doors</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="2" min="1" max="4" style="width: 60px;" onchange="updateDoorCost(this)">
                                            </td>
                                            <td>
                                                <span class="font-mono text-sm">2082×891×18mm</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Melamine Board</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="285.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 570.00</span>
                                            </td>
                                            <td>
                                                <select class="form-select form-input-sm" style="width: 150px;">
                                                    <option value="hinged" selected>Hinged</option>
                                                    <option value="sliding">Sliding</option>
                                                    <option value="bi-fold">Bi-fold</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hardware Kit</td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="1" readonly style="width: 60px;">
                                            </td>
                                            <td>
                                                <span class="text-sm">Complete Set</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">Hinges, Handles, Screws</span>
                                            </td>
                                            <td>
                                                <input type="number" class="form-input form-input-sm" value="350.00" step="0.01" style="width: 90px;">
                                            </td>
                                            <td>
                                                <span class="font-medium">R 350.00</span>
                                            </td>
                                            <td>
                                                <select class="form-select form-input-sm" style="width: 150px;">
                                                    <option value="standard" selected>Standard</option>
                                                    <option value="soft-close">Soft Close</option>
                                                    <option value="premium">Premium</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="font-medium text-right">Total Materials Cost:</td>
                                            <td class="text-lg font-bold">R 2,450.00</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="font-medium text-right">Labour (40%):</td>
                                            <td class="font-bold">R 980.00</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="font-medium text-right">Markup (25%):</td>
                                            <td class="font-bold">R 857.50</td>
                                            <td></td>
                                        </tr>
                                        <tr class="bg-brand-50">
                                            <td colspan="5" class="text-lg font-bold text-right">Final Quote Total:</td>
                                            <td class="text-xl font-bold text-brand-600">R 4,287.50</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        {{-- Additional Options --}}
                        <div class="form-section">
                            <div class="form-section-title">
                                <h5 class="font-medium text-neutral-900">Additional Options</h5>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                                <div class="form-group">
                                    <label class="gap-2 d-flex align-center">
                                        <input type="checkbox" onchange="toggleAdditionalCost(this, 350)">
                                        <span class="text-sm">LED Interior Lighting (+R 350)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="gap-2 d-flex align-center">
                                        <input type="checkbox" onchange="toggleAdditionalCost(this, 125)">
                                        <span class="text-sm">Mirror Panel (+R 125)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="gap-2 d-flex align-center">
                                        <input type="checkbox" checked onchange="toggleAdditionalCost(this, 200)">
                                        <span class="text-sm">Installation Service (+R 200)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="form-actions">
                            <div class="justify-between d-flex align-center">
                                <div class="space-x-3">
                                    <button type="button" class="btn btn-secondary" onclick="resetCupboardForm()">Reset Configuration</button>
                                    <button type="button" class="btn btn-success" onclick="saveConfiguration()">Save Configuration</button>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-neutral-600">Quote Valid Until: <strong>Oct 25, 2024</strong></div>
                                    <button type="submit" class="btn btn-primary btn-lg">Generate Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Implementation Examples --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon code">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Implementation Examples</h3>
                    <p class="showcase-subtitle">Ready-to-use code patterns and form structures</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('implementation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="code-examples">
                <div class="code-example-card">
                    <h4 class="code-example-title">Basic Form Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Basic Form Group --&gt;
&lt;div class="form-group"&gt;
    &lt;label class="form-label"&gt;Label Text *&lt;/label&gt;
    &lt;input type="text" class="form-input" required&gt;
    &lt;div class="form-help"&gt;Helper text&lt;/div&gt;
    &lt;div class="form-error"&gt;Error message&lt;/div&gt;
&lt;/div&gt;

&lt;!-- Form Grid Layout --&gt;
&lt;div class="grid grid-cols-1 gap-4 lg:grid-cols-2"&gt;
    &lt;div class="form-group"&gt;
        &lt;label class="form-label"&gt;Field 1&lt;/label&gt;
        &lt;input type="text" class="form-input"&gt;
    &lt;/div&gt;
    &lt;div class="form-group"&gt;
        &lt;label class="form-label"&gt;Field 2&lt;/label&gt;
        &lt;select class="form-select"&gt;
            &lt;option&gt;Option 1&lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Quote Item Table Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Quote Items Table --&gt;
&lt;div class="quote-items-table"&gt;
    &lt;div class="table-container"&gt;
        &lt;table class="data-table"&gt;
            &lt;thead&gt;
                &lt;tr&gt;
                    &lt;th&gt;Description&lt;/th&gt;
                    &lt;th&gt;Qty&lt;/th&gt;
                    &lt;th&gt;Unit Price&lt;/th&gt;
                    &lt;th&gt;Total&lt;/th&gt;
                    &lt;th&gt;Actions&lt;/th&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                &lt;tr&gt;
                    &lt;td&gt;
                        &lt;input type="text" class="form-input form-input-sm" placeholder="Enter description"&gt;
                    &lt;/td&gt;
                    &lt;td&gt;
                        &lt;input type="number" class="form-input form-input-sm" value="1" min="1"&gt;
                    &lt;/td&gt;
                    &lt;td&gt;
                        &lt;input type="number" class="form-input form-input-sm" step="0.01"&gt;
                    &lt;/td&gt;
                    &lt;td&gt;
                        &lt;span class="font-medium"&gt;R 0.00&lt;/span&gt;
                    &lt;/td&gt;
                    &lt;td&gt;
                        &lt;button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)"&gt;
                            &lt;svg class="w-4 h-4"&gt;...&lt;/svg&gt;
                        &lt;/button&gt;
                    &lt;/td&gt;
                &lt;/tr&gt;
            &lt;/tbody&gt;
        &lt;/table&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Custom Toggle Switch</h4>
                    <pre class="code-block"><code>&lt;!-- Toggle Switch Component --&gt;
&lt;div class="toggle-switch" onclick="toggleSwitch(this)"&gt;
    &lt;div class="toggle-slider"&gt;&lt;/div&gt;
&lt;/div&gt;

&lt;!-- CSS for Toggle Switch --&gt;
.toggle-switch {
    width: 48px;
    height: 24px;
    background: var(--neutral-300);
    border-radius: var(--radius-full);
    position: relative;
    cursor: pointer;
    transition: background var(--transition-fast);
}

.toggle-switch.active {
    background: var(--brand-600);
}

.toggle-slider {
    width: 20px;
    height: 20px;
    background: white;
    border-radius: var(--radius-full);
    position: absolute;
    top: 2px;
    left: 2px;
    transition: transform var(--transition-fast);
}

.toggle-switch.active .toggle-slider {
    transform: translateX(24px);
}</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Form Validation Classes</h4>
                    <pre class="code-block"><code>/* Form Validation State Classes */
.form-input-error {
    border-color: var(--danger-500);
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

.form-input-success {
    border-color: var(--success-500);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

.form-error {
    color: var(--danger-600);
    font-size: var(--text-xs);
    margin-top: var(--space-1);
}

.form-success {
    color: var(--success-600);
    font-size: var(--text-xs);
    margin-top: var(--space-1);
}

/* Size Variations */
.form-input-sm { padding: var(--space-2) var(--space-3); font-size: var(--text-sm); }
.form-input-lg { padding: var(--space-4) var(--space-4); font-size: var(--text-lg); }</code></pre>
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

/* Form Showcases */
.form-showcase {
    background: white;
    border-radius: var(--radius-3xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-slow);
    margin-bottom: var(--space-8);
}

.form-showcase:hover {
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

.showcase-icon.basic {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
}

.showcase-icon.validation {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.custom {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.multistep {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.quote {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.nested {
    background: linear-gradient(135deg, var(--neutral-600), var(--neutral-800));
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

/* Custom Form Components */
.toggle-switch {
    width: 48px;
    height: 24px;
    background: var(--neutral-300);
    border-radius: var(--radius-full);
    position: relative;
    cursor: pointer;
    transition: background var(--transition-fast);
}

.toggle-switch.active {
    background: var(--brand-600);
}

.toggle-slider {
    width: 20px;
    height: 20px;
    background: white;
    border-radius: var(--radius-full);
    position: absolute;
    top: 2px;
    left: 2px;
    transition: transform var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.toggle-switch.active .toggle-slider {
    transform: translateX(24px);
}

.tag-input {
    border: 1px solid var(--neutral-300);
    border-radius: var(--radius-lg);
    padding: var(--space-2);
    background: white;
    transition: border-color var(--transition-fast);
}

.tag-input:focus-within {
    border-color: var(--brand-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.tag-container {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
}

.tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
    padding: var(--space-1) var(--space-2);
    background: var(--brand-100);
    color: var(--brand-700);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
}

.tag button {
    background: none;
    border: none;
    color: var(--brand-600);
    cursor: pointer;
    padding: 0;
    font-size: 14px;
}

.tag-input-field {
    border: none;
    outline: none;
    padding: var(--space-1);
    min-width: 100px;
    flex: 1;
}

.upload-area {
    border: 2px dashed var(--neutral-300);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    text-align: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    background: var(--neutral-50);
}

.upload-area:hover {
    border-color: var(--brand-400);
    background: var(--brand-50);
}

.upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-3);
}

.upload-icon {
    color: var(--neutral-400);
}

.upload-title {
    font-weight: 500;
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.upload-subtitle {
    font-size: var(--text-sm);
    color: var(--neutral-500);
}

/* Quote Items Table */
.quote-items-table {
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.table-actions {
    padding: var(--space-4);
    background: var(--neutral-50);
    border-top: 1px solid var(--neutral-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.quote-total {
    font-size: var(--text-lg);
    color: var(--brand-600);
}

/* Form Sections */
.form-section {
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
}

.form-section-title {
    padding-bottom: var(--space-4);
    border-bottom: 1px solid var(--neutral-200);
    margin-bottom: var(--space-6);
}

.form-actions {
    padding-top: var(--space-6);
    border-top: 1px solid var(--neutral-200);
    margin-top: var(--space-6);
}

/* Form States */
.form-input-success {
    border-color: var(--success-500);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

.form-input-error {
    border-color: var(--danger-500);
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

.form-success {
    color: var(--success-600);
    font-size: var(--text-xs);
    margin-top: var(--space-1);
}

.form-error {
    color: var(--danger-600);
    font-size: var(--text-xs);
    margin-top: var(--space-1);
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

[data-theme="dark"] .form-showcase {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .showcase-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .card {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .card-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .form-section {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .upload-area {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .upload-area:hover {
    background: var(--brand-950);
    border-color: var(--brand-600);
}

[data-theme="dark"] .tag {
    background: var(--brand-950);
    color: var(--brand-300);
}

[data-theme="dark"] .quote-items-table {
    border-color: var(--neutral-400);
}

[data-theme="dark"] .table-actions {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .code-example-card {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
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
    
    .quote-items-table {
        overflow-x: auto;
    }
    
    .table-actions {
        flex-direction: column;
        gap: var(--space-3);
        align-items: stretch;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Form interaction functions
function copyFormCode(category) {
    const formExamples = {
        basic: `<!-- Basic Form Elements -->
<div class="form-group">
    <label class="form-label">Text Input</label>
    <input type="text" class="form-input" placeholder="Enter text here">
    <div class="form-help">Standard text input field</div>
</div>

<div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
    <div class="form-group">
        <label class="form-label">Email Input</label>
        <input type="email" class="form-input" placeholder="user@example.com">
    </div>
    <div class="form-group">
        <label class="form-label">Password Input</label>
        <input type="password" class="form-input" placeholder="••••••••">
    </div>
</div>

<div class="form-group">
    <label class="form-label">Select Dropdown</label>
    <select class="form-select">
        <option value="">Choose an option</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
    </select>
</div>`,

        validation: `<!-- Form States & Validation -->
<div class="form-group">
    <label class="form-label">Valid Input</label>
    <input type="text" class="form-input form-input-success" value="john@example.com">
    <div class="form-success">✓ Email format is valid</div>
</div>

<div class="form-group">
    <label class="form-label">Invalid Input</label>
    <input type="text" class="form-input form-input-error" value="invalid-email">
    <div class="form-error">Please enter a valid email address</div>
</div>

<div class="form-group">
    <label class="form-label">Small Input</label>
    <input type="text" class="form-input form-input-sm" placeholder="Small input field">
</div>`,

        custom: `<!-- Custom Form Components -->
<div class="form-group">
    <label class="form-label">Toggle Switch</label>
    <div class="gap-3 d-flex align-center">
        <div class="toggle-switch" onclick="toggleSwitch(this)">
            <div class="toggle-slider"></div>
        </div>
        <span class="text-sm">Enable notifications</span>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Tags</label>
    <div class="tag-input">
        <div class="tag-container">
            <span class="tag">Manufacturing <button onclick="removeTag(this)">×</button></span>
            <input type="text" class="tag-input-field" placeholder="Add tag..." onkeypress="addTag(event)">
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Drag & Drop Upload</label>
    <div class="upload-area" onclick="document.getElementById('file-upload').click()">
        <div class="upload-content">
            <div class="upload-icon">📁</div>
            <div class="upload-text">
                <div class="upload-title">Click to upload or drag and drop</div>
                <div class="upload-subtitle">PDF, DOC, XLS up to 10MB</div>
            </div>
        </div>
        <input type="file" id="file-upload" multiple style="display: none;">
    </div>
</div>`,

        multistep: `<!-- Multi-step Form -->
<div class="mb-6">
    <div class="justify-between mb-2 d-flex align-center">
        <span class="text-sm font-medium text-brand-600">Step 2 of 4</span>
        <span class="text-sm text-neutral-500">50% Complete</span>
    </div>
    <div class="h-2 rounded-full w-100 bg-neutral-200">
        <div class="h-2 rounded-full bg-brand-600" style="width: 50%"></div>
    </div>
</div>

<div class="space-y-4">
    <h5 class="font-medium text-neutral-900">Company Information</h5>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <div class="form-group">
            <label class="form-label">Company Name *</label>
            <input type="text" class="form-input" value="Acme Manufacturing Ltd.">
        </div>
        <div class="form-group">
            <label class="form-label">Registration Number</label>
            <input type="text" class="form-input" value="2019/123456/07">
        </div>
    </div>
</div>

<div class="justify-between mt-6 d-flex">
    <button class="btn btn-secondary">← Previous</button>
    <button class="btn btn-primary">Next →</button>
</div>`,

        quote: `<!-- Quote Item Entry Table -->
<div class="quote-items-table">
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Height (mm)</th>
                    <th>Width (mm)</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-input form-input-sm" placeholder="Enter description">
                    </td>
                    <td>
                        <input type="number" class="form-input form-input-sm" value="1" min="1" style="width: 80px;">
                    </td>
                    <td>
                        <input type="number" class="form-input form-input-sm" placeholder="0" style="width: 90px;">
                    </td>
                    <td>
                        <input type="number" class="form-input form-input-sm" placeholder="0" style="width: 90px;">
                    </td>
                    <td>
                        <input type="number" class="form-input form-input-sm" step="0.01" style="width: 100px;">
                    </td>
                    <td>
                        <span class="font-medium">R 0.00</span>
                    </td>
                    <td>
                        <button class="btn btn-ghost btn-sm" onclick="removeQuoteItem(this)">
                            <svg class="w-4 h-4">...</svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-actions">
        <button class="btn btn-secondary btn-sm" onclick="addQuoteItem()">Add Item</button>
        <div class="quote-total"><strong>Subtotal: R 0.00</strong></div>
    </div>
</div>`,

        nested: `<!-- Nested Form with Dynamic Components -->
<div class="form-section">
    <div class="form-section-title">
        <h5 class="font-medium text-neutral-900">Cupboard Specifications</h5>
    </div>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
        <div class="form-group">
            <label class="form-label">Cupboard Type *</label>
            <select class="form-select" onchange="updateCupboardComponents()">
                <option value="kitchen">Kitchen Cupboard</option>
                <option value="bedroom">Bedroom Wardrobe</option>
                <option value="office">Office Cabinet</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Height (mm) *</label>
            <input type="number" class="form-input" value="2100" onchange="updateCupboardComponents()">
        </div>
        <div class="form-group">
            <label class="form-label">Width (mm) *</label>
            <input type="number" class="form-input" value="1800" onchange="updateCupboardComponents()">
        </div>
        <div class="form-group">
            <label class="form-label">Depth (mm) *</label>
            <input type="number" class="form-input" value="600" onchange="updateCupboardComponents()">
        </div>
    </div>
</div>

<!-- Auto-generated Components Table -->
<div class="form-section">
    <div class="form-section-title">
        <h5 class="font-medium text-neutral-900">Required Components</h5>
        <p class="text-sm text-neutral-600">Auto-generated based on specifications above</p>
    </div>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Qty</th>
                    <th>Dimensions</th>
                    <th>Unit Cost</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody id="components-tbody">
                <!-- Components auto-populated by JavaScript -->
            </tbody>
        </table>
    </div>
</div>`,

        implementation: `<!-- Complete Form Implementation Examples -->

<!-- Basic Form Structure -->
<div class="form-group">
    <label class="form-label">Label Text *</label>
    <input type="text" class="form-input" required>
    <div class="form-help">Helper text</div>
    <div class="form-error">Error message</div>
</div>

<!-- Form Grid Layout -->
<div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
    <div class="form-group">
        <label class="form-label">Field 1</label>
        <input type="text" class="form-input">
    </div>
    <div class="form-group">
        <label class="form-label">Field 2</label>
        <select class="form-select">
            <option>Option 1</option>
        </select>
    </div>
</div>

<!-- Validation States -->
<input type="text" class="form-input form-input-error">
<div class="form-error">Error message</div>

<!-- Custom Toggle Switch -->
<div class="toggle-switch" onclick="toggleSwitch(this)">
    <div class="toggle-slider"></div>
</div>

<!-- Quote Items Table -->
<div class="quote-items-table">
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th