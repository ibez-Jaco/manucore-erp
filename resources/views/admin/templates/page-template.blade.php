@extends('layouts.panel')

@section('title', 'Complex Page Template - ManuCore ERP')

@section('header', 'Customer Profile Management')
@section('subheader', 'Comprehensive customer management with tabs, modals, and advanced workflows')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="exportCustomerData()">
        📤 Export Data
    </button>
    <button class="btn btn-warning" onclick="archiveCustomer()">
        📁 Archive
    </button>
    <button class="btn btn-primary" onclick="saveAllChanges()">
        💾 Save Changes
    </button>
@endsection

@section('content')
<div class="space-y-6">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">🏗️</div>
        <div class="alert-content">
            <div class="alert-title">Complex Page Template</div>
            <div class="alert-message">Multi-section page with tabs, modals, data tables, charts, and advanced form workflows.</div>
        </div>
    </div>

    {{-- Customer Header Card --}}
    <div class="card">
        <div class="card-body">
            <div class="gap-6 d-flex align-center">
                <div class="justify-center d-flex align-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); border-radius: var(--radius-2xl); color: white; font-size: 2rem;">
                    🏢
                </div>
                <div class="flex-1">
                    <div class="justify-between d-flex align-start">
                        <div>
                            <h2 class="mb-1 text-2xl font-bold text-neutral-900">Acme Manufacturing Ltd.</h2>
                            <p class="mb-2 text-neutral-600">Premium customer since 2019 • ID: CUST-2019-001</p>
                            <div class="flex-wrap gap-2 d-flex">
                                <span class="badge badge-success">Active</span>
                                <span class="badge badge-primary">Premium</span>
                                <span class="badge badge-neutral">Manufacturing</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-brand-600">R 2.4M</div>
                            <div class="text-sm text-neutral-500">Lifetime Value</div>
                            <div class="mt-1 text-xs text-success-600">+15.3% this year</div>
                        </div>
                    </div>
                    
                    {{-- Quick Stats --}}
                    <div class="grid grid-cols-4 gap-4 pt-4 mt-4 border-t border-neutral-200">
                        <div class="text-center">
                            <div class="text-lg font-bold text-neutral-900">127</div>
                            <div class="text-xs text-neutral-500">Total Orders</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-neutral-900">R 458K</div>
                            <div class="text-xs text-neutral-500">This Year</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-neutral-900">94%</div>
                            <div class="text-xs text-neutral-500">On-Time Pay</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-neutral-900">5/5</div>
                            <div class="text-xs text-neutral-500">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content with Tabs --}}
    <div class="card">
        <div class="card-body">
            <div class="nav-tabs">
                <a href="#" class="nav-tab active" data-tab-target="tab-overview">Overview</a>
                <a href="#" class="nav-tab" data-tab-target="tab-orders">Orders</a>
                <a href="#" class="nav-tab" data-tab-target="tab-contacts">Contacts</a>
                <a href="#" class="nav-tab" data-tab-target="tab-documents">Documents</a>
                <a href="#" class="nav-tab" data-tab-target="tab-financials">Financials</a>
                <a href="#" class="nav-tab" data-tab-target="tab-activity">Activity</a>
                <a href="#" class="nav-tab" data-tab-target="tab-settings">Settings</a>
            </div>

            {{-- Overview Tab --}}
            <div id="tab-overview" class="tab-panel" style="display: block;">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    
                    {{-- Customer Information --}}
                    <div class="lg:col-span-2">
                        <div class="space-y-6">
                            {{-- Basic Details --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Customer Details</h4>
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-input" value="Acme Manufacturing Ltd." readonly>
                                    </div>
                                    <div>
                                        <label class="form-label">Registration Number</label>
                                        <input type="text" class="form-input" value="2019/123456/07" readonly>
                                    </div>
                                    <div>
                                        <label class="form-label">VAT Number</label>
                                        <input type="text" class="form-input" value="4123456789" readonly>
                                    </div>
                                    <div>
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-input" value="Manufacturing" readonly>
                                    </div>
                                </div>
                            </div>

                            {{-- Address Information --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Address Information</h4>
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <h5 class="mb-2 font-medium text-neutral-700">Physical Address</h5>
                                        <div class="p-3 text-sm rounded-lg bg-neutral-50">
                                            123 Industrial Drive<br>
                                            Johannesburg, 2001<br>
                                            Gauteng, South Africa
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-2 font-medium text-neutral-700">Billing Address</h5>
                                        <div class="p-3 text-sm rounded-lg bg-neutral-50">
                                            Same as physical address
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Recent Activity Summary --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Recent Activity</h4>
                                <div class="space-y-3">
                                    <div class="gap-3 p-3 rounded-lg d-flex bg-neutral-50">
                                        <div class="justify-center d-flex align-center" style="width: 32px; height: 32px; background: var(--success-100); color: var(--success-600); border-radius: var(--radius-full);">
                                            ✅
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium">Order #ORD-2024-127 completed</div>
                                            <div class="text-xs text-neutral-500">2 hours ago • R 45,670</div>
                                        </div>
                                    </div>
                                    <div class="gap-3 p-3 rounded-lg d-flex bg-neutral-50">
                                        <div class="justify-center d-flex align-center" style="width: 32px; height: 32px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-full);">
                                            💰
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium">Payment received</div>
                                            <div class="text-xs text-neutral-500">1 day ago • R 78,950</div>
                                        </div>
                                    </div>
                                    <div class="gap-3 p-3 rounded-lg d-flex bg-neutral-50">
                                        <div class="justify-center d-flex align-center" style="width: 32px; height: 32px; background: var(--warning-100); color: var(--warning-600); border-radius: var(--radius-full);">
                                            📞
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm font-medium">Support call logged</div>
                                            <div class="text-xs text-neutral-500">3 days ago • John Smith</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div>
                        <div class="space-y-6">
                            {{-- Quick Actions --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Quick Actions</h4>
                                <div class="space-y-2">
                                    <button class="btn btn-primary w-100" onclick="createOrder()">
                                        📋 Create Order
                                    </button>
                                    <button class="btn btn-secondary w-100" onclick="scheduleCall()">
                                        📞 Schedule Call
                                    </button>
                                    <button class="btn btn-secondary w-100" onclick="sendEmail()">
                                        ✉️ Send Email
                                    </button>
                                    <button class="btn btn-secondary w-100" onclick="generateQuote()">
                                        📊 Generate Quote
                                    </button>
                                </div>
                            </div>

                            {{-- Key Metrics --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Key Metrics</h4>
                                <div class="space-y-3">
                                    <div class="justify-between d-flex">
                                        <span class="text-sm text-neutral-600">Credit Limit:</span>
                                        <span class="text-sm font-medium">R 500,000</span>
                                    </div>
                                    <div class="justify-between d-flex">
                                        <span class="text-sm text-neutral-600">Available Credit:</span>
                                        <span class="text-sm font-medium text-success-600">R 455,320</span>
                                    </div>
                                    <div class="justify-between d-flex">
                                        <span class="text-sm text-neutral-600">Payment Terms:</span>
                                        <span class="text-sm font-medium">30 Days</span>
                                    </div>
                                    <div class="justify-between d-flex">
                                        <span class="text-sm text-neutral-600">Last Order:</span>
                                        <span class="text-sm font-medium">2 days ago</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Performance Chart --}}
                            <div>
                                <h4 class="mb-4 font-semibold text-neutral-900">Order Trends</h4>
                                <div style="height: 200px; background: linear-gradient(135deg, var(--brand-50), var(--brand-100)); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; position: relative;">
                                    {{-- Mini Chart Simulation --}}
                                    <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; display: flex; align-items: end; height: 60%;">
                                        <div style="flex: 1; height: 40%; background: var(--brand-400); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                        <div style="flex: 1; height: 60%; background: var(--brand-500); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                        <div style="flex: 1; height: 35%; background: var(--brand-400); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                        <div style="flex: 1; height: 75%; background: var(--brand-600); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                        <div style="flex: 1; height: 55%; background: var(--brand-500); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                        <div style="flex: 1; height: 85%; background: var(--brand-700); margin: 0 1px; border-radius: 2px 2px 0 0;"></div>
                                    </div>
                                    <div class="text-center" style="color: var(--brand-700); font-weight: 600; z-index: 1;">
                                        📈 6-Month Trend
                                        <div class="mt-1 text-xs opacity-75">+15% growth</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Orders Tab --}}
            <div id="tab-orders" class="tab-panel" style="display: none;">
                <div class="space-y-4">
                    <div class="justify-between d-flex align-center">
                        <h4 class="font-semibold text-neutral-900">Customer Orders</h4>
                        <button class="btn btn-primary" onclick="createOrder()">
                            ➕ New Order
                        </button>
                    </div>
                    
                    <div class="data-table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Delivery</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="font-mono font-semibold text-brand-600">#ORD-2024-127</span></td>
                                    <td>2024-09-07</td>
                                    <td><span class="badge badge-success">Delivered</span></td>
                                    <td class="font-semibold">R 45,670.00</td>
                                    <td>2024-09-09</td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="table-action-btn" onclick="viewOrder(127)">👁️</button>
                                            <button class="table-action-btn" onclick="printInvoice(127)">🖨️</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="font-mono font-semibold text-brand-600">#ORD-2024-126</span></td>
                                    <td>2024-09-04</td>
                                    <td><span class="badge badge-primary">Shipped</span></td>
                                    <td class="font-semibold">R 78,950.00</td>
                                    <td>2024-09-10</td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="table-action-btn" onclick="viewOrder(126)">👁️</button>
                                            <button class="table-action-btn" onclick="trackShipment(126)">📦</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="font-mono font-semibold text-brand-600">#ORD-2024-125</span></td>
                                    <td>2024-09-01</td>
                                    <td><span class="badge badge-warning">Processing</span></td>
                                    <td class="font-semibold">R 123,440.00</td>
                                    <td>2024-09-12</td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="table-action-btn" onclick="viewOrder(125)">👁️</button>
                                            <button class="table-action-btn" onclick="editOrder(125)">✏️</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Contacts Tab --}}
            <div id="tab-contacts" class="tab-panel" style="display: none;">
                <div class="space-y-4">
                    <div class="justify-between d-flex align-center">
                        <h4 class="font-semibold text-neutral-900">Contact Persons</h4>
                        <button class="btn btn-primary" data-modal-open="add-contact-modal">
                            ➕ Add Contact
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="gap-4 d-flex align-center">
                                    <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); border-radius: var(--radius-full); color: white; font-weight: 600;">
                                        JS
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-neutral-900">John Smith</h5>
                                        <p class="text-sm text-neutral-600">Procurement Manager</p>
                                        <div class="gap-4 mt-2 text-xs d-flex text-neutral-500">
                                            <span>📧 john.smith@acme.com</span>
                                            <span>📞 +27 11 123 4567</span>
                                        </div>
                                    </div>
                                    <div class="gap-1 d-flex">
                                        <button class="btn btn-ghost btn-sm" onclick="contactPerson('john')">📞</button>
                                        <button class="btn btn-ghost btn-sm" onclick="emailPerson('john')">✉️</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="gap-4 d-flex align-center">
                                    <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--success-600), var(--success-700)); border-radius: var(--radius-full); color: white; font-weight: 600;">
                                        MD
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-neutral-900">Mary Davis</h5>
                                        <p class="text-sm text-neutral-600">Finance Director</p>
                                        <div class="gap-4 mt-2 text-xs d-flex text-neutral-500">
                                            <span>📧 mary.davis@acme.com</span>
                                            <span>📞 +27 11 123 4568</span>
                                        </div>
                                    </div>
                                    <div class="gap-1 d-flex">
                                        <button class="btn btn-ghost btn-sm" onclick="contactPerson('mary')">📞</button>
                                        <button class="btn btn-ghost btn-sm" onclick="emailPerson('mary')">✉️</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Documents Tab --}}
            <div id="tab-documents" class="tab-panel" style="display: none;">
                <div class="space-y-4">
                    <div class="justify-between d-flex align-center">
                        <h4 class="font-semibold text-neutral-900">Documents & Files</h4>
                        <button class="btn btn-primary" data-modal-open="upload-document-modal">
                            📁 Upload Document
                        </button>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="gap-4 p-4 rounded-lg d-flex align-center bg-neutral-50">
                            <div class="text-2xl">📄</div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Company Registration Certificate</div>
                                <div class="text-sm text-neutral-500">PDF • 2.4 MB • Uploaded 2 months ago</div>
                            </div>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm">👁️ View</button>
                                <button class="btn btn-secondary btn-sm">📥 Download</button>
                            </div>
                        </div>
                        
                        <div class="gap-4 p-4 rounded-lg d-flex align-center bg-neutral-50">
                            <div class="text-2xl">📊</div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Financial Statements 2024</div>
                                <div class="text-sm text-neutral-500">Excel • 1.8 MB • Uploaded 3 weeks ago</div>
                            </div>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm">👁️ View</button>
                                <button class="btn btn-secondary btn-sm">📥 Download</button>
                            </div>
                        </div>
                        
                        <div class="gap-4 p-4 rounded-lg d-flex align-center bg-neutral-50">
                            <div class="text-2xl">📋</div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Service Agreement Contract</div>
                                <div class="text-sm text-neutral-500">PDF • 890 KB • Uploaded 1 week ago</div>
                            </div>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm">👁️ View</button>
                                <button class="btn btn-secondary btn-sm">📥 Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Financials Tab --}}
            <div id="tab-financials" class="tab-panel" style="display: none;">
                <div class="space-y-6">
                    {{-- Financial Summary --}}
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-2xl font-bold text-brand-600">R 2.4M</div>
                                <div class="text-sm text-neutral-500">Lifetime Value</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-2xl font-bold text-success-600">R 458K</div>
                                <div class="text-sm text-neutral-500">This Year</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-2xl font-bold text-warning-600">R 44.7K</div>
                                <div class="text-sm text-neutral-500">Outstanding</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-2xl font-bold text-neutral-600">R 455K</div>
                                <div class="text-sm text-neutral-500">Available Credit</div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment History --}}
                    <div>
                        <h4 class="mb-4 font-semibold text-neutral-900">Recent Payments</h4>
                        <div class="data-table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice #</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2024-09-08</td>
                                        <td><span class="font-mono">#INV-2024-1127</span></td>
                                        <td class="font-semibold">R 78,950.00</td>
                                        <td>Bank Transfer</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2024-08-25</td>
                                        <td><span class="font-mono">#INV-2024-1098</span></td>
                                        <td class="font-semibold">R 45,670.00</td>
                                        <td>Bank Transfer</td>
                                        <td><span class="badge badge-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>2024-08-15</td>
                                        <td><span class="font-mono">#INV-2024-1089</span></td>
                                        <td class="font-semibold">R 123,440.00</td>
                                        <td>EFT</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Activity Tab --}}
            <div id="tab-activity" class="tab-panel" style="display: none;">
                <div class="space-y-4">
                    <h4 class="font-semibold text-neutral-900">Activity Timeline</h4>
                    
                    <div class="space-y-4">
                        <div class="gap-4 d-flex">
                            <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--success-100); color: var(--success-600); border-radius: var(--radius-full);">
                                ✅
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Order #ORD-2024-127 completed</div>
                                <div class="text-sm text-neutral-600">Customer received all items successfully. Payment processed.</div>
                                <div class="mt-1 text-xs text-neutral-500">2 hours ago by System</div>
                            </div>
                        </div>
                        
                        <div class="gap-4 d-flex">
                            <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-full);">
                                💰
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Payment received</div>
                                <div class="text-sm text-neutral-600">R 78,950.00 payment for Invoice #INV-2024-1127</div>
                                <div class="mt-1 text-xs text-neutral-500">1 day ago by Bank Transfer</div>
                            </div>
                        </div>
                        
                        <div class="gap-4 d-flex">
                            <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--warning-100); color: var(--warning-600); border-radius: var(--radius-full);">
                                📞
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Support call logged</div>
                                <div class="text-sm text-neutral-600">John Smith called regarding delivery schedule for upcoming order.</div>
                                <div class="mt-1 text-xs text-neutral-500">3 days ago by Sarah Johnson</div>
                            </div>
                        </div>
                        
                        <div class="gap-4 d-flex">
                            <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-full);">
                                📧
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-neutral-900">Email campaign sent</div>
                                <div class="text-sm text-neutral-600">Monthly newsletter with new product announcements.</div>
                                <div class="mt-1 text-xs text-neutral-500">1 week ago by Marketing System</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Settings Tab --}}
            <div id="tab-settings" class="tab-panel" style="display: none;">
                <div class="space-y-6">
                    <h4 class="font-semibold text-neutral-900">Customer Settings</h4>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <div>
                            <h5 class="mb-3 font-medium text-neutral-700">Preferences</h5>
                            <div class="space-y-3">
                                <label class="gap-3 d-flex align-center">
                                    <input type="checkbox" checked>
                                    <span class="text-sm">Email notifications</span>
                                </label>
                                <label class="gap-3 d-flex align-center">
                                    <input type="checkbox">
                                    <span class="text-sm">SMS notifications</span>
                                </label>
                                <label class="gap-3 d-flex align-center">
                                    <input type="checkbox" checked>
                                    <span class="text-sm">Marketing emails</span>
                                </label>
                                <label class="gap-3 d-flex align-center">
                                    <input type="checkbox" checked>
                                    <span class="text-sm">Monthly statements</span>
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="mb-3 font-medium text-neutral-700">Account Status</h5>
                            <div class="space-y-3">
                                <div class="justify-between d-flex">
                                    <span class="text-sm">Status:</span>
                                    <span class="badge badge-success">Active</span>
                                </div>
                                <div class="justify-between d-flex">
                                    <span class="text-sm">Tier:</span>
                                    <span class="badge badge-primary">Premium</span>
                                </div>
                                <div class="justify-between d-flex">
                                    <span class="text-sm">Risk Level:</span>
                                    <span class="badge badge-success">Low</span>
                                </div>
                                <div class="justify-between d-flex">
                                    <span class="text-sm">Credit Check:</span>
                                    <span class="text-sm text-neutral-600">Valid until Dec 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-neutral-200">
                        <div class="gap-3 d-flex">
                            <button class="btn btn-danger" onclick="suspendAccount()">
                                ⏸️ Suspend Account
                            </button>
                            <button class="btn btn-warning" onclick="flagForReview()">
                                🚩 Flag for Review
                            </button>
                            <button class="btn btn-secondary" onclick="exportCustomerData()">
                                📤 Export Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Add Contact Modal --}}
<div class="modal-backdrop" id="add-contact-modal">
    <div class="modal modal-lg">
        <div class="modal-header">
            <h3 class="modal-title">Add New Contact</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <form id="add-contact-form">
                @csrf
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" class="form-input" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Title</label>
                        <input type="text" class="form-input" name="job_title">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-input" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-input" name="phone">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <select class="form-select" name="department">
                            <option value="">Select department</option>
                            <option value="procurement">Procurement</option>
                            <option value="finance">Finance</option>
                            <option value="operations">Operations</option>
                            <option value="management">Management</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Primary Contact</label>
                        <label class="gap-2 d-flex align-center">
                            <input type="checkbox" name="is_primary">
                            <span class="text-sm">This is the primary contact</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Cancel</button>
            <button class="btn btn-primary" onclick="addContact()">Add Contact</button>
        </div>
    </div>
</div>

{{-- Upload Document Modal --}}
<div class="modal-backdrop" id="upload-document-modal">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Upload Document</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <form id="upload-document-form">
                @csrf
                <div class="form-group">
                    <label class="form-label">Document Title *</label>
                    <input type="text" class="form-input" name="title" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category">
                        <option value="">Select category</option>
                        <option value="legal">Legal Documents</option>
                        <option value="financial">Financial</option>
                        <option value="contracts">Contracts</option>
                        <option value="certificates">Certificates</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">File *</label>
                    <input type="file" class="form-input" name="document" required accept=".pdf,.doc,.docx,.xls,.xlsx">
                    <div class="form-help">Supported formats: PDF, DOC, XLS (Max 10MB)</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" name="description" rows="3"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Cancel</button>
            <button class="btn btn-primary" onclick="uploadDocument()">Upload Document</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Complex page interaction functions

function saveAllChanges() {
    if (window.ManuCore) {
        ManuCore.showLoading('Saving Changes...', 'Please wait while we save all customer information');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('All changes saved successfully!', 'success');
        }, 2000);
    }
}

function exportCustomerData() {
    if (window.Swal) {
        Swal.fire({
            title: 'Export Customer Data',
            html: `
                <div style="margin: 20px 0;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Export Format:</label>
                    <select id="export-format" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 15px;">
                        <option value="pdf">PDF Report</option>
                        <option value="excel">Excel Spreadsheet</option>
                        <option value="csv">CSV Data</option>
                    </select>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Include:</label>
                    <div style="text-align: left;">
                        <label style="display: block; margin-bottom: 5px;"><input type="checkbox" checked> Basic Information</label>
                        <label style="display: block; margin-bottom: 5px;"><input type="checkbox" checked> Order History</label>
                        <label style="display: block; margin-bottom: 5px;"><input type="checkbox"> Payment History</label>
                        <label style="display: block; margin-bottom: 5px;"><input type="checkbox"> Contact Details</label>
                        <label style="display: block; margin-bottom: 5px;"><input type="checkbox"> Activity Log</label>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: 'var(--brand-600)',
            confirmButtonText: 'Export Data'
        }).then((result) => {
            if (result.isConfirmed) {
                if (window.ManuCore) {
                    ManuCore.showToast('Customer data export started', 'info');
                }
            }
        });
    }
}

function archiveCustomer() {
    if (window.ManuCore) {
        ManuCore.confirmDelete('Archive Customer?', 'This customer will be moved to the archive. You can restore them later.').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast('Customer archived successfully', 'success');
            }
        });
    }
}

// Quick Actions
function createOrder() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening new order form for Acme Manufacturing...', 'info');
    }
}

function scheduleCall() {
    if (window.Swal) {
        Swal.fire({
            title: 'Schedule Call',
            html: `
                <div style="margin: 20px 0; text-align: left;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Contact Person:</label>
                    <select style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 15px;">
                        <option value="john">John Smith - Procurement Manager</option>
                        <option value="mary">Mary Davis - Finance Director</option>
                    </select>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Date & Time:</label>
                    <input type="datetime-local" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Purpose:</label>
                    <textarea style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px;" rows="3" placeholder="Call purpose and agenda"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: 'var(--brand-600)',
            confirmButtonText: 'Schedule Call'
        }).then((result) => {
            if (result.isConfirmed) {
                if (window.ManuCore) {
                    ManuCore.showToast('Call scheduled successfully', 'success');
                }
            }
        });
    }
}

function sendEmail() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening email composer...', 'info');
    }
}

function generateQuote() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening quote generator...', 'info');
    }
}

// Contact actions
function contactPerson(person) {
    if (window.ManuCore) {
        ManuCore.showToast(`Initiating call to ${person}...`, 'info');
    }
}

function emailPerson(person) {
    if (window.ManuCore) {
        ManuCore.showToast(`Opening email composer for ${person}...`, 'info');
    }
}

function addContact() {
    const form = document.getElementById('add-contact-form');
    const formData = new FormData(form);
    
    if (!formData.get('full_name') || !formData.get('email')) {
        if (window.ManuCore) {
            ManuCore.showToast('Please fill in all required fields', 'error');
        }
        return;
    }
    
    if (window.ManuCore) {
        ManuCore.showLoading('Adding Contact...', 'Please wait while we add the new contact');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('Contact added successfully!', 'success');
            ManuCore.closeModal('add-contact-modal');
            form.reset();
        }, 1500);
    }
}

function uploadDocument() {
    const form = document.getElementById('upload-document-form');
    const formData = new FormData(form);
    
    if (!formData.get('title') || !formData.get('document')) {
        if (window.ManuCore) {
            ManuCore.showToast('Please fill in all required fields', 'error');
        }
        return;
    }
    
    if (window.ManuCore) {
        ManuCore.showLoading('Uploading Document...', 'Please wait while we upload your document');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('Document uploaded successfully!', 'success');
            ManuCore.closeModal('upload-document-modal');
            form.reset();
        }, 2500);
    }
}

// Settings actions
function suspendAccount() {
    if (window.ManuCore) {
        ManuCore.confirmDelete('Suspend Account?', 'This customer account will be temporarily suspended.').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast('Account suspended', 'warning');
            }
        });
    }
}

function flagForReview() {
    if (window.ManuCore) {
        ManuCore.showToast('Customer flagged for review', 'warning');
    }
}

// Order actions
function viewOrder(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Opening order #${id}...`, 'info');
    }
}

function editOrder(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Editing order #${id}...`, 'info');
    }
}

function printInvoice(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Printing invoice for order #${id}...`, 'info');
    }
}

function trackShipment(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Opening shipment tracking for order #${id}...`, 'info');
    }
}

// Initialize complex page functionality
document.addEventListener('DOMContentLoaded', function() {
    if (window.ManuCore) {
        ManuCore.initTabs();
        ManuCore.initTooltips();
        ManuCore.initDataTables();
    }
    
    console.log('🏗️ Complex Page Template loaded with full functionality');
});
</script>
@endpush