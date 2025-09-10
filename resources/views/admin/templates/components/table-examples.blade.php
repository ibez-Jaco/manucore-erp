@extends('layouts.panel')

@section('title', 'Table Components - ManuCore ERP')

@section('header', 'ERP/CRM Table Component Library')
@section('subheader', 'Comprehensive data table patterns for manufacturing and business management')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-primary" onclick="exportTableLibrary()">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </div>
            <h2 class="hero-title">ERP/CRM Table Components</h2>
            <p class="hero-description">Professional data table patterns for customer management, quotes, orders, and business operations with advanced search, filtering, and nested data display.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Table Types</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">25+</div>
                    <div class="stat-label">Components</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Color Themes</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Customer Management Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon customers">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Customer Management</h3>
                    <p class="showcase-subtitle">CRM customer database with contact details and activity</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('customers')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            {{-- Advanced Search Bar --}}
            <div class="advanced-search-bar">
                <div class="search-main">
                    <div class="search-input-group">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" class="form-input search-input" placeholder="Search customers by name, email, or company...">
                        <button class="search-clear-btn" title="Clear search">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <button class="btn btn-secondary btn-sm filter-toggle" onclick="toggleAdvancedFilters()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                        </svg>
                        Filters
                    </button>
                </div>
                <div class="advanced-filters" id="advanced-filters" style="display: none;">
                    <div class="filter-grid">
                        <div class="filter-group">
                            <label class="filter-label">Customer Type</label>
                            <select class="form-select form-input-sm">
                                <option value="">All Types</option>
                                <option value="company">Company</option>
                                <option value="individual">Individual</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Status</label>
                            <select class="form-select form-input-sm">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="prospect">Prospect</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Location</label>
                            <select class="form-select form-input-sm">
                                <option value="">All Locations</option>
                                <option value="gauteng">Gauteng</option>
                                <option value="western-cape">Western Cape</option>
                                <option value="kwazulu-natal">KwaZulu-Natal</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label">Date Range</label>
                            <input type="date" class="form-input form-input-sm" placeholder="From">
                        </div>
                    </div>
                    <div class="filter-actions">
                        <button class="btn btn-primary btn-sm">Apply Filters</button>
                        <button class="btn btn-secondary btn-sm">Clear All</button>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="select-all">
                            </th>
                            <th class="sortable">Customer</th>
                            <th class="sortable">Contact</th>
                            <th class="sortable">Location</th>
                            <th class="sortable">Orders</th>
                            <th class="sortable">Value</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="select-row" value="1"></td>
                            <td>
                                <div class="customer-profile">
                                    <div class="avatar avatar-company">AM</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Acme Manufacturing Ltd.</div>
                                        <div class="customer-type">Large Enterprise</div>
                                        <div class="customer-tags">
                                            <span class="tag tag-vip">VIP</span>
                                            <span class="tag tag-industrial">Industrial</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div class="contact-name">John Mitchell</div>
                                    <div class="contact-title">Procurement Manager</div>
                                    <div class="contact-methods">
                                        <a href="mailto:john@acme.com" class="contact-link">john@acme.com</a>
                                        <a href="tel:+27118881234" class="contact-link">+27 11 888 1234</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="location-info">
                                    <div class="location-city">Johannesburg</div>
                                    <div class="location-region">Gauteng</div>
                                </div>
                            </td>
                            <td class="orders-count">47 orders</td>
                            <td class="customer-value">R 2,450,000</td>
                            <td><span class="status status-active">Active</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleAction('view', 1)" title="View Customer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleAction('edit', 1)" title="Edit Customer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn message" onclick="handleAction('message', 1)" title="Send Message">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="select-row" value="2"></td>
                            <td>
                                <div class="customer-profile">
                                    <div class="avatar avatar-individual">SM</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Sarah Martinez</div>
                                        <div class="customer-type">Individual</div>
                                        <div class="customer-tags">
                                            <span class="tag tag-repeat">Repeat Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div class="contact-name">Sarah Martinez</div>
                                    <div class="contact-title">Owner</div>
                                    <div class="contact-methods">
                                        <a href="mailto:sarah@email.com" class="contact-link">sarah@email.com</a>
                                        <a href="tel:+27845551234" class="contact-link">+27 84 555 1234</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="location-info">
                                    <div class="location-city">Cape Town</div>
                                    <div class="location-region">Western Cape</div>
                                </div>
                            </td>
                            <td class="orders-count">12 orders</td>
                            <td class="customer-value">R 125,000</td>
                            <td><span class="status status-active">Active</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleAction('view', 2)" title="View Customer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleAction('edit', 2)" title="Edit Customer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn message" onclick="handleAction('message', 2)" title="Send Message">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Quotes Management Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon quotes">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Quotes & Proposals</h3>
                    <p class="showcase-subtitle">Sales quotations with approval workflow and conversion tracking</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('quotes')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Quote</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Value</th>
                            <th>Valid Until</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="quote-info">
                                    <div class="quote-number">#QUO-2024-015</div>
                                    <div class="quote-title">Industrial Equipment Package</div>
                                    <div class="quote-meta">
                                        <span class="quote-date">Created: 2024-09-05</span>
                                        <span class="quote-rep">by: John Sales</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="customer-summary">
                                    <div class="customer-name">Acme Manufacturing</div>
                                    <div class="customer-contact">john@acme.com</div>
                                </div>
                            </td>
                            <td>
                                <div class="items-summary">
                                    <div class="items-count">8 items</div>
                                    <div class="items-preview">Pumps, Valves, Sensors...</div>
                                </div>
                            </td>
                            <td>
                                <div class="quote-value">
                                    <div class="value-amount">R 156,750.00</div>
                                    <div class="value-margin">Margin: 35%</div>
                                </div>
                            </td>
                            <td>
                                <div class="validity-info">
                                    <div class="valid-date">2024-10-05</div>
                                    <div class="days-remaining">12 days left</div>
                                </div>
                            </td>
                            <td><span class="status status-pending">Pending Review</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleAction('view', 1)" title="View Quote">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleAction('edit', 1)" title="Edit Quote">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn convert" onclick="handleAction('convert', 1)" title="Convert to Order">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn send" onclick="handleAction('send', 1)" title="Send Quote">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="quote-info">
                                    <div class="quote-number">#QUO-2024-016</div>
                                    <div class="quote-title">Maintenance Contract Renewal</div>
                                    <div class="quote-meta">
                                        <span class="quote-date">Created: 2024-09-08</span>
                                        <span class="quote-rep">by: Sarah Sales</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="customer-summary">
                                    <div class="customer-name">TechCorp Solutions</div>
                                    <div class="customer-contact">contact@techcorp.com</div>
                                </div>
                            </td>
                            <td>
                                <div class="items-summary">
                                    <div class="items-count">3 services</div>
                                    <div class="items-preview">Annual maintenance, Support...</div>
                                </div>
                            </td>
                            <td>
                                <div class="quote-value">
                                    <div class="value-amount">R 89,500.00</div>
                                    <div class="value-margin">Margin: 45%</div>
                                </div>
                            </td>
                            <td>
                                <div class="validity-info">
                                    <div class="valid-date">2024-10-08</div>
                                    <div class="days-remaining">15 days left</div>
                                </div>
                            </td>
                            <td><span class="status status-approved">Approved</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleAction('view', 2)" title="View Quote">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn convert" onclick="handleAction('convert', 2)" title="Convert to Order">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn send" onclick="handleAction('send', 2)" title="Send Quote">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Nested Hierarchical Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon nested">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Product Categories</h3>
                    <p class="showcase-subtitle">Hierarchical product catalog with expandable categories</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('nested')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="table-container">
                <table class="data-table nested-table">
                    <thead>
                        <tr>
                            <th>Category / Product</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="category-row" data-level="0">
                            <td>
                                <div class="category-item">
                                    <button class="expand-btn" onclick="toggleCategory(this)">
                                        <svg class="w-4 h-4 expand-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                    <div class="category-icon">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                    </div>
                                    <div class="category-details">
                                        <div class="category-name">Industrial Equipment</div>
                                        <div class="category-desc">Manufacturing and industrial machinery</div>
                                    </div>
                                </div>
                            </td>
                            <td>-</td>
                            <td class="category-summary">245 items</td>
                            <td>-</td>
                            <td><span class="status status-active">Active</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn edit" onclick="handleAction('edit-category', 1)" title="Edit Category">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn add" onclick="handleAction('add-product', 1)" title="Add Product">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="product-row" data-level="1" style="display: none;">
                            <td>
                                <div class="product-item">
                                    <div class="product-icon">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-name">Centrifugal Pump CP-150</div>
                                        <div class="product-desc">High-efficiency industrial pump</div>
                                    </div>
                                </div>
                            </td>
                            <td><code class="sku">CP-150-A</code></td>
                            <td class="stock-info">
                                <div class="stock-count">23 units</div>
                                <div class="stock-location">Warehouse A</div>
                            </td>
                            <td class="price">R 15,750.00</td>
                            <td><span class="status status-success">In Stock</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleAction('view-product', 1)" title="View Product">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleAction('edit-product', 1)" title="Edit Product">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Basic Simple Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon basic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Basic Table</h3>
                    <p class="showcase-subtitle">Simple clean table layout for basic data display</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('basic')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Premium Widget Assembly</td>
                            <td>Electronics</td>
                            <td>R 1,250.00</td>
                            <td>234 units</td>
                            <td><span class="status status-success">In Stock</span></td>
                        </tr>
                        <tr>
                            <td>Industrial Connector Set</td>
                            <td>Mechanical</td>
                            <td>R 890.00</td>
                            <td>156 units</td>
                            <td><span class="status status-success">In Stock</span></td>
                        </tr>
                        <tr>
                            <td>Safety Control Module</td>
                            <td>Safety</td>
                            <td>R 2,340.00</td>
                            <td>12 units</td>
                            <td><span class="status status-warning">Low Stock</span></td>
                        </tr>
                        <tr>
                            <td>Hydraulic Valve Unit</td>
                            <td>Hydraulics</td>
                            <td>R 3,750.00</td>
                            <td>0 units</td>
                            <td><span class="status status-danger">Out of Stock</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Sortable Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon sortable">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Sortable Table</h3>
                    <p class="showcase-subtitle">Interactive table with column sorting and visual indicators</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('sortable')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="table-container">
                <table class="data-table sortable-table" id="sortable-demo-table">
                    <thead>
                        <tr>
                            <th class="sortable" onclick="sortTable('sortable-demo-table', 0)">
                                Order #
                                <span class="sort-indicator">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                    </svg>
                                </span>
                            </th>
                            <th class="sortable" onclick="sortTable('sortable-demo-table', 1)">
                                Customer
                                <span class="sort-indicator">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                    </svg>
                                </span>
                            </th>
                            <th class="sortable" onclick="sortTable('sortable-demo-table', 2)">
                                Date
                                <span class="sort-indicator">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                    </svg>
                                </span>
                            </th>
                            <th class="sortable" onclick="sortTable('sortable-demo-table', 3)">
                                Amount
                                <span class="sort-indicator">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                    </svg>
                                </span>
                            </th>
                            <th class="sortable" onclick="sortTable('sortable-demo-table', 4)">
                                Status
                                <span class="sort-indicator">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD-2024-001</td>
                            <td>Acme Manufacturing</td>
                            <td data-sort="2024-09-10">2024-09-10</td>
                            <td data-sort="45670">R 45,670.00</td>
                            <td data-sort="2">Processing</td>
                            <td>
                                <button class="action-btn view" onclick="handleActionWithAlert('view', 1)" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD-2024-002</td>
                            <td>TechCorp Solutions</td>
                            <td data-sort="2024-09-08">2024-09-08</td>
                            <td data-sort="78950">R 78,950.00</td>
                            <td data-sort="3">Completed</td>
                            <td>
                                <button class="action-btn view" onclick="handleActionWithAlert('view', 2)" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD-2024-003</td>
                            <td>Global Industries</td>
                            <td data-sort="2024-09-05">2024-09-05</td>
                            <td data-sort="123450">R 123,450.00</td>
                            <td data-sort="1">Pending</td>
                            <td>
                                <button class="action-btn view" onclick="handleActionWithAlert('view', 3)" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD-2024-004</td>
                            <td>BuildCorp Ltd</td>
                            <td data-sort="2024-09-01">2024-09-01</td>
                            <td data-sort="89750">R 89,750.00</td>
                            <td data-sort="4">Cancelled</td>
                            <td>
                                <button class="action-btn view" onclick="handleActionWithAlert('view', 4)" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Paginated Table --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon paginated">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Paginated Table</h3>
                    <p class="showcase-subtitle">Large dataset table with advanced pagination controls</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('paginated')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Customer</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#INV-2024-101</td>
                            <td>Acme Manufacturing</td>
                            <td>2024-09-01</td>
                            <td>2024-09-31</td>
                            <td>R 45,670.00</td>
                            <td><span class="status status-success">Paid</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleActionWithAlert('view-invoice', 101)" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleActionWithAlert('edit-invoice', 101)" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" onclick="handleDeleteWithAlert('invoice', 101)" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#INV-2024-102</td>
                            <td>TechCorp Solutions</td>
                            <td>2024-09-03</td>
                            <td>2024-10-03</td>
                            <td>R 78,950.00</td>
                            <td><span class="status status-warning">Pending</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleActionWithAlert('view-invoice', 102)" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleActionWithAlert('edit-invoice', 102)" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" onclick="handleDeleteWithAlert('invoice', 102)" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>#INV-2024-103</td>
                            <td>Global Industries</td>
                            <td>2024-09-05</td>
                            <td>2024-10-05</td>
                            <td>R 123,450.00</td>
                            <td><span class="status status-danger">Overdue</span></td>
                            <td>
                                <div class="action-group">
                                    <button class="action-btn view" onclick="handleActionWithAlert('view-invoice', 103)" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn edit" onclick="handleActionWithAlert('edit-invoice', 103)" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="action-btn delete" onclick="handleDeleteWithAlert('invoice', 103)" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Advanced Pagination --}}
            <div class="pagination-container">
                <div class="pagination-info">
                    <div class="pagination-text">
                        Showing <strong>1-10</strong> of <strong>247</strong> invoices
                    </div>
                    <div class="pagination-options">
                        <select class="form-select form-input-sm" onchange="changePageSize(this.value)">
                            <option value="10">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    </div>
                </div>
                
                <div class="pagination-controls">
                    <div class="pagination-buttons">
                        <button class="pagination-btn pagination-btn-prev" onclick="changePage('first')" title="First page">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="pagination-btn pagination-btn-prev" onclick="changePage('prev')" disabled title="Previous page">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        
                        <div class="pagination-numbers">
                            <button class="pagination-number active" onclick="changePage(1)">1</button>
                            <button class="pagination-number" onclick="changePage(2)">2</button>
                            <button class="pagination-number" onclick="changePage(3)">3</button>
                            <span class="pagination-ellipsis">...</span>
                            <button class="pagination-number" onclick="changePage(23)">23</button>
                            <button class="pagination-number" onclick="changePage(24)">24</button>
                            <button class="pagination-number" onclick="changePage(25)">25</button>
                        </div>
                        
                        <button class="pagination-btn pagination-btn-next" onclick="changePage('next')" title="Next page">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                        <button class="pagination-btn pagination-btn-next" onclick="changePage('last')" title="Last page">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="pagination-jump">
                        <span class="pagination-jump-label">Go to page:</span>
                        <input type="number" class="pagination-jump-input" min="1" max="25" value="1" onchange="jumpToPage(this.value)">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Dashboard Cards --}}
    <div class="table-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon summary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Summary Dashboard Cards</h3>
                    <p class="showcase-subtitle">KPI cards and summary tables for dashboard widgets</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyTableCode('summary')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            {{-- KPI Cards Grid --}}
            <div class="kpi-grid">
                <div class="kpi-card revenue">
                    <div class="kpi-header">
                        <div class="kpi-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <div class="kpi-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="kpi-value">R 2,450,000</div>
                    <div class="kpi-label">Total Revenue</div>
                    <div class="kpi-change">+12.5% from last month</div>
                </div>

                <div class="kpi-card orders">
                    <div class="kpi-header">
                        <div class="kpi-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <div class="kpi-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="kpi-value">1,247</div>
                    <div class="kpi-label">Orders This Month</div>
                    <div class="kpi-change">+8.2% from last month</div>
                </div>

                <div class="kpi-card customers">
                    <div class="kpi-header">
                        <div class="kpi-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="kpi-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="kpi-value">847</div>
                    <div class="kpi-label">Active Customers</div>
                    <div class="kpi-change">+15.3% from last month</div>
                </div>

                <div class="kpi-card inventory">
                    <div class="kpi-header">
                        <div class="kpi-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="kpi-trend negative">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-8-8 8-8m8 16l-8-8 8-8"/>
                            </svg>
                        </div>
                    </div>
                    <div class="kpi-value">12,453</div>
                    <div class="kpi-label">Items in Stock</div>
                    <div class="kpi-change">-2.1% from last month</div>
                </div>
            </div>

            {{-- Summary Tables --}}
            <div class="summary-tables-grid">
                <div class="summary-table-card">
                    <div class="summary-table-header">
                        <h4 class="summary-table-title">Top Products</h4>
                        <button class="btn btn-secondary btn-sm" onclick="handleActionWithAlert('view-report', 'products')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            View Report
                        </button>
                    </div>
                    <table class="summary-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Sales</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="summary-product">
                                        <div class="product-name">Premium Widget</div>
                                        <div class="product-sku">PWA-001</div>
                                    </div>
                                </td>
                                <td>234 units</td>
                                <td>R 292,500</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="summary-product">
                                        <div class="product-name">Industrial Connector</div>
                                        <div class="product-sku">ICS-024</div>
                                    </div>
                                </td>
                                <td>156 units</td>
                                <td>R 138,840</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="summary-product">
                                        <div class="product-name">Safety Module</div>
                                        <div class="product-sku">SCM-089</div>
                                    </div>
                                </td>
                                <td>89 units</td>
                                <td>R 208,260</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="summary-table-card">
                    <div class="summary-table-header">
                        <h4 class="summary-table-title">Recent Activity</h4>
                        <button class="btn btn-secondary btn-sm" onclick="handleActionWithAlert('view-activity', 'all')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            View All
                        </button>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon activity-sale">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New order from Acme Manufacturing</div>
                                <div class="activity-time">2 minutes ago</div>
                            </div>
                            <div class="activity-value">R 45,670</div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-customer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New customer registration</div>
                                <div class="activity-time">15 minutes ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon activity-inventory">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Low stock alert: Safety Module</div>
                                <div class="activity-time">1 hour ago</div>
                            </div>
                        </div>
                    </div>
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

/* Table Showcases */
.table-showcase {
    background: white;
    border-radius: var(--radius-3xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-slow);
    margin-bottom: var(--space-8);
}

.table-showcase:hover {
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

.showcase-icon.customers {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.quotes {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.nested {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.basic {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
}

.showcase-icon.sortable {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.paginated {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.summary {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
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

/* Advanced Search Bar */
.advanced-search-bar {
    background: var(--neutral-50);
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
    border: 1px solid var(--neutral-200);
}

.search-main {
    display: flex;
    gap: var(--space-4);
    align-items: center;
    margin-bottom: var(--space-4);
}

.search-input-group {
    position: relative;
    flex: 1;
    max-width: 500px;
}

.search-icon {
    position: absolute;
    left: var(--space-4);
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    color: var(--neutral-400);
}

.search-input {
    padding-left: var(--space-12);
    padding-right: var(--space-10);
    height: 48px;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-300);
    background: white;
    transition: all var(--transition-fast);
}

.search-input:focus {
    border-color: var(--brand-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    background: white;
}

.search-clear-btn {
    position: absolute;
    right: var(--space-3);
    top: 50%;
    transform: translateY(-50%);
    width: 32px;
    height: 32px;
    border: none;
    background: var(--neutral-200);
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0;
    transition: all var(--transition-fast);
}

.search-input:not(:placeholder-shown) + .search-clear-btn {
    opacity: 1;
}

.search-clear-btn:hover {
    background: var(--neutral-300);
}

.filter-toggle {
    height: 48px;
    border-radius: var(--radius-2xl);
}

.advanced-filters {
    padding-top: var(--space-4);
    border-top: 1px solid var(--neutral-200);
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-4);
    margin-bottom: var(--space-4);
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.filter-label {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--neutral-700);
}

.filter-actions {
    display: flex;
    gap: var(--space-3);
    justify-content: flex-end;
}

/* Table Components */
.table-container {
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    background: white;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: var(--text-sm);
}

.data-table thead {
    background: var(--neutral-100);
}

.data-table th {
    padding: var(--space-5) var(--space-6);
    text-align: left;
    font-weight: 600;
    color: var(--neutral-800);
    border-bottom: 2px solid var(--neutral-200);
    font-size: var(--text-sm);
    white-space: nowrap;
    position: relative;
}

.data-table th.sortable {
    cursor: pointer;
    user-select: none;
}

.data-table th.sortable:hover {
    background: var(--neutral-200);
}

.data-table td {
    padding: var(--space-5) var(--space-6);
    color: var(--neutral-700);
    border-bottom: 1px solid var(--neutral-100);
    vertical-align: middle;
}

.data-table tbody tr {
    transition: all var(--transition-fast);
}

.data-table tbody tr:hover {
    background: var(--neutral-50);
    transform: translateX(2px);
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}

/* Sort Indicators */
.sort-indicator {
    position: absolute;
    right: var(--space-2);
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.5;
    transition: opacity var(--transition-fast);
}

.sortable:hover .sort-indicator {
    opacity: 1;
}

.sortable.sort-asc .sort-indicator svg {
    transform: rotate(180deg);
}

.sortable.sort-desc .sort-indicator svg {
    transform: rotate(0deg);
}

/* Customer Profile Components */
.customer-profile {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    min-width: 280px;
}

.avatar {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: var(--text-sm);
    color: white;
    flex-shrink: 0;
    border: 3px solid white;
    box-shadow: var(--shadow-md);
}

.avatar.avatar-company {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.avatar.avatar-individual {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.customer-details {
    flex: 1;
    min-width: 0;
}

.customer-name {
    font-weight: 600;
    color: var(--neutral-900);
    font-size: var(--text-base);
    line-height: 1.3;
    margin-bottom: var(--space-1);
}

.customer-type {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-2);
}

.customer-tags {
    display: flex;
    gap: var(--space-1);
    flex-wrap: wrap;
}

.tag {
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
    line-height: 1;
}

.tag.tag-vip {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    color: white;
}

.tag.tag-industrial {
    background: var(--neutral-200);
    color: var(--neutral-700);
}

.tag.tag-repeat {
    background: var(--success-100);
    color: var(--success-700);
}

/* Contact & Location Info */
.contact-info,
.location-info {
    min-width: 180px;
}

.contact-name,
.location-city {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    margin-bottom: var(--space-1);
}

.contact-title,
.location-region {
    font-size: var(--text-xs);
    color: var(--neutral-600);
    margin-bottom: var(--space-2);
}

.contact-methods {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.contact-link {
    font-size: var(--text-xs);
    color: var(--brand-600);
    text-decoration: none;
}

.contact-link:hover {
    text-decoration: underline;
}

/* Quote Components */
.quote-info {
    min-width: 250px;
}

.quote-number {
    font-weight: 600;
    color: var(--brand-600);
    font-size: var(--text-sm);
    margin-bottom: var(--space-1);
}

.quote-title {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    margin-bottom: var(--space-2);
}

.quote-meta {
    display: flex;
    gap: var(--space-3);
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.quote-value {
    text-align: right;
    min-width: 120px;
}

.value-amount {
    font-weight: 600;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    margin-bottom: var(--space-1);
}

.value-margin {
    font-size: var(--text-xs);
    color: var(--success-600);
}

.validity-info {
    min-width: 120px;
}

.valid-date {
    font-size: var(--text-sm);
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.days-remaining {
    font-size: var(--text-xs);
    color: var(--warning-600);
}

/* Nested Table Styles */
.nested-table .category-row,
.nested-table .product-row {
    transition: all var(--transition-fast);
}

.nested-table .category-row[data-level="0"] td:first-child {
    padding-left: var(--space-6);
}

.nested-table .product-row[data-level="1"] td:first-child {
    padding-left: var(--space-12);
}

.category-item,
.product-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.expand-btn {
    width: 24px;
    height: 24px;
    border: none;
    background: var(--neutral-200);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
}

.expand-btn:hover {
    background: var(--neutral-300);
}

.expand-btn.expanded .expand-icon {
    transform: rotate(90deg);
}

.category-icon,
.product-icon {
    width: 32px;
    height: 32px;
    background: var(--brand-100);
    color: var(--brand-600);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
}

.category-details,
.product-details {
    flex: 1;
}

.category-name,
.product-name {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    margin-bottom: var(--space-1);
}

.category-desc,
.product-desc {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

/* Status & Badges */
.status {
    display: inline-flex;
    align-items: center;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 600;
    line-height: 1;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.status.status-active { background: var(--success-100); color: var(--success-700); }
.status.status-pending { background: var(--warning-100); color: var(--warning-700); }
.status.status-approved { background: var(--success-100); color: var(--success-700); }
.status.status-success { background: var(--success-100); color: var(--success-700); }
.status.status-warning { background: var(--warning-100); color: var(--warning-700); }
.status.status-danger { background: var(--danger-100); color: var(--danger-700); }

/* Action Buttons */
.action-group {
    display: flex;
    gap: var(--space-2);
    justify-content: center;
}

.action-btn {
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
}

.action-btn:hover {
    background: var(--neutral-50);
    border-color: var(--brand-400);
    color: var(--brand-600);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.action-btn.delete:hover {
    background: var(--danger-50);
    border-color: var(--danger-400);
    color: var(--danger-600);
}

.action-btn.convert:hover {
    background: var(--success-50);
    border-color: var(--success-400);
    color: var(--success-600);
}

.action-btn.send:hover {
    background: var(--brand-50);
    border-color: var(--brand-400);
    color: var(--brand-600);
}

/* SKU and Pricing */
.sku {
    background: var(--neutral-100);
    color: var(--neutral-700);
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-md);
    font-size: var(--text-xs);
    font-weight: 500;
}

.price,
.customer-value {
    font-weight: 600;
    color: var(--neutral-900);
    font-size: var(--text-sm);
}

.orders-count {
    color: var(--neutral-700);
    font-size: var(--text-sm);
}

.stock-info {
    min-width: 120px;
}

.stock-count {
    font-size: var(--text-sm);
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.stock-location {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

/* Pagination Container */
.pagination-container {
    background: var(--neutral-50);
    border-top: 1px solid var(--neutral-200);
    padding: var(--space-5) var(--space-6);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--space-4);
    flex-wrap: wrap;
}

.pagination-info {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    flex-wrap: wrap;
}

.pagination-text {
    font-size: var(--text-sm);
    color: var(--neutral-600);
}

.pagination-options {
    display: flex;
    align-items: center;
}

.pagination-controls {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    flex-wrap: wrap;
}

.pagination-buttons {
    display: flex;
    align-items: center;
    gap: var(--space-1);
}

.pagination-btn {
    width: 40px;
    height: 40px;
    border: 1px solid var(--neutral-300);
    background: white;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    color: var(--neutral-600);
}

.pagination-btn:hover:not(:disabled) {
    background: var(--brand-50);
    border-color: var(--brand-400);
    color: var(--brand-600);
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-numbers {
    display: flex;
    align-items: center;
    gap: var(--space-1);
    margin: 0 var(--space-2);
}

.pagination-number {
    width: 40px;
    height: 40px;
    border: 1px solid var(--neutral-300);
    background: white;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    color: var(--neutral-600);
    font-size: var(--text-sm);
    font-weight: 500;
}

.pagination-number:hover {
    background: var(--brand-50);
    border-color: var(--brand-400);
    color: var(--brand-600);
}

.pagination-number.active {
    background: var(--brand-600);
    border-color: var(--brand-600);
    color: white;
}

.pagination-ellipsis {
    padding: 0 var(--space-2);
    color: var(--neutral-400);
    font-size: var(--text-sm);
}

.pagination-jump {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.pagination-jump-label {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    white-space: nowrap;
}

.pagination-jump-input {
    width: 60px;
    padding: var(--space-2);
    border: 1px solid var(--neutral-300);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    text-align: center;
}

.pagination-jump-input:focus {
    border-color: var(--brand-500);
    outline: none;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* KPI Grid */
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-6);
    margin-bottom: var(--space-8);
}

.kpi-card {
    background: white;
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    border: 1px solid var(--neutral-200);
    transition: all var(--transition-base);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.kpi-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
}

.kpi-card.revenue::before {
    background: linear-gradient(90deg, var(--brand-400), var(--brand-600));
}

.kpi-card.orders::before {
    background: linear-gradient(90deg, var(--success-400), var(--success-600));
}

.kpi-card.customers::before {
    background: linear-gradient(90deg, var(--warning-400), var(--warning-600));
}

.kpi-card.inventory::before {
    background: linear-gradient(90deg, var(--neutral-400), var(--neutral-600));
}

.kpi-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
}

.kpi-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: var(--space-4);
}

.kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.kpi-card.revenue .kpi-icon {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.kpi-card.orders .kpi-icon {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.kpi-card.customers .kpi-icon {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.kpi-card.inventory .kpi-icon {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
}

.kpi-trend {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.kpi-trend.positive {
    background: var(--success-500);
}

.kpi-trend.negative {
    background: var(--danger-500);
}

.kpi-value {
    font-size: var(--text-3xl);
    font-weight: 700;
    color: var(--neutral-900);
    margin-bottom: var(--space-2);
    line-height: 1.1;
}

.kpi-label {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-3);
    font-weight: 500;
}

.kpi-change {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--success-600);
}

/* Summary Tables Grid */
.summary-tables-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--space-6);
}

.summary-table-card {
    background: white;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    transition: all var(--transition-base);
}

.summary-table-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
}

.summary-table-header {
    padding: var(--space-6);
    border-bottom: 1px solid var(--neutral-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--neutral-50);
}

.summary-table-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0;
}

.summary-table {
    width: 100%;
    border-collapse: collapse;
}

.summary-table thead {
    background: var(--neutral-100);
}

.summary-table th {
    padding: var(--space-4) var(--space-6);
    text-align: left;
    font-weight: 600;
    color: var(--neutral-700);
    font-size: var(--text-sm);
    border-bottom: 1px solid var(--neutral-200);
}

.summary-table td {
    padding: var(--space-4) var(--space-6);
    color: var(--neutral-600);
    border-bottom: 1px solid var(--neutral-100);
    font-size: var(--text-sm);
}

.summary-table tbody tr:hover {
    background: var(--neutral-50);
}

.summary-table tbody tr:last-child td {
    border-bottom: none;
}

.summary-product {
    display: flex;
    flex-direction: column;
    gap: var(--space-1);
}

.product-name {
    font-weight: 500;
    color: var(--neutral-900);
}

.product-sku {
    font-size: var(--text-xs);
    color: var(--neutral-500);
    font-family: var(--font-mono);
}

/* Activity List */
.activity-list {
    padding: var(--space-6);
}

.activity-item {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    padding: var(--space-4) 0;
    border-bottom: 1px solid var(--neutral-100);
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.activity-icon.activity-sale {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.activity-icon.activity-customer {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.activity-icon.activity-inventory {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.activity-content {
    flex: 1;
    min-width: 0;
}

.activity-title {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.activity-time {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.activity-value {
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--success-600);
    flex-shrink: 0;
}

/* Dark Mode Support */
[data-theme="dark"] .library-hero {
    background: linear-gradient(135deg, var(--neutral-200) 0%, var(--neutral-300) 100%);
}

[data-theme="dark"] .table-showcase {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .showcase-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .advanced-search-bar {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .search-input {
    background: var(--neutral-100);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .table-container {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .data-table th {
    background: var(--neutral-200);
    color: var(--neutral-800);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .data-table td {
    color: var(--neutral-700);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .data-table tbody tr:hover {
    background: var(--neutral-200);
}

[data-theme="dark"] .pagination-container {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .pagination-btn,
[data-theme="dark"] .pagination-number {
    background: var(--neutral-100);
    border-color: var(--neutral-400);
    color: var(--neutral-700);
}

[data-theme="dark"] .pagination-btn:hover:not(:disabled),
[data-theme="dark"] .pagination-number:hover {
    background: var(--brand-950);
    border-color: var(--brand-700);
    color: var(--brand-300);
}

[data-theme="dark"] .pagination-number.active {
    background: var(--brand-600);
    border-color: var(--brand-600);
}

[data-theme="dark"] .kpi-card,
[data-theme="dark"] .summary-table-card {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .summary-table-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .summary-table th {
    background: var(--neutral-200);
    color: var(--neutral-800);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .summary-table td {
    color: var(--neutral-700);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .summary-table tbody tr:hover,
[data-theme="dark"] .activity-item:hover {
    background: var(--neutral-200);
}

/* Responsive Design */
@media (max-width: 768px) {
    .library-hero {
        padding: var(--space-8) var(--space-4);
    }
    
    .hero-title {
        font-size: var(--text-3xl);
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
    
    .customer-profile {
        min-width: 200px;
    }
    
    .search-main {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-grid {
        grid-template-columns: 1fr;
    }
    
    .pagination-container {
        flex-direction: column;
        align-items: stretch;
        gap: var(--space-4);
    }
    
    .pagination-info {
        justify-content: space-between;
    }
    
    .pagination-controls {
        justify-content: center;
    }
    
    .pagination-numbers {
        margin: 0;
    }
    
    .kpi-grid {
        grid-template-columns: 1fr;
    }
    
    .summary-tables-grid {
        grid-template-columns: 1fr;
    }
    
    .pagination-jump {
        display: none;
    }
}
</style>
@endpush

@pushOnce('scripts')
@verbatim
<script>
// Complete ERP/CRM table component functions
function copyTableCode(tableType) {
    const tableExamples = {
        customers: `<div class="advanced-search-bar">
    <div class="search-main">
        <div class="search-input-group">
            <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" class="form-input search-input" placeholder="Search customers...">
        </div>
        <button class="btn btn-secondary btn-sm filter-toggle">Filters</button>
    </div>
</div>

<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th><input type="checkbox" class="select-all"></th>
                <th>Customer</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" class="select-row"></td>
                <td>
                    <div class="customer-profile">
                        <div class="avatar avatar-company">AM</div>
                        <div class="customer-details">
                            <div class="customer-name">Acme Manufacturing</div>
                            <div class="customer-type">Large Enterprise</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="contact-info">
                        <div class="contact-name">John Mitchell</div>
                        <div class="contact-title">Manager</div>
                    </div>
                </td>
                <td><span class="status status-active">Active</span></td>
                <td>
                    <div class="action-group">
                        <button class="action-btn view">View</button>
                        <button class="action-btn edit">Edit</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>`,

        quotes: `<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Quote</th>
                <th>Customer</th>
                <th>Value</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="quote-info">
                        <div class="quote-number">#QUO-2024-015</div>
                        <div class="quote-title">Industrial Equipment</div>
                    </div>
                </td>
                <td>
                    <div class="customer-summary">
                        <div class="customer-name">Acme Manufacturing</div>
                    </div>
                </td>
                <td>
                    <div class="quote-value">
                        <div class="value-amount">R 156,750.00</div>
                    </div>
                </td>
                <td><span class="status status-pending">Pending</span></td>
                <td>
                    <div class="action-group">
                        <button class="action-btn view">View</button>
                        <button class="action-btn convert">Convert</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>`,

        nested: `<div class="table-container">
    <table class="data-table nested-table">
        <thead>
            <tr>
                <th>Category / Product</th>
                <th>SKU</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="category-row" data-level="0">
                <td>
                    <div class="category-item">
                        <button class="expand-btn" onclick="toggleCategory(this)">▶</button>
                        <div class="category-details">
                            <div class="category-name">Industrial Equipment</div>
                        </div>
                    </div>
                </td>
                <td>-</td>
                <td>245 items</td>
                <td>-</td>
                <td>
                    <div class="action-group">
                        <button class="action-btn edit">Edit</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>`,

        basic: `<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Premium Widget Assembly</td>
                <td>Electronics</td>
                <td>R 1,250.00</td>
                <td><span class="status status-success">In Stock</span></td>
            </tr>
        </tbody>
    </table>
</div>`,

        sortable: `<div class="table-container">
    <table class="data-table sortable-table" id="my-sortable-table">
        <thead>
            <tr>
                <th class="sortable" onclick="sortTable('my-sortable-table', 0)">
                    Order #
                    <span class="sort-indicator">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                        </svg>
                    </span>
                </th>
                <th class="sortable" onclick="sortTable('my-sortable-table', 1)">Customer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#ORD-2024-001</td>
                <td>Acme Manufacturing</td>
                <td><button class="action-btn view">View</button></td>
            </tr>
        </tbody>
    </table>
</div>`,

        paginated: `<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#INV-2024-101</td>
                <td>Acme Manufacturing</td>
                <td>R 45,670.00</td>
                <td><span class="status status-success">Paid</span></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="pagination-container">
    <div class="pagination-info">
        <div class="pagination-text">Showing <strong>1-10</strong> of <strong>247</strong> items</div>
    </div>
    <div class="pagination-controls">
        <div class="pagination-buttons">
            <button class="pagination-btn" onclick="changePage('prev')">‹</button>
            <button class="pagination-number active" onclick="changePage(1)">1</button>
            <button class="pagination-number" onclick="changePage(2)">2</button>
            <button class="pagination-btn" onclick="changePage('next')">›</button>
        </div>
    </div>
</div>`,

        summary: `<div class="kpi-grid">
    <div class="kpi-card revenue">
        <div class="kpi-header">
            <div class="kpi-icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2"/>
                </svg>
            </div>
            <div class="kpi-trend positive">↗</div>
        </div>
        <div class="kpi-value">R 2,450,000</div>
        <div class="kpi-label">Total Revenue</div>
        <div class="kpi-change">+12.5% from last month</div>
    </div>
</div>

<div class="summary-tables-grid">
    <div class="summary-table-card">
        <div class="summary-table-header">
            <h4 class="summary-table-title">Top Products</h4>
        </div>
        <table class="summary-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Sales</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Premium Widget</td>
                    <td>234 units</td>
                    <td>R 292,500</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>`
    };

    const code = tableExamples[tableType];
    if (!code) {
        console.error('Table type not found:', tableType);
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast(`${tableType.charAt(0).toUpperCase() + tableType.slice(1)} table code copied!`, 'success');
        }
    }).catch(() => {
        console.log('Table code:', code);
        if (window.ManuCore) {
            ManuCore.showToast('Code logged to console', 'info');
        }
    });
}

function exportTableLibrary() {
    const completeLibrary = `/* MANUCORE ERP - TABLE LIBRARY */
Complete ERP/CRM table patterns with advanced features:
- Customer Management with search & filters
- Quotes with conversion tracking  
- Nested hierarchical categories
- Sortable columns with indicators
- Advanced pagination controls
- KPI dashboard cards
- Responsive design & dark mode support`;

    navigator.clipboard.writeText(completeLibrary).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast('Complete library exported!', 'success');
        }
    });
}

function handleAction(action, id) {
    const message = `Action: ${action} for ID: ${id}`;
    if (window.ManuCore) {
        ManuCore.showToast(message, 'info');
    }
}

function toggleAdvancedFilters() {
    const filters = document.getElementById('advanced-filters');
    const isVisible = filters.style.display !== 'none';
    filters.style.display = isVisible ? 'none' : 'block';
}

function toggleCategory(button) {
    const row = button.closest('tr');
    const level = parseInt(row.dataset.level);
    const isExpanded = button.classList.contains('expanded');
    
    button.classList.toggle('expanded');
    
    let nextRow = row.nextElementSibling;
    while (nextRow && parseInt(nextRow.dataset.level) > level) {
        if (parseInt(nextRow.dataset.level) === level + 1) {
            nextRow.style.display = isExpanded ? 'none' : '';
        }
        nextRow = nextRow.nextElementSibling;
    }
}

// Enhanced table sorting function
function sortTable(tableId, columnIndex) {
    const table = document.getElementById(tableId);
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const header = table.querySelectorAll('th')[columnIndex];
    
    // Determine sort direction
    const isAscending = header.classList.contains('sort-asc');
    
    // Clear all sort classes
    table.querySelectorAll('th').forEach(th => {
        th.classList.remove('sort-asc', 'sort-desc');
    });
    
    // Set new sort class
    header.classList.add(isAscending ? 'sort-desc' : 'sort-asc');
    
    // Sort rows
    rows.sort((a, b) => {
        const aCell = a.cells[columnIndex];
        const bCell = b.cells[columnIndex];
        
        // Get sort value (use data-sort if available, otherwise text content)
        let aValue = aCell.dataset.sort || aCell.textContent.trim();
        let bValue = bCell.dataset.sort || bCell.textContent.trim();
        
        // Handle numeric values
        const aNum = parseFloat(aValue.replace(/[^\d.-]/g, ''));
        const bNum = parseFloat(bValue.replace(/[^\d.-]/g, ''));
        
        if (!isNaN(aNum) && !isNaN(bNum)) {
            return isAscending ? bNum - aNum : aNum - bNum;
        }
        
        // Handle date values
        const aDate = new Date(aValue);
        const bDate = new Date(bValue);
        if (!isNaN(aDate.getTime()) && !isNaN(bDate.getTime())) {
            return isAscending ? bDate - aDate : aDate - bDate;
        }
        
        // Handle string values
        return isAscending ? 
            bValue.localeCompare(aValue) : 
            aValue.localeCompare(bValue);
    });
    
    // Re-append sorted rows
    rows.forEach(row => tbody.appendChild(row));
    
    // Show feedback
    if (window.ManuCore) {
        const direction = isAscending ? 'descending' : 'ascending';
        ManuCore.showToast(`Table sorted ${direction}`, 'info');
    }
}

// Pagination functions
function changePage(page) {
    const currentPage = document.querySelector('.pagination-number.active');
    const allPages = document.querySelectorAll('.pagination-number');
    const totalPages = 25; // This would come from your backend
    
    let newPage = 1;
    
    if (page === 'first') {
        newPage = 1;
    } else if (page === 'last') {
        newPage = totalPages;
    } else if (page === 'prev') {
        newPage = Math.max(1, parseInt(currentPage.textContent) - 1);
    } else if (page === 'next') {
        newPage = Math.min(totalPages, parseInt(currentPage.textContent) + 1);
    } else {
        newPage = parseInt(page);
    }
    
    // Update active page
    allPages.forEach(p => p.classList.remove('active'));
    const targetPage = document.querySelector(`[onclick="changePage(${newPage})"]`);
    if (targetPage) {
        targetPage.classList.add('active');
    }
    
    // Update pagination buttons state
    updatePaginationButtons(newPage, totalPages);
    
    // Show feedback
    if (window.ManuCore) {
        ManuCore.showToast(`Navigated to page ${newPage}`, 'info');
    }
    
    // In real implementation, you would load new data here
    console.log(`Loading page ${newPage}`);
}

function updatePaginationButtons(currentPage, totalPages) {
    const prevBtns = document.querySelectorAll('.pagination-btn-prev');
    const nextBtns = document.querySelectorAll('.pagination-btn-next');
    
    // Update previous buttons
    prevBtns.forEach(btn => {
        btn.disabled = currentPage <= 1;
    });
    
    // Update next buttons
    nextBtns.forEach(btn => {
        btn.disabled = currentPage >= totalPages;
    });
}

function changePageSize(size) {
    if (window.ManuCore) {
        ManuCore.showToast(`Page size changed to ${size} items`, 'info');
    }
    
    // In real implementation, you would reload the table with new page size
    console.log(`Changing page size to ${size}`);
}

function jumpToPage(page) {
    const pageNum = parseInt(page);
    if (pageNum >= 1 && pageNum <= 25) {
        changePage(pageNum);
    } else {
        if (window.ManuCore) {
            ManuCore.showToast('Invalid page number', 'warning');
        }
    }
}

// Enhanced action handlers with SweetAlert2
function handleActionWithAlert(action, id) {
    const actionMessages = {
        'view': 'View Details',
        'edit': 'Edit Item', 
        'view-invoice': 'View Invoice',
        'edit-invoice': 'Edit Invoice',
        'view-product': 'View Product',
        'edit-product': 'Edit Product',
        'view-report': 'View Report',
        'view-activity': 'View Activity'
    };
    
    const message = actionMessages[action] || 'Perform Action';
    
    if (window.Swal) {
        Swal.fire({
            title: message,
            text: `Action: ${action} for ID: ${id}`,
            icon: 'info',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'OK'
        });
    } else if (window.ManuCore) {
        ManuCore.showToast(`${message} - ID: ${id}`, 'info');
    }
}

function handleDeleteWithAlert(type, id) {
    const typeNames = {
        'invoice': 'invoice',
        'product': 'product',
        'customer': 'customer',
        'order': 'order'
    };
    
    const itemName = typeNames[type] || 'item';
    
    if (window.Swal) {
        Swal.fire({
            title: `Delete ${itemName}?`,
            text: `Are you sure you want to delete this ${itemName}? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Simulate deletion
                Swal.fire({
                    title: 'Deleted!',
                    text: `${itemName.charAt(0).toUpperCase() + itemName.slice(1)} has been deleted.`,
                    icon: 'success',
                    confirmButtonColor: '#2563eb'
                });
            }
        });
    } else if (window.ManuCore) {
        if (confirm(`Are you sure you want to delete this ${itemName}?`)) {
            ManuCore.showToast(`${itemName.charAt(0).toUpperCase() + itemName.slice(1)} deleted`, 'success');
        }
    }
}

// KPI interaction functions
function handleKpiClick(kpiType) {
    const kpiMessages = {
        'revenue': 'Revenue Analytics',
        'orders': 'Order Management',
        'customers': 'Customer Analytics', 
        'inventory': 'Inventory Management'
    };
    
    const message = kpiMessages[kpiType] || 'KPI Details';
    
    if (window.ManuCore) {
        ManuCore.showToast(`Opening ${message}`, 'info');
    }
}

// Initialize pagination on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set initial pagination state
    updatePaginationButtons(1, 25);
    
    // Add click handlers to KPI cards
    document.querySelectorAll('.kpi-card').forEach(card => {
        card.addEventListener('click', function() {
            const kpiType = Array.from(this.classList).find(cls => 
                ['revenue', 'orders', 'customers', 'inventory'].includes(cls)
            );
            if (kpiType) {
                handleKpiClick(kpiType);
            }
        });
        
        // Add hover effect
        card.style.cursor = 'pointer';
    });
    
    console.log('📊 Enhanced table functions loaded');
    
    if (window.ManuCore && ManuCore.initTooltips) {
        ManuCore.initTooltips();
    }
});
</script>
@endverbatim
@endpushOnce