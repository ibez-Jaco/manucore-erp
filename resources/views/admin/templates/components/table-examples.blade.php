@extends('layouts.panel')

@section('title', 'Table Components - ManuCore ERP')

@section('header', 'Professional Table Components')
@section('subheader', 'Complete collection of enterprise table patterns with search, filtering, and responsive design')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="copyTableCode()">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
        </svg>
        Copy Code
    </button>
@endsection

@section('content')
<div class="space-y-8">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="alert-content">
            <div class="alert-title">Complete Table Component Library</div>
            <div class="alert-message">8 professional table patterns ready for customers, products, orders, quotes, and more.</div>
        </div>
    </div>

    {{-- 1. Basic Data Table --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">1. Basic Data Table</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Simple Product Listing</h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 rounded-lg bg-brand-100">
                                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">Premium Widget Assembly</div>
                                            <div class="text-sm text-neutral-500">High-quality manufacturing component</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-mono text-sm text-neutral-700">PWA-001</span></td>
                                <td>Electronics</td>
                                <td class="font-semibold text-neutral-900">R 1,250.00</td>
                                <td>234 units</td>
                                <td><span class="badge badge-success">In Stock</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">Industrial Connector Set</div>
                                            <div class="text-sm text-neutral-500">Professional grade connectors</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-mono text-sm text-neutral-700">ICS-024</span></td>
                                <td>Mechanical</td>
                                <td class="font-semibold text-neutral-900">R 890.00</td>
                                <td>12 units</td>
                                <td><span class="badge badge-warning">Low Stock</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-red-100 rounded-lg">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">Precision Alignment Tool</div>
                                            <div class="text-sm text-neutral-500">High-accuracy measurement device</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="font-mono text-sm text-neutral-700">PAT-156</span></td>
                                <td>Tools</td>
                                <td class="font-semibold text-neutral-900">R 3,450.00</td>
                                <td>0 units</td>
                                <td><span class="badge badge-danger">Out of Stock</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Advanced Table with Actions --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">2. Advanced Table with Actions</h3>
        <div class="data-table-container">
            <div class="data-table-header">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                    <h3 class="data-table-title">Customer Orders</h3>
                </div>
                <div class="data-table-actions">
                    {{-- Advanced Search --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               class="pl-10 pr-4 form-input form-input-sm" 
                               placeholder="Search orders..." 
                               id="orders-search">
                    </div>
                    
                    {{-- Filter Dropdown --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" onclick="toggleDropdown('filter-dropdown')">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                            </svg>
                            Filter
                        </button>
                        <div id="filter-dropdown" class="dropdown-menu">
                            <div class="px-3 py-2 border-b border-neutral-200">
                                <div class="font-medium text-neutral-700">Filter by Status</div>
                            </div>
                            <a href="#" class="dropdown-item" data-filter="all">All Orders</a>
                            <a href="#" class="dropdown-item" data-filter="pending">Pending</a>
                            <a href="#" class="dropdown-item" data-filter="processing">Processing</a>
                            <a href="#" class="dropdown-item" data-filter="completed">Completed</a>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary btn-sm" onclick="createOrder()">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        New Order
                    </button>
                </div>
            </div>

            <table class="data-table" id="orders-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="table-actions-column">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="processing">
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-brand-100">
                                    <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#ORD-2024-001</div>
                                    <div class="text-sm text-neutral-500">15 items</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-sm font-semibold text-white rounded-full bg-gradient-to-br from-blue-500 to-blue-600">
                                    AM
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">Acme Manufacturing</div>
                                    <div class="text-sm text-neutral-500">john@acme.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold text-neutral-900">R 45,670.00</div>
                            <div class="text-sm text-neutral-500">VAT inclusive</div>
                        </td>
                        <td>
                            <div class="text-sm font-medium text-neutral-900">2024-09-05</div>
                            <div class="text-xs text-neutral-500">10:30 AM</div>
                        </td>
                        <td><span class="badge badge-warning">Processing</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Edit Order" onclick="editOrder(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Print Invoice" onclick="printInvoice(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="completed">
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg bg-success-100">
                                    <svg class="w-4 h-4 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#ORD-2024-002</div>
                                    <div class="text-sm text-neutral-500">8 items</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-sm font-semibold text-white rounded-full bg-gradient-to-br from-green-500 to-green-600">
                                    TC
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">TechCorp Solutions</div>
                                    <div class="text-sm text-neutral-500">sarah@techcorp.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold text-neutral-900">R 78,950.00</div>
                            <div class="text-sm text-neutral-500">VAT inclusive</div>
                        </td>
                        <td>
                            <div class="text-sm font-medium text-neutral-900">2024-09-04</div>
                            <div class="text-xs text-neutral-500">2:15 PM</div>
                        </td>
                        <td><span class="badge badge-success">Completed</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Print Invoice" onclick="printInvoice(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Reorder" onclick="reorder(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- 3. Sortable Table --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">3. Sortable Table</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Customer Management</h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table class="table" id="sortable-table">
                        <thead>
                            <tr>
                                <th class="sortable" data-sort="customer">
                                    <div class="flex items-center space-x-1 cursor-pointer">
                                        <span>Customer</span>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="sortable" data-sort="email">
                                    <div class="flex items-center space-x-1 cursor-pointer">
                                        <span>Email</span>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="sortable" data-sort="orders">
                                    <div class="flex items-center space-x-1 cursor-pointer">
                                        <span>Total Orders</span>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="sortable" data-sort="value">
                                    <div class="flex items-center space-x-1 cursor-pointer">
                                        <span>Lifetime Value</span>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                                <th class="sortable" data-sort="status">
                                    <div class="flex items-center space-x-1 cursor-pointer">
                                        <span>Status</span>
                                        <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-sm font-semibold text-white rounded-full bg-gradient-to-br from-purple-500 to-purple-600">
                                            JS
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">John Smith</div>
                                            <div class="text-sm text-neutral-500">Acme Manufacturing</div>
                                        </div>
                                    </div>
                                </td>
                                <td>john.smith@acme.com</td>
                                <td class="font-semibold">127</td>
                                <td class="font-semibold text-success-600">R 2,450,000</td>
                                <td><span class="badge badge-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-sm font-semibold text-white rounded-full bg-gradient-to-br from-pink-500 to-pink-600">
                                            SJ
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">Sarah Johnson</div>
                                            <div class="text-sm text-neutral-500">TechCorp Solutions</div>
                                        </div>
                                    </div>
                                </td>
                                <td>sarah.johnson@techcorp.com</td>
                                <td class="font-semibold">89</td>
                                <td class="font-semibold text-success-600">R 1,890,000</td>
                                <td><span class="badge badge-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-sm font-semibold text-white rounded-full bg-gradient-to-br from-orange-500 to-orange-600">
                                            MW
                                        </div>
                                        <div>
                                            <div class="font-semibold text-neutral-900">Mike Wilson</div>
                                            <div class="text-sm text-neutral-500">Global Enterprises</div>
                                        </div>
                                    </div>
                                </td>
                                <td>mike.wilson@global.com</td>
                                <td class="font-semibold">156</td>
                                <td class="font-semibold text-success-600">R 3,120,000</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Table with Selection & Bulk Actions --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">4. Table with Selection & Bulk Actions</h3>
        <div class="data-table-container">
            <div class="data-table-header">
                <h3 class="data-table-title">Quote Management</h3>
                <div class="data-table-actions">
                    <button class="btn btn-secondary btn-sm" onclick="exportQuotes()">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Export
                    </button>
                    <button class="btn btn-primary btn-sm" onclick="createQuote()">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        New Quote
                    </button>
                </div>
            </div>

            {{-- Selection Bar --}}
            <div id="quote-selection-bar" class="selection-bar" style="display: none;">
                <div class="flex items-center justify-between">
                    <span class="font-medium selection-count">0 selected</span>
                    <div class="flex items-center space-x-2">
                        <button class="btn btn-secondary btn-sm" onclick="bulkExportQuotes()">Export Selected</button>
                        <button class="btn btn-secondary btn-sm" onclick="bulkConvertQuotes()">Convert to Orders</button>
                        <button class="btn btn-danger btn-sm" onclick="bulkDeleteQuotes()">Delete</button>
                    </div>
                </div>
            </div>

            <table class="data-table" id="quotes-table" data-selectable="true">
                <thead>
                    <tr>
                        <th class="table-select-column">
                            <input type="checkbox" class="select-all" aria-label="Select all quotes">
                        </th>
                        <th>Quote</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Valid Until</th>
                        <th>Status</th>
                        <th class="table-actions-column">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-id="1">
                        <td class="table-select-cell">
                            <input type="checkbox" class="select-row" value="1" aria-label="Select quote">
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-purple-100 rounded-lg">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#QUO-2024-001</div>
                                    <div class="text-sm text-neutral-500">Manufacturing setup</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-xs font-semibold text-white rounded-full bg-gradient-to-br from-blue-500 to-blue-600">
                                    AM
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">Acme Manufacturing</div>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold text-neutral-900">R 125,670.00</td>
                        <td>
                            <div class="text-sm font-medium text-neutral-900">2024-09-20</div>
                            <div class="text-xs text-warning-600">11 days left</div>
                        </td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Quote" onclick="viewQuote(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Edit Quote" onclick="editQuote(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Convert to Order" onclick="convertQuote(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td class="table-select-cell">
                            <input type="checkbox" class="select-row" value="2" aria-label="Select quote">
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#QUO-2024-002</div>
                                    <div class="text-sm text-neutral-500">Equipment upgrade</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-xs font-semibold text-white rounded-full bg-gradient-to-br from-green-500 to-green-600">
                                    TC
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">TechCorp Solutions</div>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold text-neutral-900">R 89,320.00</td>
                        <td>
                            <div class="text-sm font-medium text-success-700">2024-10-15</div>
                            <div class="text-xs text-success-600">36 days left</div>
                        </td>
                        <td><span class="badge badge-success">Approved</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Quote" onclick="viewQuote(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Convert to Order" onclick="convertQuote(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Duplicate Quote" onclick="duplicateQuote(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- 5. Table with Search & Advanced Filtering --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">5. Table with Advanced Search & Filtering</h3>
        <div class="data-table-container">
            <div class="data-table-header">
                <h3 class="data-table-title">Invoice Management</h3>
                <div class="data-table-actions">
                    {{-- Advanced Search --}}
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               class="w-full pl-10 pr-4 form-input form-input-sm" 
                               placeholder="Search invoices, customers, amounts..." 
                               id="invoice-search">
                    </div>
                    
                    {{-- Date Range Filter --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" onclick="toggleDropdown('date-filter')">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Date Range
                        </button>
                        <div id="date-filter" class="dropdown-menu">
                            <a href="#" class="dropdown-item" data-range="today">Today</a>
                            <a href="#" class="dropdown-item" data-range="week">This Week</a>
                            <a href="#" class="dropdown-item" data-range="month">This Month</a>
                            <a href="#" class="dropdown-item" data-range="quarter">This Quarter</a>
                            <a href="#" class="dropdown-item" data-range="year">This Year</a>
                        </div>
                    </div>
                    
                    {{-- Status Filter --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" onclick="toggleDropdown('status-filter')">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                            </svg>
                            Status
                        </button>
                        <div id="status-filter" class="dropdown-menu">
                            <a href="#" class="dropdown-item" data-status="all">All Invoices</a>
                            <a href="#" class="dropdown-item" data-status="draft">Draft</a>
                            <a href="#" class="dropdown-item" data-status="sent">Sent</a>
                            <a href="#" class="dropdown-item" data-status="paid">Paid</a>
                            <a href="#" class="dropdown-item" data-status="overdue">Overdue</a>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary btn-sm" onclick="createInvoice()">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        New Invoice
                    </button>
                </div>
            </div>

            <table class="data-table" id="invoice-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th class="table-actions-column">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="paid">
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-lg">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#INV-2024-001</div>
                                    <div class="text-sm text-neutral-500">Paid on 2024-09-05</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-xs font-semibold text-white rounded-full bg-gradient-to-br from-blue-500 to-blue-600">
                                    AM
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">Acme Manufacturing</div>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold text-neutral-900">R 45,670.00</td>
                        <td>
                            <div class="text-sm font-medium text-neutral-900">2024-09-05</div>
                            <div class="text-xs text-success-600">Paid on time</div>
                        </td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Invoice" onclick="viewInvoice(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Download PDF" onclick="downloadInvoice(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Email Invoice" onclick="emailInvoice(1)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="overdue">
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-red-100 rounded-lg">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-mono font-semibold text-brand-600">#INV-2024-002</div>
                                    <div class="text-sm text-red-600">5 days overdue</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-xs font-semibold text-white rounded-full bg-gradient-to-br from-red-500 to-red-600">
                                    GE
                                </div>
                                <div>
                                    <div class="font-semibold text-neutral-900">Global Enterprises</div>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold text-neutral-900">R 78,950.00</td>
                        <td>
                            <div class="text-sm font-medium text-red-700">2024-09-01</div>
                            <div class="text-xs text-red-600">5 days overdue</div>
                        </td>
                        <td><span class="badge badge-danger">Overdue</span></td>
                        <td>
                            <div class="table-actions">
                                <button class="table-action-btn" data-tooltip="View Invoice" onclick="viewInvoice(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Send Reminder" onclick="sendReminder(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-4a7.97 7.97 0 01-5.417-2.083A8 8 0 002 8c0-.36.032-.713.093-1.058A8.001 8.001 0 0110 16.917V17z"/>
                                    </svg>
                                </button>
                                <button class="table-action-btn" data-tooltip="Mark as Paid" onclick="markPaid(2)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- 6. Compact Summary Tables --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">6. Compact Summary Tables</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            
            {{-- Sales Summary --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">Sales Summary</h4>
                </div>
                <div class="card-body">
                    <table class="table table-compact">
                        <tbody>
                            <tr>
                                <td class="font-medium text-neutral-700">Today's Sales</td>
                                <td class="font-semibold text-right text-success-600">R 45,670</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">This Week</td>
                                <td class="font-semibold text-right text-brand-600">R 289,450</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">This Month</td>
                                <td class="font-semibold text-right text-brand-600">R 1,234,890</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">This Year</td>
                                <td class="font-semibold text-right text-brand-700">R 8,567,234</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- System Status --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">System Status</h4>
                </div>
                <div class="card-body">
                    <table class="table table-compact">
                        <tbody>
                            <tr>
                                <td class="font-medium text-neutral-700">Database</td>
                                <td class="text-right">
                                    <span class="badge badge-success">Online</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">API Service</td>
                                <td class="text-right">
                                    <span class="badge badge-success">Healthy</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">File Storage</td>
                                <td class="text-right">
                                    <span class="badge badge-warning">85% Full</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium text-neutral-700">Queue Workers</td>
                                <td class="text-right">
                                    <span class="badge badge-success">2 Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. Table with Pagination --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">7. Table with Pagination</h3>
        <div class="data-table-container">
            <div class="data-table-header">
                <h3 class="data-table-title">Product Catalog</h3>
                <div class="flex items-center space-x-2 text-sm text-neutral-600">
                    <span>Show</span>
                    <select class="form-select form-select-sm" onchange="changePerPage(this.value)">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>per page</span>
                </div>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 10; $i++)
                    <tr>
                        <td class="font-mono text-sm">{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="font-medium">Product {{ $i }}</td>
                        <td>{{ ['Electronics', 'Mechanical', 'Tools', 'Safety', 'Hardware'][$i % 5] }}</td>
                        <td class="font-semibold">R {{ number_format(rand(50, 5000), 2) }}</td>
                        <td>{{ rand(0, 500) }} units</td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            {{-- Enhanced Pagination --}}
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-neutral-600">
                        Showing <strong>1-10</strong> of <strong>247</strong> products
                    </div>
                    <div class="table-pagination-controls">
                        <button class="btn btn-secondary btn-sm" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="btn btn-secondary btn-sm active">1</button>
                        <button class="btn btn-secondary btn-sm">2</button>
                        <button class="btn btn-secondary btn-sm">3</button>
                        <span class="px-2 text-neutral-400">...</span>
                        <button class="btn btn-secondary btn-sm">25</button>
                        <button class="btn btn-secondary btn-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 8. Nested/Hierarchical Table --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">8. Nested/Hierarchical Table</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Order Details with Line Items</h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table class="table nested-table">
                        <thead>
                            <tr>
                                <th>Order/Item</th>
                                <th>Customer/Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Parent Row --}}
                            <tr class="parent-row" data-order="1">
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <button class="expand-btn" onclick="toggleExpand(1)">
                                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-001</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="font-semibold text-neutral-900">Acme Manufacturing</div>
                                </td>
                                <td class="font-semibold">3</td>
                                <td>-</td>
                                <td class="font-semibold text-neutral-900">R 45,670.00</td>
                                <td>
                                    <div class="table-actions">
                                        <button class="table-action-btn" data-tooltip="View Order">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            {{-- Child Rows --}}
                            <tr class="child-row" data-parent="1" style="display: none;">
                                <td class="pl-8">
                                    <div class="text-sm text-neutral-600">PWA-001</div>
                                </td>
                                <td>
                                    <div class="text-sm text-neutral-700">Premium Widget Assembly</div>
                                </td>
                                <td>2</td>
                                <td>R 1,250.00</td>
                                <td>R 2,500.00</td>
                                <td>-</td>
                            </tr>
                            <tr class="child-row" data-parent="1" style="display: none;">
                                <td class="pl-8">
                                    <div class="text-sm text-neutral-600">ICS-024</div>
                                </td>
                                <td>
                                    <div class="text-sm text-neutral-700">Industrial Connector Set</div>
                                </td>
                                <td>5</td>
                                <td>R 890.00</td>
                                <td>R 4,450.00</td>
                                <td>-</td>
                            </tr>
                            <tr class="child-row" data-parent="1" style="display: none;">
                                <td class="pl-8">
                                    <div class="text-sm text-neutral-600">SAF-089</div>
                                </td>
                                <td>
                                    <div class="text-sm text-neutral-700">Safety Control Module</div>
                                </td>
                                <td>1</td>
                                <td>R 2,340.00</td>
                                <td>R 2,340.00</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('head')
<style>
/* Enhanced Table Styles */
.table-actions {
    display: flex;
    gap: var(--space-1);
    justify-content: center;
}

.table-action-btn {
    width: 32px;
    height: 32px;
    border: 1px solid var(--neutral-300);
    background: white;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    color: var(--neutral-600);
    text-decoration: none;
}

.table-action-btn:hover {
    background: var(--brand-50);
    border-color: var(--brand-300);
    color: var(--brand-700);
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

.selection-bar {
    padding: var(--space-4) var(--space-6);
    background: var(--brand-50);
    border-bottom: 1px solid var(--brand-200);
}

.table-select-column {
    width: 40px;
    padding: var(--space-3) var(--space-2);
}

.table-select-cell {
    padding: var(--space-3) var(--space-2);
}

.table-actions-column {
    width: 120px;
    text-align: center;
}

.table-compact td,
.table-compact th {
    padding: var(--space-2) var(--space-3);
    font-size: var(--text-sm);
}

/* Nested Table Styles */
.nested-table .parent-row {
    font-weight: 500;
}

.nested-table .child-row {
    background: var(--neutral-50);
}

.nested-table .child-row td {
    border-bottom: 1px solid var(--neutral-200);
    font-size: var(--text-sm);
}

.expand-btn {
    background: none;
    border: none;
    padding: var(--space-1);
    cursor: pointer;
    border-radius: var(--radius-sm);
    color: var(--neutral-600);
    transition: all var(--transition-fast);
}

.expand-btn:hover {
    background: var(--neutral-100);
    color: var(--brand-600);
}

.expand-btn.expanded svg {
    transform: rotate(180deg);
}

/* Sortable Headers */
.sortable {
    cursor: pointer;
    user-select: none;
    transition: background var(--transition-fast);
}

.sortable:hover {
    background: var(--neutral-100);
}

.sortable.sort-asc svg,
.sortable.sort-desc svg {
    color: var(--brand-600);
}

/* Dropdown Fix */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 200px;
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    z-index: var(--z-dropdown);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all var(--transition-fast);
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: block;
    padding: var(--space-2) var(--space-4);
    color: var(--neutral-700);
    text-decoration: none;
    font-size: var(--text-sm);
    transition: background var(--transition-fast);
}

.dropdown-item:hover {
    background: var(--neutral-50);
    color: var(--brand-600);
}

/* Dark Mode Fixes */
[data-theme="dark"] .table-container {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .data-table-container {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .data-table-header {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
    color: var(--neutral-900);
}

[data-theme="dark"] .table {
    background: var(--neutral-100);
    color: var(--neutral-900);
}

[data-theme="dark"] .table thead {
    background: var(--neutral-200);
}

[data-theme="dark"] .table th {
    color: var(--neutral-800);
    background: var(--neutral-200);
    border-bottom-color: var(--neutral-400);
}

[data-theme="dark"] .table td {
    color: var(--neutral-700);
    border-bottom-color: var(--neutral-300);
}

[data-theme="dark"] .table tbody tr:hover {
    background: var(--neutral-200);
}

[data-theme="dark"] .table tbody tr.selected {
    background: var(--brand-950);
}

[data-theme="dark"] .table-action-btn {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
    color: var(--neutral-700);
}

[data-theme="dark"] .table-action-btn:hover {
    background: var(--brand-950);
    border-color: var(--brand-700);
    color: var(--brand-300);
}

[data-theme="dark"] .selection-bar {
    background: var(--brand-950);
    border-color: var(--brand-700);
    color: var(--brand-300);
}

[data-theme="dark"] .sortable:hover {
    background: var(--neutral-300);
}

[data-theme="dark"] .nested-table .child-row {
    background: var(--neutral-200);
}

[data-theme="dark"] .dropdown-menu {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .dropdown-item {
    color: var(--neutral-700);
}

[data-theme="dark"] .dropdown-item:hover {
    background: var(--neutral-200);
    color: var(--brand-600);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .data-table-header {
        flex-direction: column;
        gap: var(--space-3);
        align-items: stretch;
    }
    
    .data-table-actions {
        flex-direction: column;
        gap: var(--space-2);
    }
    
    .table-actions {
        gap: var(--space-1);
    }
    
    .table-action-btn {
        width: 28px;
        height: 28px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Dropdown functionality
function toggleDropdown(dropdownId) {
    // Close all other dropdowns
    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
        if (menu.id !== dropdownId) {
            menu.classList.remove('show');
        }
    });
    
    // Toggle target dropdown
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
        dropdown.classList.toggle('show');
    }
}

// Close dropdowns when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });
    }
});

// Table expansion functionality
function toggleExpand(orderId) {
    const button = document.querySelector(`[data-order="${orderId}"] .expand-btn`);
    const childRows = document.querySelectorAll(`[data-parent="${orderId}"]`);
    
    button.classList.toggle('expanded');
    
    childRows.forEach(row => {
        if (row.style.display === 'none') {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

// Search functionality
function setupSearch(inputId, tableId) {
    const searchInput = document.getElementById(inputId);
    if (!searchInput) return;
    
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll(`#${tableId} tbody tr`);
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
}

// Filter functionality
function setupFilters() {
    document.addEventListener('click', (e) => {
        if (e.target.matches('[data-filter]')) {
            const filter = e.target.dataset.filter;
            const rows = document.querySelectorAll('#orders-table tbody tr');
            
            rows.forEach(row => {
                if (filter === 'all' || row.dataset.status === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        if (e.target.matches('[data-status]')) {
            const status = e.target.dataset.status;
            const rows = document.querySelectorAll('#invoice-table tbody tr');
            
            rows.forEach(row => {
                if (status === 'all' || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    });
}

// Selection functionality
function updateSelectionBar(tableId, barId) {
    const selectedCount = document.querySelectorAll(`#${tableId} .select-row:checked`).length;
    const selectionBar = document.getElementById(barId);
    const countElement = selectionBar?.querySelector('.selection-count');
    
    if (selectionBar) {
        selectionBar.style.display = selectedCount > 0 ? 'block' : 'none';
    }
    
    if (countElement) {
        countElement.textContent = `${selectedCount} selected`;
    }
}

// Column sorting
function setupSorting() {
    document.addEventListener('click', (e) => {
        if (e.target.closest('.sortable')) {
            const header = e.target.closest('.sortable');
            
            // Remove sort classes from other columns
            header.parentElement.querySelectorAll('.sortable').forEach(th => {
                if (th !== header) {
                    th.classList.remove('sort-asc', 'sort-desc');
                }
            });
            
            // Toggle sort direction
            if (header.classList.contains('sort-asc')) {
                header.classList.remove('sort-asc');
                header.classList.add('sort-desc');
            } else {
                header.classList.remove('sort-desc');
                header.classList.add('sort-asc');
            }
            
            if (window.ManuCore) {
                const column = header.dataset.sort;
                const direction = header.classList.contains('sort-asc') ? 'ascending' : 'descending';
                ManuCore.showToast(`Sorting by ${column} (${direction})`, 'info');
            }
        }
    });
}

// Initialize everything
document.addEventListener('DOMContentLoaded', function() {
    // Setup search for different tables
    setupSearch('orders-search', 'orders-table');
    setupSearch('invoice-search', 'invoice-table');
    
    // Setup filters
    setupFilters();
    
    // Setup sorting
    setupSorting();
    
    // Selection handling for quotes table
    document.addEventListener('change', (e) => {
        if (e.target.matches('#quotes-table .select-row, #quotes-table .select-all')) {
            updateSelectionBar('quotes-table', 'quote-selection-bar');
            
            if (e.target.matches('.select-all')) {
                const checked = e.target.checked;
                document.querySelectorAll('#quotes-table .select-row').forEach(checkbox => {
                    checkbox.checked = checked;
                    checkbox.closest('tr').classList.toggle('selected', checked);
                });
            } else {
                const row = e.target.closest('tr');
                row.classList.toggle('selected', e.target.checked);
            }
        }
    });
    
    if (window.ManuCore) {
        ManuCore.initTooltips();
    }
    
    console.log('Enhanced Table Components loaded with 8 table types');
});

// Action functions (stubs for demo)
function viewOrder(id) { if (window.ManuCore) ManuCore.showToast(`Viewing order ${id}`, 'info'); }
function editOrder(id) { if (window.ManuCore) ManuCore.showToast(`Editing order ${id}`, 'info'); }
function printInvoice(id) { if (window.ManuCore) ManuCore.showToast(`Printing invoice ${id}`, 'info'); }
function createOrder() { if (window.ManuCore) ManuCore.showToast('Creating new order', 'info'); }
function viewQuote(id) { if (window.ManuCore) ManuCore.showToast(`Viewing quote ${id}`, 'info'); }
function editQuote(id) { if (window.ManuCore) ManuCore.showToast(`Editing quote ${id}`, 'info'); }
function convertQuote(id) { if (window.ManuCore) ManuCore.showToast(`Converting quote ${id} to order`, 'info'); }
function createQuote() { if (window.ManuCore) ManuCore.showToast('Creating new quote', 'info'); }
function exportQuotes() { if (window.ManuCore) ManuCore.showToast('Exporting quotes', 'info'); }
function viewInvoice(id) { if (window.ManuCore) ManuCore.showToast(`Viewing invoice ${id}`, 'info'); }
function downloadInvoice(id) { if (window.ManuCore) ManuCore.showToast(`Downloading invoice ${id}`, 'info'); }
function emailInvoice(id) { if (window.ManuCore) ManuCore.showToast(`Emailing invoice ${id}`, 'info'); }
function sendReminder(id) { if (window.ManuCore) ManuCore.showToast(`Sending reminder for invoice ${id}`, 'info'); }
function markPaid(id) { if (window.ManuCore) ManuCore.showToast(`Marking invoice ${id} as paid`, 'success'); }
function createInvoice() { if (window.ManuCore) ManuCore.showToast('Creating new invoice', 'info'); }
function changePerPage(value) { if (window.ManuCore) ManuCore.showToast(`Showing ${value} items per page`, 'info'); }
function copyTableCode() { if (window.ManuCore) ManuCore.showToast('Table code examples copied!', 'success'); }
function reorder(id) { if (window.ManuCore) ManuCore.showToast(`Creating reorder from ${id}`, 'info'); }
function duplicateQuote(id) { if (window.ManuCore) ManuCore.showToast(`Duplicating quote ${id}`, 'info'); }
function bulkExportQuotes() { if (window.ManuCore) ManuCore.showToast('Bulk exporting selected quotes', 'info'); }
function bulkConvertQuotes() { if (window.ManuCore) ManuCore.showToast('Converting selected quotes to orders', 'info'); }
function bulkDeleteQuotes() { if (window.ManuCore) ManuCore.showToast('Deleting selected quotes', 'warning'); }
</script>
@endpush