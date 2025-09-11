@extends('layouts.panel')

@section('title', 'Form Components - ManuCore ERP')

@section('header', 'ERP/CRM Form Component Library')
@section('subheader', 'Comprehensive form system for data entry, quotations, and business workflows')

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
            <p class="hero-description">Professional form system for data entry, validation, and business workflows with comprehensive patterns for quotations, orders, and customer management in manufacturing environments.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">12</div>
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
                    <div class="stat-label">Theme Variants</div>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Basic Form Elements</h3>
                    <p class="showcase-subtitle">Foundation form controls with validation and accessibility features</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('basic')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="form-demo-grid">
                <div class="form-demo-section">
                    <h4 class="form-demo-title">Text Inputs</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label class="form-label">Company Name *</label>
                                    <input type="text" class="form-input" placeholder="Acme Manufacturing Ltd." value="TechCorp Solutions">
                                    <div class="form-help">Legal business name</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-input" placeholder="contact@company.com" value="admin@techcorp.co.za">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-input" placeholder="+27 11 123 4567" value="+27 11 456 7890">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-demo-section">
                    <h4 class="form-demo-title">Select Controls</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label class="form-label">Industry Type</label>
                                    <select class="form-select">
                                        <option value="">Select industry</option>
                                        <option value="manufacturing">Manufacturing</option>
                                        <option value="automotive" selected>Automotive</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="construction">Construction</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Company Size</label>
                                    <select class="form-select">
                                        <option value="">Select size</option>
                                        <option value="small">1-50 employees</option>
                                        <option value="medium" selected>51-250 employees</option>
                                        <option value="large">250+ employees</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-textarea" rows="3" placeholder="Brief company description...">Premium automotive component manufacturer specializing in precision parts for luxury vehicles.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-demo-section">
                    <h4 class="form-demo-title">Form States</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label class="form-label">Valid Input</label>
                                    <input type="text" class="form-input" value="Valid data entry" style="border-color: var(--success-500);">
                                    <div class="form-success">✓ Data validated successfully</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Error Input</label>
                                    <input type="text" class="form-input form-input-error" value="Invalid data">
                                    <div class="form-error">This field contains invalid data</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Disabled Input</label>
                                    <input type="text" class="form-input" value="System generated" disabled>
                                    <div class="form-help">Auto-generated by system</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quote Builder Forms --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon quotes">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Quote Builder Forms</h3>
                    <p class="showcase-subtitle">CPQ (Configure-Price-Quote) forms with dynamic calculations</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('quotes')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="quote-demo-container">
                {{-- Quote Header --}}
                <div class="quote-section">
                    <h4 class="quote-section-title">Quote Information</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                                <div class="form-group">
                                    <label class="form-label">Quote Number</label>
                                    <input type="text" class="form-input" value="#QUO-2024-089" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Customer *</label>
                                    <select class="form-select customer-select">
                                        <option value="">Select customer</option>
                                        <option value="1" selected>Acme Manufacturing Ltd.</option>
                                        <option value="2">TechCorp Solutions</option>
                                        <option value="3">Industrial Dynamics</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Valid Until</label>
                                    <input type="date" class="form-input" value="2024-11-15">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Project Description</label>
                                <textarea class="form-textarea" rows="2" placeholder="Brief project description...">Premium widget assemblies for industrial automation project</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quote Line Items --}}
                <div class="quote-section">
                    <div class="quote-section-header">
                        <h4 class="quote-section-title">Line Items</h4>
                        <button class="btn btn-secondary btn-sm" onclick="addQuoteLineItem()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add Item
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="quote-line-items" id="quote-line-items">
                                {{-- Line Item 1 --}}
                                <div class="quote-line-item" data-item="1">
                                    <div class="quote-line-header">
                                        <span class="quote-line-number">Item #1</span>
                                        <button class="quote-line-remove" onclick="removeQuoteLineItem(1)" title="Remove Item">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="quote-line-form">
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                                            <div class="form-group lg:col-span-2">
                                                <label class="form-label">Product *</label>
                                                <select class="form-select product-select" onchange="updateProductDetails(1, this.value)">
                                                    <option value="">Select product</option>
                                                    <option value="WIDGET-001" selected data-price="125.50" data-description="Premium Widget Assembly">Premium Widget Assembly (WIDGET-001)</option>
                                                    <option value="VALVE-205" data-price="89.75" data-description="Industrial Valve Type 205">Industrial Valve Type 205 (VALVE-205)</option>
                                                    <option value="PUMP-300" data-price="450.00" data-description="Heavy Duty Pump Unit">Heavy Duty Pump Unit (PUMP-300)</option>
                                                    <option value="SENSOR-150" data-price="75.25" data-description="Precision Temperature Sensor">Precision Temperature Sensor (SENSOR-150)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Quantity *</label>
                                                <input type="number" class="form-input quantity-input" value="50" min="1" onchange="calculateLineTotal(1)">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Unit Price</label>
                                                <div class="currency-input">
                                                    <span class="currency-symbol">R</span>
                                                    <input type="number" class="form-input price-input" value="125.50" step="0.01" onchange="calculateLineTotal(1)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Discount %</label>
                                                <input type="number" class="form-input discount-input" value="5" min="0" max="100" step="0.1" onchange="calculateLineTotal(1)">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Line Total</label>
                                                <div class="line-total-display">R 5,963.75</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-textarea" rows="2" placeholder="Additional item description...">Premium widget assemblies with enhanced durability coating</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Line Item 2 --}}
                                <div class="quote-line-item" data-item="2">
                                    <div class="quote-line-header">
                                        <span class="quote-line-number">Item #2</span>
                                        <button class="quote-line-remove" onclick="removeQuoteLineItem(2)" title="Remove Item">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="quote-line-form">
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                                            <div class="form-group lg:col-span-2">
                                                <label class="form-label">Product *</label>
                                                <select class="form-select product-select" onchange="updateProductDetails(2, this.value)">
                                                    <option value="">Select product</option>
                                                    <option value="WIDGET-001" data-price="125.50" data-description="Premium Widget Assembly">Premium Widget Assembly (WIDGET-001)</option>
                                                    <option value="VALVE-205" selected data-price="89.75" data-description="Industrial Valve Type 205">Industrial Valve Type 205 (VALVE-205)</option>
                                                    <option value="PUMP-300" data-price="450.00" data-description="Heavy Duty Pump Unit">Heavy Duty Pump Unit (PUMP-300)</option>
                                                    <option value="SENSOR-150" data-price="75.25" data-description="Precision Temperature Sensor">Precision Temperature Sensor (SENSOR-150)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Quantity *</label>
                                                <input type="number" class="form-input quantity-input" value="25" min="1" onchange="calculateLineTotal(2)">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Unit Price</label>
                                                <div class="currency-input">
                                                    <span class="currency-symbol">R</span>
                                                    <input type="number" class="form-input price-input" value="89.75" step="0.01" onchange="calculateLineTotal(2)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Discount %</label>
                                                <input type="number" class="form-input discount-input" value="10" min="0" max="100" step="0.1" onchange="calculateLineTotal(2)">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Line Total</label>
                                                <div class="line-total-display">R 2,019.38</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-textarea" rows="2" placeholder="Additional item description...">High-pressure industrial valves with stainless steel construction</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quote Totals --}}
                <div class="quote-section">
                    <h4 class="quote-section-title">Quote Summary</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                                <div class="quote-notes">
                                    <div class="form-group">
                                        <label class="form-label">Terms & Conditions</label>
                                        <textarea class="form-textarea" rows="4" placeholder="Payment terms, delivery conditions, etc...">Payment: 30 days net
Delivery: 2-3 weeks from order confirmation
Warranty: 12 months parts and labor
Prices valid for 30 days</textarea>
                                    </div>
                                </div>
                                <div class="quote-calculations">
                                    <div class="calculation-group">
                                        <div class="calculation-row">
                                            <span class="calculation-label">Subtotal:</span>
                                            <span class="calculation-value" id="quote-subtotal">R 7,983.13</span>
                                        </div>
                                        <div class="calculation-row">
                                            <span class="calculation-label">Discount Total:</span>
                                            <span class="calculation-value discount" id="quote-discount">-R 425.47</span>
                                        </div>
                                        <div class="calculation-row">
                                            <span class="calculation-label">VAT (15%):</span>
                                            <span class="calculation-value" id="quote-vat">R 1,133.65</span>
                                        </div>
                                        <div class="calculation-row calculation-total">
                                            <span class="calculation-label">Total Amount:</span>
                                            <span class="calculation-value" id="quote-total">R 8,691.31</span>
                                        </div>
                                    </div>
                                    <div class="quote-actions">
                                        <button class="btn btn-secondary" onclick="saveQuoteDraft()">Save Draft</button>
                                        <button class="btn btn-success" onclick="generateQuote()">Generate Quote</button>
                                        <button class="btn btn-primary" onclick="sendQuote()">Send to Customer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Advanced Form Patterns --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon advanced">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Advanced Form Patterns</h3>
                    <p class="showcase-subtitle">Multi-step wizards, dynamic forms, and complex input components</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('advanced')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="advanced-demo-grid">
                {{-- Multi-step Form --}}
                <div class="advanced-demo-section">
                    <h4 class="advanced-demo-title">Multi-step Customer Registration</h4>
                    <div class="card">
                        <div class="card-body">
                            {{-- Progress Indicator --}}
                            <div class="form-progress">
                                <div class="progress-steps">
                                    <div class="progress-step completed">
                                        <div class="step-number">1</div>
                                        <div class="step-label">Company Info</div>
                                    </div>
                                    <div class="progress-step active">
                                        <div class="step-number">2</div>
                                        <div class="step-label">Contact Details</div>
                                    </div>
                                    <div class="progress-step">
                                        <div class="step-number">3</div>
                                        <div class="step-label">Preferences</div>
                                    </div>
                                    <div class="progress-step">
                                        <div class="step-number">4</div>
                                        <div class="step-label">Review</div>
                                    </div>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 50%"></div>
                                </div>
                            </div>

                            {{-- Current Step Content --}}
                            <div class="step-content">
                                <h5 class="step-title">Contact Information</h5>
                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <div class="form-group">
                                        <label class="form-label">Primary Contact Name *</label>
                                        <input type="text" class="form-input" value="John Mitchell" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" class="form-input" value="Operations Manager">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" class="form-input" value="j.mitchell@acme.co.za" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Direct Phone</label>
                                        <input type="tel" class="form-input" value="+27 11 789 1234">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Physical Address</label>
                                    <textarea class="form-textarea" rows="3">123 Industrial Drive
Johannesburg, Gauteng 2001
South Africa</textarea>
                                </div>
                            </div>

                            {{-- Navigation --}}
                            <div class="step-navigation">
                                <button class="btn btn-secondary" onclick="previousStep()">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Previous
                                </button>
                                <div class="step-info">
                                    <span class="text-sm text-neutral-600">Step 2 of 4</span>
                                </div>
                                <button class="btn btn-primary" onclick="nextStep()">
                                    Next
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Search and Filter Form --}}
                <div class="advanced-demo-section">
                    <h4 class="advanced-demo-title">Dynamic Search & Filter</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="search-filter-form">
                                <div class="search-section">
                                    <div class="search-input-group">
                                        <div class="search-input-wrapper">
                                            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                            </svg>
                                            <input type="text" class="search-input" placeholder="Search products, customers, orders..." value="premium widget">
                                        </div>
                                        <button class="search-btn btn btn-primary">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                            </svg>
                                            Search
                                        </button>
                                    </div>
                                </div>

                                <div class="filter-section">
                                    <div class="filter-row">
                                        <div class="filter-group">
                                            <label class="filter-label">Category</label>
                                            <select class="filter-select">
                                                <option value="">All Categories</option>
                                                <option value="widgets" selected>Widgets</option>
                                                <option value="valves">Valves</option>
                                                <option value="pumps">Pumps</option>
                                                <option value="sensors">Sensors</option>
                                            </select>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Price Range</label>
                                            <select class="filter-select">
                                                <option value="">Any Price</option>
                                                <option value="0-100">R 0 - R 100</option>
                                                <option value="100-500" selected>R 100 - R 500</option>
                                                <option value="500+">R 500+</option>
                                            </select>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Status</label>
                                            <select class="filter-select">
                                                <option value="">All Status</option>
                                                <option value="active" selected>Active</option>
                                                <option value="discontinued">Discontinued</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>
                                        <div class="filter-group">
                                            <button class="btn btn-secondary btn-sm" onclick="clearFilters()">Clear All</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="active-filters">
                                    <span class="filter-label">Active Filters:</span>
                                    <div class="filter-tags">
                                        <span class="filter-tag">
                                            Category: Widgets
                                            <button class="filter-tag-remove" onclick="removeFilter('category')">&times;</button>
                                        </span>
                                        <span class="filter-tag">
                                            Price: R 100 - R 500
                                            <button class="filter-tag-remove" onclick="removeFilter('price')">&times;</button>
                                        </span>
                                        <span class="filter-tag">
                                            Status: Active
                                            <button class="filter-tag-remove" onclick="removeFilter('status')">&times;</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Input Components --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon custom">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Custom Input Components</h3>
                    <p class="showcase-subtitle">Specialized controls for enhanced user interaction</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('custom')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="custom-demo-grid">
                <div class="custom-demo-section">
                    <h4 class="custom-demo-title">Toggle Switches</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="form-group">
                                    <div class="toggle-group">
                                        <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                            <div class="toggle-slider"></div>
                                        </div>
                                        <label class="toggle-label">Email Notifications</label>
                                    </div>
                                    <div class="form-help">Receive order and quote updates via email</div>
                                </div>
                                <div class="form-group">
                                    <div class="toggle-group">
                                        <div class="toggle-switch" onclick="toggleSwitch(this)">
                                            <div class="toggle-slider"></div>
                                        </div>
                                        <label class="toggle-label">SMS Alerts</label>
                                    </div>
                                    <div class="form-help">Get urgent notifications via SMS</div>
                                </div>
                                <div class="form-group">
                                    <div class="toggle-group">
                                        <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                            <div class="toggle-slider"></div>
                                        </div>
                                        <label class="toggle-label">Auto-save Drafts</label>
                                    </div>
                                    <div class="form-help">Automatically save form data as you type</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-demo-section">
                    <h4 class="custom-demo-title">File Upload Area</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="upload-area" onclick="document.getElementById('file-upload-demo').click()">
                                <div class="upload-content">
                                    <div class="upload-icon">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                    </div>
                                    <div class="upload-text">
                                        <div class="upload-title">Click to upload or drag and drop</div>
                                        <div class="upload-subtitle">PDF, DOC, XLS files up to 10MB</div>
                                    </div>
                                </div>
                                <input type="file" id="file-upload-demo" multiple accept=".pdf,.doc,.docx,.xls,.xlsx" style="display: none;">
                            </div>
                            
                            <div class="uploaded-files">
                                <div class="file-item">
                                    <div class="file-icon">📄</div>
                                    <div class="file-details">
                                        <div class="file-name">Project_Specifications.pdf</div>
                                        <div class="file-size">2.4 MB</div>
                                    </div>
                                    <div class="file-actions">
                                        <button class="file-action-btn view" title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        <button class="file-action-btn remove" title="Remove">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-demo-section">
                    <h4 class="custom-demo-title">Tag Input</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Product Tags</label>
                                <div class="tag-input">
                                    <div class="tag-container">
                                        <span class="tag">
                                            Manufacturing
                                            <button class="tag-remove" onclick="removeTag(this)">×</button>
                                        </span>
                                        <span class="tag">
                                            Industrial
                                            <button class="tag-remove" onclick="removeTag(this)">×</button>
                                        </span>
                                        <span class="tag">
                                            Premium
                                            <button class="tag-remove" onclick="removeTag(this)">×</button>
                                        </span>
                                        <input type="text" class="tag-input-field" placeholder="Add tag..." onkeypress="addTag(event)">
                                    </div>
                                </div>
                                <div class="form-help">Press Enter to add tags</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-demo-section">
                    <h4 class="custom-demo-title">Rating & Slider</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label class="form-label">Customer Satisfaction</label>
                                    <div class="rating-input">
                                        <span class="star active" onclick="setRating(1)">★</span>
                                        <span class="star active" onclick="setRating(2)">★</span>
                                        <span class="star active" onclick="setRating(3)">★</span>
                                        <span class="star active" onclick="setRating(4)">★</span>
                                        <span class="star" onclick="setRating(5)">★</span>
                                    </div>
                                    <div class="form-help">4 out of 5 stars</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Priority Level</label>
                                    <div class="slider-input">
                                        <input type="range" class="slider" min="1" max="10" value="7" oninput="updateSliderValue(this)">
                                        <div class="slider-labels">
                                            <span>Low</span>
                                            <span class="slider-value">7</span>
                                            <span>High</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Validation Examples --}}
    <div class="form-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon validation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Form Validation</h3>
                    <p class="showcase-subtitle">Real-time validation with comprehensive error handling</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyFormCode('validation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="validation-demo-container">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">Customer Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form id="validation-demo-form">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div class="form-group">
                                    <label class="form-label">Company Name *</label>
                                    <input type="text" class="form-input" name="company_name" required 
                                           oninput="validateField(this)" onblur="validateField(this)">
                                    <div class="validation-message"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Registration Number</label>
                                    <input type="text" class="form-input" name="reg_number" 
                                           pattern="[0-9]{4}\/[0-9]{6}\/[0-9]{2}" 
                                           placeholder="2019/123456/07"
                                           oninput="validateField(this)" onblur="validateField(this)">
                                    <div class="validation-message"></div>
                                    <div class="form-help">Format: YYYY/NNNNNN/NN</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-input" name="email" required 
                                           oninput="validateField(this)" onblur="validateField(this)">
                                    <div class="validation-message"></div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-input" name="phone" required 
                                           pattern="[+][0-9]{2}\s[0-9]{2}\s[0-9]{3}\s[0-9]{4}"
                                           placeholder="+27 11 123 4567"
                                           oninput="validateField(this)" onblur="validateField(this)">
                                    <div class="validation-message"></div>
                                    <div class="form-help">Format: +27 11 123 4567</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">VAT Number</label>
                                    <input type="text" class="form-input" name="vat_number" 
                                           pattern="[0-9]{10}"
                                           placeholder="4123456789"
                                           oninput="validateField(this)" onblur="validateField(this)">
                                    <div class="validation-message"></div>
                                    <div class="form-help">10-digit VAT number</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Credit Limit</label>
                                    <div class="currency-input">
                                        <span class="currency-symbol">R</span>
                                        <input type="number" class="form-input" name="credit_limit" 
                                               min="0" max="10000000" step="0.01"
                                               oninput="validateField(this)" onblur="validateField(this)">
                                    </div>
                                    <div class="validation-message"></div>
                                    <div class="form-help">Maximum: R 10,000,000</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Business Address *</label>
                                <textarea class="form-textarea" name="address" rows="3" required 
                                          oninput="validateField(this)" onblur="validateField(this)"></textarea>
                                <div class="validation-message"></div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-secondary" onclick="resetValidationForm()">Reset Form</button>
                                <button type="submit" class="btn btn-primary">Register Customer</button>
                            </div>
                        </form>
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
                    <p class="showcase-subtitle">Ready-to-use code patterns and component structures</p>
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
    &lt;label class="form-label"&gt;Company Name *&lt;/label&gt;
    &lt;input type="text" class="form-input" required&gt;
    &lt;div class="form-help"&gt;Legal business name&lt;/div&gt;
    &lt;div class="form-error"&gt;This field is required&lt;/div&gt;
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
                    <h4 class="code-example-title">Quote Line Item Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Quote Line Item --&gt;
&lt;div class="quote-line-item" data-item="1"&gt;
    &lt;div class="quote-line-header"&gt;
        &lt;span class="quote-line-number"&gt;Item #1&lt;/span&gt;
        &lt;button class="quote-line-remove" onclick="removeItem(1)"&gt;×&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class="quote-line-form"&gt;
        &lt;div class="grid grid-cols-1 gap-4 lg:grid-cols-6"&gt;
            &lt;div class="form-group lg:col-span-2"&gt;
                &lt;select class="form-select product-select"&gt;
                    &lt;option&gt;Select product&lt;/option&gt;
                &lt;/select&gt;
            &lt;/div&gt;
            &lt;div class="form-group"&gt;
                &lt;input type="number" class="form-input quantity" min="1"&gt;
            &lt;/div&gt;
            &lt;div class="form-group"&gt;
                &lt;div class="currency-input"&gt;
                    &lt;span class="currency-symbol"&gt;R&lt;/span&gt;
                    &lt;input type="number" class="form-input price" step="0.01"&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Form Validation Classes</h4>
                    <pre class="code-block"><code>/* Form Validation States */
.form-input-error {
    border-color: var(--danger-500);
}

.form-input-error:focus {
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

.validation-message.error {
    color: var(--danger-600);
}

.validation-message.success {
    color: var(--success-600);
}</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">JavaScript Validation</h4>
                    <pre class="code-block"><code>// Form Validation Function
function validateField(field) {
    const value = field.value.trim();
    const name = field.name;
    const message = field.parentNode.querySelector('.validation-message');
    
    // Clear previous state
    field.classList.remove('form-input-error');
    message.className = 'validation-message';
    message.textContent = '';
    
    // Validation logic
    if (field.hasAttribute('required') && !value) {
        setFieldError(field, message, 'This field is required');
        return false;
    }
    
    if (name === 'email' && value) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(value)) {
            setFieldError(field, message, 'Please enter a valid email');
            return false;
        }
    }
    
    // Set success state
    setFieldSuccess(field, message, '✓ Valid');
    return true;
}

function setFieldError(field, message, text) {
    field.classList.add('form-input-error');
    message.className = 'validation-message error';
    message.textContent = text;
}

function setFieldSuccess(field, message, text) {
    message.className = 'validation-message success';
    message.textContent = text;
}</code></pre>
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

.showcase-icon.quotes {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.advanced {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.custom {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.validation {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
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

/* Form Demo Grids */
.form-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.form-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.form-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    text-align: center;
    margin-bottom: var(--space-2);
}

/* Quote Builder Styles */
.quote-demo-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-8);
}

.quote-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.quote-section-title {
    font-size: var(--text-xl);
    font-weight: 700;
    color: var(--neutral-900);
}

.quote-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
}

.quote-line-items {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.quote-line-item {
    padding: var(--space-6);
    border: 2px solid var(--neutral-200);
    border-radius: var(--radius-xl);
    background: var(--neutral-50);
    transition: all var(--transition-fast);
}

.quote-line-item:hover {
    border-color: var(--brand-300);
    background: var(--brand-50);
}

.quote-line-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: var(--space-4);
    padding-bottom: var(--space-3);
    border-bottom: 1px solid var(--neutral-300);
}

.quote-line-number {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--brand-600);
}

.quote-line-remove {
    width: 32px;
    height: 32px;
    background: var(--danger-100);
    color: var(--danger-600);
    border: none;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.quote-line-remove:hover {
    background: var(--danger-200);
    transform: scale(1.1);
}

.quote-line-form {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.currency-input {
    position: relative;
    display: flex;
    align-items: center;
}

.currency-symbol {
    position: absolute;
    left: var(--space-3);
    color: var(--neutral-500);
    font-weight: 500;
    z-index: 1;
}

.currency-input .form-input {
    padding-left: var(--space-8);
}

.line-total-display {
    display: flex;
    align-items: center;
    height: 40px;
    padding: 0 var(--space-3);
    background: var(--success-50);
    border: 1px solid var(--success-200);
    border-radius: var(--radius-lg);
    font-weight: 700;
    color: var(--success-700);
    font-size: var(--text-lg);
}

.quote-calculations {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.calculation-group {
    background: var(--neutral-50);
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
}

.calculation-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-2) 0;
    border-bottom: 1px solid var(--neutral-200);
}

.calculation-row:last-child {
    border-bottom: none;
}

.calculation-row.calculation-total {
    border-top: 2px solid var(--neutral-300);
    padding-top: var(--space-4);
    margin-top: var(--space-2);
    font-size: var(--text-lg);
    font-weight: 700;
}

.calculation-label {
    color: var(--neutral-700);
    font-weight: 500;
}

.calculation-value {
    font-weight: 600;
    color: var(--neutral-900);
}

.calculation-value.discount {
    color: var(--warning-600);
}

.calculation-total .calculation-value {
    color: var(--brand-600);
    font-size: var(--text-xl);
}

.quote-actions {
    display: flex;
    gap: var(--space-3);
    flex-wrap: wrap;
}

/* Advanced Form Patterns */
.advanced-demo-grid {
    display: grid;
    gap: var(--space-8);
}

.advanced-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.advanced-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    text-align: center;
    margin-bottom: var(--space-2);
}

.form-progress {
    margin-bottom: var(--space-8);
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    margin-bottom: var(--space-4);
    position: relative;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-2);
    flex: 1;
    position: relative;
}

.progress-step::after {
    content: '';
    position: absolute;
    top: 16px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: var(--neutral-200);
    z-index: 0;
}

.progress-step:last-child::after {
    display: none;
}

.progress-step.completed::after {
    background: var(--success-500);
}

.progress-step.active::after {
    background: linear-gradient(to right, var(--success-500) 50%, var(--neutral-200) 50%);
}

.step-number {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    background: var(--neutral-200);
    color: var(--neutral-600);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: var(--text-sm);
    position: relative;
    z-index: 1;
}

.progress-step.completed .step-number {
    background: var(--success-500);
    color: white;
}

.progress-step.active .step-number {
    background: var(--brand-500);
    color: white;
}

.step-label {
    font-size: var(--text-xs);
    color: var(--neutral-600);
    text-align: center;
    font-weight: 500;
}

.progress-step.completed .step-label,
.progress-step.active .step-label {
    color: var(--neutral-900);
    font-weight: 600;
}

.progress-bar {
    height: 4px;
    background: var(--neutral-200);
    border-radius: var(--radius-full);
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: var(--brand-600);
    border-radius: var(--radius-full);
    transition: width var(--transition-slow);
}

.step-content {
    margin-bottom: var(--space-6);
}

.step-title {
    font-size: var(--text-xl);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
}

.step-navigation {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: var(--space-6);
    border-top: 1px solid var(--neutral-200);
}

.step-info {
    font-weight: 500;
}

/* Search & Filter */
.search-filter-form {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.search-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.search-input-group {
    display: flex;
    gap: var(--space-3);
    align-items: flex-end;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-icon {
    position: absolute;
    left: var(--space-3);
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: var(--neutral-400);
}

.search-input {
    width: 100%;
    padding: var(--space-3) var(--space-3) var(--space-3) var(--space-10);
    border: 1px solid var(--neutral-300);
    border-radius: var(--radius-lg);
    font-size: var(--text-base);
    transition: all var(--transition-fast);
}

.search-input:focus {
    outline: none;
    border-color: var(--brand-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-btn {
    flex-shrink: 0;
}

.filter-section {
    background: var(--neutral-50);
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    padding: var(--space-4);
}

.filter-row {
    display: flex;
    gap: var(--space-4);
    align-items: flex-end;
    flex-wrap: wrap;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
    min-width: 150px;
}

.filter-label {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--neutral-700);
}

.filter-select {
    padding: var(--space-2) var(--space-3);
    border: 1px solid var(--neutral-300);
    border-radius: var(--radius-lg);
    font-size: var(--text-sm);
    background: white;
}

.filter-select:focus {
    outline: none;
    border-color: var(--brand-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.active-filters {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    flex-wrap: wrap;
}

.filter-tags {
    display: flex;
    gap: var(--space-2);
    flex-wrap: wrap;
}

.filter-tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-1) var(--space-3);
    background: var(--brand-100);
    color: var(--brand-700);
    border-radius: var(--radius-full);
    font-size: var(--text-sm);
    font-weight: 500;
}

.filter-tag-remove {
    background: none;
    border: none;
    color: var(--brand-600);
    cursor: pointer;
    font-size: 16px;
    line-height: 1;
}

.filter-tag-remove:hover {
    color: var(--brand-800);
}

/* Custom Input Components */
.custom-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.custom-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.custom-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    text-align: center;
    margin-bottom: var(--space-2);
}

.toggle-group {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

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

.toggle-label {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--neutral-900);
    cursor: pointer;
}

.upload-area {
    border: 2px dashed var(--neutral-300);
    border-radius: var(--radius-xl);
    padding: var(--space-12) var(--space-8);
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
    gap: var(--space-4);
}

.upload-icon {
    color: var(--neutral-400);
}

.upload-text {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.upload-title {
    font-weight: 600;
    color: var(--neutral-900);
    font-size: var(--text-lg);
}

.upload-subtitle {
    font-size: var(--text-sm);
    color: var(--neutral-500);
}

.uploaded-files {
    margin-top: var(--space-4);
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.file-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    background: var(--neutral-50);
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
}

.file-icon {
    font-size: var(--text-xl);
}

.file-details {
    flex: 1;
}

.file-name {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
}

.file-size {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.file-actions {
    display: flex;
    gap: var(--space-2);
}

.file-action-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: var(--neutral-100);
    color: var(--neutral-600);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.file-action-btn:hover {
    background: var(--brand-50);
    color: var(--brand-600);
    transform: translateY(-1px);
}

.file-action-btn.remove:hover {
    background: var(--danger-50);
    color: var(--danger-600);
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

.tag-remove {
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

.rating-input {
    display: flex;
    gap: var(--space-1);
}

.star {
    font-size: var(--text-2xl);
    color: var(--neutral-300);
    cursor: pointer;
    transition: color var(--transition-fast);
}

.star.active {
    color: var(--warning-500);
}

.star:hover {
    color: var(--warning-400);
}

.slider-input {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.slider {
    width: 100%;
    height: 6px;
    border-radius: var(--radius-full);
    background: var(--neutral-200);
    outline: none;
    -webkit-appearance: none;
}

.slider::-webkit-slider-thumb {
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: var(--radius-full);
    background: var(--brand-600);
    cursor: pointer;
    border: 2px solid white;
    box-shadow: var(--shadow-md);
}

.slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: var(--radius-full);
    background: var(--brand-600);
    cursor: pointer;
    border: 2px solid white;
    box-shadow: var(--shadow-md);
}

.slider-labels {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: var(--text-sm);
    color: var(--neutral-600);
}

.slider-value {
    font-weight: 600;
    color: var(--brand-600);
}

/* Form Validation */
.validation-demo-container {
    max-width: 800px;
    margin: 0 auto;
}

.validation-message {
    font-size: var(--text-xs);
    margin-top: var(--space-1);
    min-height: 1rem;
}

.validation-message.error {
    color: var(--danger-600);
}

.validation-message.success {
    color: var(--success-600);
}

.form-success {
    font-size: var(--text-xs);
    color: var(--success-600);
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
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
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

[data-theme="dark"] .quote-line-item {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .quote-line-item:hover {
    background: var(--brand-950);
    border-color: var(--brand-700);
}

[data-theme="dark"] .calculation-group {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .filter-section {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .filter-select,
[data-theme="dark"] .search-input {
    background: var(--neutral-100);
    border-color: var(--neutral-400);
    color: var(--neutral-900);
}

[data-theme="dark"] .filter-select:focus,
[data-theme="dark"] .search-input:focus {
    background: var(--neutral-200);
    border-color: var(--brand-500);
}

[data-theme="dark"] .upload-area {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .upload-area:hover {
    background: var(--brand-950);
    border-color: var(--brand-600);
}

[data-theme="dark"] .file-item {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .tag {
    background: var(--brand-950);
    color: var(--brand-300);
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
    
    .form-demo-grid,
    .advanced-demo-grid,
    .custom-demo-grid {
        grid-template-columns: 1fr;
    }
    
    .quote-line-form .grid {
        grid-template-columns: 1fr;
    }
    
    .quote-line-form .lg\:col-span-2 {
        grid-column: span 1;
    }
    
    .filter-row {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-group {
        min-width: auto;
    }
    
    .search-input-group {
        flex-direction: column;
    }
    
    .step-navigation {
        flex-direction: column;
        gap: var(--space-4);
    }
    
    .quote-actions {
        flex-direction: column;
    }
    
    .calculation-row {
        font-size: var(--text-sm);
    }
    
    .calculation-total {
        font-size: var(--text-base);
    }
}
</style>
@endpush

@pushOnce('scripts')
@verbatim
<script>
// Form interaction functions
let currentQuoteLineItem = 2;

function copyFormCode(category) {
    const formExamples = {
        basic: `<!-- Basic Form Structure -->
<div class="form-group">
    <label class="form-label">Company Name *</label>
    <input type="text" class="form-input" required>
    <div class="form-help">Legal business name</div>
    <div class="form-error">This field is required</div>
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
</div>`,

        quotes: `<!-- Quote Line Item -->
<div class="quote-line-item" data-item="1">
    <div class="quote-line-header">
        <span class="quote-line-number">Item #1</span>
        <button class="quote-line-remove" onclick="removeItem(1)">×</button>
    </div>
    <div class="quote-line-form">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
            <div class="form-group lg:col-span-2">
                <label class="form-label">Product *</label>
                <select class="form-select product-select">
                    <option value="">Select product</option>
                    <option value="WIDGET-001" data-price="125.50">Premium Widget Assembly</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Quantity *</label>
                <input type="number" class="form-input quantity-input" min="1">
            </div>
            <div class="form-group">
                <label class="form-label">Unit Price</label>
                <div class="currency-input">
                    <span class="currency-symbol">R</span>
                    <input type="number" class="form-input price-input" step="0.01">
                </div>
            </div>
        </div>
    </div>
</div>`,

        advanced: `<!-- Multi-step Progress -->
<div class="form-progress">
    <div class="progress-steps">
        <div class="progress-step completed">
            <div class="step-number">1</div>
            <div class="step-label">Company Info</div>
        </div>
        <div class="progress-step active">
            <div class="step-number">2</div>
            <div class="step-label">Contact Details</div>
        </div>
    </div>
    <div class="progress-bar">
        <div class="progress-fill" style="width: 50%"></div>
    </div>
</div>`,

        custom: `<!-- Toggle Switch -->
<div class="toggle-group">
    <div class="toggle-switch active" onclick="toggleSwitch(this)">
        <div class="toggle-slider"></div>
    </div>
    <label class="toggle-label">Email Notifications</label>
</div>

<!-- File Upload Area -->
<div class="upload-area" onclick="document.getElementById('file-upload').click()">
    <div class="upload-content">
        <div class="upload-icon">📁</div>
        <div class="upload-text">
            <div class="upload-title">Click to upload or drag and drop</div>
            <div class="upload-subtitle">PDF, DOC, XLS files up to 10MB</div>
        </div>
    </div>
    <input type="file" id="file-upload" multiple style="display: none;">
</div>`,

        validation: `<!-- Form Validation -->
<div class="form-group">
    <label class="form-label">Email Address *</label>
    <input type="email" class="form-input" name="email" required 
           oninput="validateField(this)" onblur="validateField(this)">
    <div class="validation-message"></div>
</div>

<script>
function validateField(field) {
    const value = field.value.trim();
    const message = field.parentNode.querySelector('.validation-message');
    
    // Clear previous state
    field.classList.remove('form-input-error');
    message.className = 'validation-message';
    message.textContent = '';
    
    // Validation logic
    if (field.hasAttribute('required') && !value) {
        setFieldError(field, message, 'This field is required');
        return false;
    }
    
    setFieldSuccess(field, message, '✓ Valid');
    return true;
}
</script>`,

        implementation: `<!-- Complete Form Implementation -->

<!-- Basic Form Group -->
<div class="form-group">
    <label class="form-label">Label Text *</label>
    <input type="text" class="form-input" required>
    <div class="form-help">Helper text</div>
    <div class="form-error">Error message</div>
</div>

<!-- Currency Input -->
<div class="currency-input">
    <span class="currency-symbol">R</span>
    <input type="number" class="form-input" step="0.01">
</div>

<!-- Toggle Switch -->
<div class="toggle-switch active" onclick="toggleSwitch(this)">
    <div class="toggle-slider"></div>
</div>

<!-- Validation States */
.form-input-error {
    border-color: var(--danger-500);
}

.form-success {
    color: var(--success-600);
}

.form-error {
    color: var(--danger-600);
}`
    };
    
    const code = formExamples[category];
    if (!code) {
        console.error('Form category not found:', category);
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast(`${category.charAt(0).toUpperCase() + category.slice(1)} form code copied!`, 'success');
        }
    }).catch(() => {
        console.log('Form code:', code);
        if (window.ManuCore) {
            ManuCore.showToast('Code logged to console', 'info');
        }
    });
}

function exportFormLibrary() {
    const completeLibrary = `/* MANUCORE ERP - FORM LIBRARY */
Complete ERP/CRM form system with professional functionality:
- Basic form elements with validation
- Quote builder with CPQ calculations
- Multi-step wizards and progress tracking
- Advanced search and filtering
- Custom input components (toggles, file upload, tags)
- Real-time validation with error handling
- Full dark mode support
- Responsive design patterns
- South African business context (ZAR currency, VAT calculations)
- Phase 3 Livewire quote builder preparation`;

    navigator.clipboard.writeText(completeLibrary).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast('Complete form library exported!', 'success');
        }
    });
}

// Quote Builder Functions
function addQuoteLineItem() {
    currentQuoteLineItem++;
    const container = document.getElementById('quote-line-items');
    const newItem = createQuoteLineItemHTML(currentQuoteLineItem);
    container.insertAdjacentHTML('beforeend', newItem);
    
    if (window.ManuCore) {
        ManuCore.showToast('Quote item added', 'success');
    }
}

function removeQuoteLineItem(itemId) {
    const item = document.querySelector(`[data-item="${itemId}"]`);
    if (item) {
        item.remove();
        calculateQuoteTotal();
        
        if (window.ManuCore) {
            ManuCore.showToast('Quote item removed', 'info');
        }
    }
}

function createQuoteLineItemHTML(itemId) {
    return `
        <div class="quote-line-item" data-item="${itemId}">
            <div class="quote-line-header">
                <span class="quote-line-number">Item #${itemId}</span>
                <button class="quote-line-remove" onclick="removeQuoteLineItem(${itemId})" title="Remove Item">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
            <div class="quote-line-form">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                    <div class="form-group lg:col-span-2">
                        <label class="form-label">Product *</label>
                        <select class="form-select product-select" onchange="updateProductDetails(${itemId}, this.value)">
                            <option value="">Select product</option>
                            <option value="WIDGET-001" data-price="125.50" data-description="Premium Widget Assembly">Premium Widget Assembly (WIDGET-001)</option>
                            <option value="VALVE-205" data-price="89.75" data-description="Industrial Valve Type 205">Industrial Valve Type 205 (VALVE-205)</option>
                            <option value="PUMP-300" data-price="450.00" data-description="Heavy Duty Pump Unit">Heavy Duty Pump Unit (PUMP-300)</option>
                            <option value="SENSOR-150" data-price="75.25" data-description="Precision Temperature Sensor">Precision Temperature Sensor (SENSOR-150)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Quantity *</label>
                        <input type="number" class="form-input quantity-input" value="1" min="1" onchange="calculateLineTotal(${itemId})">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Unit Price</label>
                        <div class="currency-input">
                            <span class="currency-symbol">R</span>
                            <input type="number" class="form-input price-input" value="0.00" step="0.01" onchange="calculateLineTotal(${itemId})">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Discount %</label>
                        <input type="number" class="form-input discount-input" value="0" min="0" max="100" step="0.1" onchange="calculateLineTotal(${itemId})">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Line Total</label>
                        <div class="line-total-display">R 0.00</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" rows="2" placeholder="Additional item description..."></textarea>
                </div>
            </div>
        </div>
    `;
}

function updateProductDetails(itemId, productCode) {
    const item = document.querySelector(`[data-item="${itemId}"]`);
    if (!item) return;
    
    const option = item.querySelector(`option[value="${productCode}"]`);
    if (!option) return;
    
    const price = option.getAttribute('data-price');
    const description = option.getAttribute('data-description');
    
    // Update price input
    const priceInput = item.querySelector('.price-input');
    if (priceInput && price) {
        priceInput.value = price;
    }
    
    // Update description
    const descriptionTextarea = item.querySelector('.form-textarea');
    if (descriptionTextarea && description) {
        descriptionTextarea.value = description;
    }
    
    // Recalculate line total
    calculateLineTotal(itemId);
}

function calculateLineTotal(itemId) {
    const item = document.querySelector(`[data-item="${itemId}"]`);
    if (!item) return;
    
    const quantity = parseFloat(item.querySelector('.quantity-input').value) || 0;
    const price = parseFloat(item.querySelector('.price-input').value) || 0;
    const discount = parseFloat(item.querySelector('.discount-input').value) || 0;
    
    const subtotal = quantity * price;
    const discountAmount = subtotal * (discount / 100);
    const lineTotal = subtotal - discountAmount;
    
    // Update line total display
    const lineTotalDisplay = item.querySelector('.line-total-display');
    lineTotalDisplay.textContent = `R ${lineTotal.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    
    // Recalculate quote total
    calculateQuoteTotal();
}

function calculateQuoteTotal() {
    let subtotal = 0;
    let totalDiscount = 0;
    
    const lineItems = document.querySelectorAll('.quote-line-item');
    lineItems.forEach(item => {
        const quantity = parseFloat(item.querySelector('.quantity-input').value) || 0;
        const price = parseFloat(item.querySelector('.price-input').value) || 0;
        const discount = parseFloat(item.querySelector('.discount-input').value) || 0;
        
        const lineSubtotal = quantity * price;
        const discountAmount = lineSubtotal * (discount / 100);
        
        subtotal += lineSubtotal;
        totalDiscount += discountAmount;
    });
    
    const afterDiscount = subtotal - totalDiscount;
    const vat = afterDiscount * 0.15; // 15% VAT
    const total = afterDiscount + vat;
    
    // Update display elements
    const subtotalEl = document.getElementById('quote-subtotal');
    const discountEl = document.getElementById('quote-discount');
    const vatEl = document.getElementById('quote-vat');
    const totalEl = document.getElementById('quote-total');
    
    if (subtotalEl) subtotalEl.textContent = `R ${subtotal.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    if (discountEl) discountEl.textContent = `-R ${totalDiscount.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    if (vatEl) vatEl.textContent = `R ${vat.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    if (totalEl) totalEl.textContent = `R ${total.toLocaleString('en-ZA', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
}

function saveQuoteDraft() {
    if (window.ManuCore) {
        ManuCore.showToast('Quote saved as draft', 'success');
    }
    console.log('Saving quote draft...');
}

function generateQuote() {
    if (window.ManuCore) {
        ManuCore.showToast('Generating quote PDF...', 'info');
    }
    console.log('Generating quote...');
}

function sendQuote() {
    if (window.ManuCore) {
        ManuCore.showToast('Quote sent to customer', 'success');
    }
    console.log('Sending quote to customer...');
}

// Multi-step Form Functions
let currentStep = 2;
const totalSteps = 4;

function nextStep() {
    if (currentStep < totalSteps) {
        currentStep++;
        updateStepProgress();
        if (window.ManuCore) {
            ManuCore.showToast(`Advanced to step ${currentStep}`, 'info');
        }
    }
}

function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepProgress();
        if (window.ManuCore) {
            ManuCore.showToast(`Returned to step ${currentStep}`, 'info');
        }
    }
}

function updateStepProgress() {
    const progressFill = document.querySelector('.progress-fill');
    const stepInfo = document.querySelector('.step-info span');
    
    if (progressFill) {
        const percentage = (currentStep / totalSteps) * 100;
        progressFill.style.width = `${percentage}%`;
    }
    
    if (stepInfo) {
        stepInfo.textContent = `Step ${currentStep} of ${totalSteps}`;
    }
    
    // Update step indicators
    const steps = document.querySelectorAll('.progress-step');
    steps.forEach((step, index) => {
        step.classList.remove('completed', 'active');
        if (index < currentStep - 1) {
            step.classList.add('completed');
        } else if (index === currentStep - 1) {
            step.classList.add('active');
        }
    });
}

// Filter Functions
function clearFilters() {
    const filterSelects = document.querySelectorAll('.filter-select');
    filterSelects.forEach(select => {
        select.value = '';
    });
    
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.value = '';
    }
    
    // Clear active filter tags
    const filterTags = document.querySelector('.filter-tags');
    if (filterTags) {
        filterTags.innerHTML = '';
    }
    
    if (window.ManuCore) {
        ManuCore.showToast('All filters cleared', 'info');
    }
}

function removeFilter(filterType) {
    const filterTag = event.target.parentNode;
    filterTag.remove();
    
    if (window.ManuCore) {
        ManuCore.showToast(`${filterType} filter removed`, 'info');
    }
}

// Custom Component Functions
function toggleSwitch(element) {
    element.classList.toggle('active');
    
    const label = element.parentNode.querySelector('.toggle-label');
    const status = element.classList.contains('active') ? 'enabled' : 'disabled';
    
    if (window.ManuCore) {
        ManuCore.showToast(`${label.textContent} ${status}`, 'info');
    }
}

function addTag(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const value = event.target.value.trim();
        if (value) {
            const tag = document.createElement('span');
            tag.className = 'tag';
            tag.innerHTML = `${value} <button class="tag-remove" onclick="removeTag(this)">×</button>`;
            event.target.parentNode.insertBefore(tag, event.target);
            event.target.value = '';
            
            if (window.ManuCore) {
                ManuCore.showToast(`Tag "${value}" added`, 'success');
            }
        }
    }
}

function removeTag(button) {
    const tag = button.parentElement;
    const tagText = tag.textContent.replace('×', '').trim();
    tag.remove();
    
    if (window.ManuCore) {
        ManuCore.showToast(`Tag "${tagText}" removed`, 'info');
    }
}

function setRating(rating) {
    const stars = document.querySelectorAll('.star');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.add('active');
        } else {
            star.classList.remove('active');
        }
    });
    
    const helpText = document.querySelector('.rating-input').parentNode.querySelector('.form-help');
    if (helpText) {
        helpText.textContent = `${rating} out of 5 stars`;
    }
    
    if (window.ManuCore) {
        ManuCore.showToast(`Rating set to ${rating} stars`, 'success');
    }
}

function updateSliderValue(slider) {
    const value = slider.value;
    const valueDisplay = slider.parentNode.querySelector('.slider-value');
    if (valueDisplay) {
        valueDisplay.textContent = value;
    }
}

// Form Validation Functions
function validateField(field) {
    const value = field.value.trim();
    const name = field.name;
    const message = field.parentNode.querySelector('.validation-message');
    
    // Clear previous state
    field.classList.remove('form-input-error');
    message.className = 'validation-message';
    message.textContent = '';
    
    // Required field validation
    if (field.hasAttribute('required') && !value) {
        setFieldError(field, message, 'This field is required');
        return false;
    }
    
    // Specific field validations
    if (name === 'email' && value) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(value)) {
            setFieldError(field, message, 'Please enter a valid email address');
            return false;
        }
    }
    
    if (name === 'phone' && value) {
        const phonePattern = /^[+][0-9]{2}\s[0-9]{2}\s[0-9]{3}\s[0-9]{4}$/;
        if (!phonePattern.test(value)) {
            setFieldError(field, message, 'Please use format: +27 11 123 4567');
            return false;
        }
    }
    
    if (name === 'reg_number' && value) {
        const regPattern = /^[0-9]{4}\/[0-9]{6}\/[0-9]{2}$/;
        if (!regPattern.test(value)) {
            setFieldError(field, message, 'Please use format: YYYY/NNNNNN/NN');
            return false;
        }
    }
    
    if (name === 'vat_number' && value) {
        const vatPattern = /^[0-9]{10}$/;
        if (!vatPattern.test(value)) {
            setFieldError(field, message, 'VAT number must be 10 digits');
            return false;
        }
    }
    
    if (name === 'credit_limit' && value) {
        const limit = parseFloat(value);
        if (limit < 0 || limit > 10000000) {
            setFieldError(field, message, 'Credit limit must be between R 0 and R 10,000,000');
            return false;
        }
    }
    
    // Set success state if validation passes
    if (value) {
        setFieldSuccess(field, message, '✓ Valid');
    }
    
    return true;
}

function setFieldError(field, message, text) {
    field.classList.add('form-input-error');
    message.className = 'validation-message error';
    message.textContent = text;
}

function setFieldSuccess(field, message, text) {
    message.className = 'validation-message success';
    message.textContent = text;
}

function resetValidationForm() {
    const form = document.getElementById('validation-demo-form');
    if (form) {
        form.reset();
        
        // Clear all validation states
        form.querySelectorAll('.form-input-error').forEach(input => {
            input.classList.remove('form-input-error');
        });
        
        form.querySelectorAll('.validation-message').forEach(message => {
            message.className = 'validation-message';
            message.textContent = '';
        });
        
        if (window.ManuCore) {
            ManuCore.showToast('Form reset', 'info');
        }
    }
}

// Form submission
document.addEventListener('DOMContentLoaded', function() {
    console.log('📝 ManuCore ERP Form Components Library loaded');
    
    // Initialize form validation on validation demo form
    const validationForm = document.getElementById('validation-demo-form');
    if (validationForm) {
        validationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const formData = new FormData(this);
            
            // Validate all fields
            this.querySelectorAll('input, textarea, select').forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                }
            });
            
            if (isValid) {
                if (window.ManuCore) {
                    ManuCore.showToast('Form validation passed! Customer would be registered.', 'success');
                }
                console.log('Form data:', Object.fromEntries(formData));
            } else {
                if (window.ManuCore) {
                    ManuCore.showToast('Please fix validation errors before submitting', 'error');
                }
            }
        });
    }
    
    // File upload demo
    const fileUpload = document.getElementById('file-upload-demo');
    if (fileUpload) {
        fileUpload.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const fileNames = Array.from(files).map(file => file.name).join(', ');
                if (window.ManuCore) {
                    ManuCore.showToast(`Selected ${files.length} file(s): ${fileNames}`, 'info');
                }
            }
        });
    }
    
    // Initialize drag and drop for upload area
    const uploadArea = document.querySelector('.upload-area');
    if (uploadArea) {
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--brand-400)';
            this.style.background = 'var(--brand-50)';
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--neutral-300)';
            this.style.background = 'var(--neutral-50)';
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--neutral-300)';
            this.style.background = 'var(--neutral-50)';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const fileNames = Array.from(files).map(file => file.name).join(', ');
                if (window.ManuCore) {
                    ManuCore.showToast(`Dropped ${files.length} file(s): ${fileNames}`, 'success');
                }
            }
        });
    }
    
    // Initialize quote calculations
    calculateQuoteTotal();
    
    // Initialize tooltips
    if (window.ManuCore && ManuCore.initTooltips) {
        ManuCore.initTooltips();
    }
    
    // Add enhanced interactions
    document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('form-group-focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentNode.classList.remove('form-group-focused');
        });
    });
    
    // Quote line item hover effects
    document.querySelectorAll('.quote-line-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = 'var(--shadow-lg)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
});
</script>
@endverbatim
@endpushOnce