@extends('layouts.panel')

@section('title', 'Misc Components - ManuCore ERP')

@section('header', 'ERP/CRM Misc Component Library')
@section('subheader', 'Essential UI components for modals, alerts, navigation, and interactive elements')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-primary" onclick="exportMiscLibrary()">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
            </div>
            <h2 class="hero-title">ERP/CRM Misc Components</h2>
            <p class="hero-description">Essential UI components for modals, alerts, navigation, and interactive elements with comprehensive patterns for professional ERP applications and seamless user experiences.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">14</div>
                    <div class="stat-label">Component Types</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">35+</div>
                    <div class="stat-label">UI Elements</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Interactive Patterns</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Theme Variants</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal System --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon modals">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Modal System</h3>
                    <p class="showcase-subtitle">Overlay dialogs for confirmations, forms, and detailed content</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('modals')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="modal-demo-grid">
                <div class="modal-demo-section">
                    <h4 class="modal-demo-title">Confirmation Modal</h4>
                    <div class="modal-preview">
                        <button class="btn btn-danger" onclick="showModal('confirm-delete')">Delete Customer</button>
                        <button class="btn btn-primary" onclick="showModal('confirm-action')">Process Order</button>
                    </div>
                </div>

                <div class="modal-demo-section">
                    <h4 class="modal-demo-title">Form Modal</h4>
                    <div class="modal-preview">
                        <button class="btn btn-secondary" onclick="showModal('add-customer')">Add Customer</button>
                        <button class="btn btn-success" onclick="showModal('quick-quote')">Quick Quote</button>
                    </div>
                </div>

                <div class="modal-demo-section">
                    <h4 class="modal-demo-title">Detail Modal</h4>
                    <div class="modal-preview">
                        <button class="btn btn-ghost" onclick="showModal('customer-details')">View Customer</button>
                        <button class="btn btn-ghost" onclick="showModal('order-details')">View Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert System --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon alerts">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Alert & Notification System</h3>
                    <p class="showcase-subtitle">Toast messages, banners, and system notifications</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('alerts')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="alert-demo-container">
                {{-- Toast Notifications --}}
                <div class="alert-demo-section">
                    <h4 class="alert-demo-title">Toast Notifications</h4>
                    <div class="toast-demo-buttons">
                        <button class="btn btn-success btn-sm" onclick="showToast('success', 'Customer created successfully!')">Success Toast</button>
                        <button class="btn btn-danger btn-sm" onclick="showToast('error', 'Failed to delete customer')">Error Toast</button>
                        <button class="btn btn-warning btn-sm" onclick="showToast('warning', 'Low stock alert for Widget Assembly')">Warning Toast</button>
                        <button class="btn btn-secondary btn-sm" onclick="showToast('info', 'System maintenance scheduled for tonight')">Info Toast</button>
                    </div>
                </div>

                {{-- Banner Alerts --}}
                <div class="alert-demo-section">
                    <h4 class="alert-demo-title">Banner Alerts</h4>
                    <div class="alert-banners">
                        <div class="alert alert-success">
                            <div class="alert-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="alert-content">
                                <div class="alert-title">Backup Completed</div>
                                <div class="alert-message">Daily system backup completed successfully at 02:00 AM.</div>
                            </div>
                            <button class="alert-close" onclick="closeAlert(this)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="alert alert-warning">
                            <div class="alert-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div class="alert-content">
                                <div class="alert-title">Inventory Alert</div>
                                <div class="alert-message">23 items are running low on stock and need restocking.</div>
                            </div>
                            <div class="alert-actions">
                                <button class="btn btn-warning btn-sm">View Items</button>
                                <button class="btn btn-ghost btn-sm">Remind Later</button>
                            </div>
                        </div>

                        <div class="alert alert-primary">
                            <div class="alert-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="alert-content">
                                <div class="alert-title">System Update Available</div>
                                <div class="alert-message">ManuCore ERP v2.1.3 is available with new features and security improvements.</div>
                            </div>
                            <div class="alert-actions">
                                <button class="btn btn-primary btn-sm">Update Now</button>
                                <button class="btn btn-ghost btn-sm">View Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Badge & Label System --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon badges">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Badge & Label System</h3>
                    <p class="showcase-subtitle">Status indicators, counts, and priority labels</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('badges')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="badge-demo-container">
                <div class="badge-demo-section">
                    <h4 class="badge-demo-title">Status Badges</h4>
                    <div class="badge-group">
                        <span class="badge badge-success">Active</span>
                        <span class="badge badge-warning">Pending</span>
                        <span class="badge badge-danger">Suspended</span>
                        <span class="badge badge-neutral">Draft</span>
                        <span class="badge badge-primary">In Progress</span>
                    </div>
                </div>

                <div class="badge-demo-section">
                    <h4 class="badge-demo-title">Priority Labels</h4>
                    <div class="badge-group">
                        <span class="badge badge-danger badge-lg">🔥 Critical</span>
                        <span class="badge badge-warning badge-lg">⚡ High</span>
                        <span class="badge badge-primary badge-lg">📋 Medium</span>
                        <span class="badge badge-neutral badge-lg">📝 Low</span>
                    </div>
                </div>

                <div class="badge-demo-section">
                    <h4 class="badge-demo-title">Count Badges</h4>
                    <div class="count-badge-examples">
                        <div class="nav-item">
                            <span>Messages</span>
                            <span class="badge badge-danger badge-sm">12</span>
                        </div>
                        <div class="nav-item">
                            <span>Notifications</span>
                            <span class="badge badge-warning badge-sm">5</span>
                        </div>
                        <div class="nav-item">
                            <span>Pending Orders</span>
                            <span class="badge badge-primary badge-sm">23</span>
                        </div>
                    </div>
                </div>

                <div class="badge-demo-section">
                    <h4 class="badge-demo-title">Dot Indicators</h4>
                    <div class="dot-indicator-examples">
                        <div class="status-item">
                            <span class="status-dot status-online"></span>
                            <span>System Online</span>
                        </div>
                        <div class="status-item">
                            <span class="status-dot status-warning"></span>
                            <span>Maintenance Mode</span>
                        </div>
                        <div class="status-item">
                            <span class="status-dot status-offline"></span>
                            <span>Service Offline</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation Components --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Navigation Components</h3>
                    <p class="showcase-subtitle">Tabs, breadcrumbs, pagination, and navigation elements</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('navigation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="navigation-demo-container">
                {{-- Tabs --}}
                <div class="nav-demo-section">
                    <h4 class="nav-demo-title">Tab Navigation</h4>
                    <div class="tab-container">
                        <div class="tab-nav">
                            <button class="tab-btn active" onclick="switchTab('overview')" data-tab="overview">Overview</button>
                            <button class="tab-btn" onclick="switchTab('customers')" data-tab="customers">Customers</button>
                            <button class="tab-btn" onclick="switchTab('orders')" data-tab="orders">Orders</button>
                            <button class="tab-btn" onclick="switchTab('reports')" data-tab="reports">Reports</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-panel active" id="tab-overview">
                                <h5>Overview Dashboard</h5>
                                <p>System overview with key metrics and recent activity summaries.</p>
                            </div>
                            <div class="tab-panel" id="tab-customers">
                                <h5>Customer Management</h5>
                                <p>Manage customer profiles, contacts, and relationship history.</p>
                            </div>
                            <div class="tab-panel" id="tab-orders">
                                <h5>Order Processing</h5>
                                <p>View and process customer orders, quotes, and invoices.</p>
                            </div>
                            <div class="tab-panel" id="tab-reports">
                                <h5>Business Reports</h5>
                                <p>Generate and view business analytics and performance reports.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Breadcrumbs --}}
                <div class="nav-demo-section">
                    <h4 class="nav-demo-title">Breadcrumb Navigation</h4>
                    <div class="breadcrumb-examples">
                        <nav class="breadcrumb">
                            <a href="#" class="breadcrumb-link">Dashboard</a>
                            <span class="breadcrumb-separator">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                            <a href="#" class="breadcrumb-link">Customers</a>
                            <span class="breadcrumb-separator">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                            <span class="breadcrumb-current">Acme Manufacturing</span>
                        </nav>

                        <nav class="breadcrumb">
                            <a href="#" class="breadcrumb-link">Home</a>
                            <span class="breadcrumb-separator">•</span>
                            <a href="#" class="breadcrumb-link">Orders</a>
                            <span class="breadcrumb-separator">•</span>
                            <a href="#" class="breadcrumb-link">2024</a>
                            <span class="breadcrumb-separator">•</span>
                            <span class="breadcrumb-current">ORD-2024-156</span>
                        </nav>
                    </div>
                </div>

                {{-- Pagination --}}
                <div class="nav-demo-section">
                    <h4 class="nav-demo-title">Pagination</h4>
                    <div class="pagination-examples">
                        <div class="pagination">
                            <button class="pagination-btn pagination-prev" onclick="changePage('prev')" disabled>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Previous
                            </button>
                            <div class="pagination-numbers">
                                <button class="pagination-number active" onclick="goToPage(1)">1</button>
                                <button class="pagination-number" onclick="goToPage(2)">2</button>
                                <button class="pagination-number" onclick="goToPage(3)">3</button>
                                <span class="pagination-ellipsis">...</span>
                                <button class="pagination-number" onclick="goToPage(12)">12</button>
                            </div>
                            <button class="pagination-btn pagination-next" onclick="changePage('next')">
                                Next
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>

                        <div class="pagination-info">
                            <span class="text-sm text-neutral-600">Showing 1 to 10 of 156 results</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Interactive Elements --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon interactive">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Interactive Elements</h3>
                    <p class="showcase-subtitle">Dropdowns, tooltips, and collapsible sections</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('interactive')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="interactive-demo-container">
                {{-- Dropdown Menus --}}
                <div class="interactive-demo-section">
                    <h4 class="interactive-demo-title">Dropdown Menus</h4>
                    <div class="dropdown-examples">
                        <div class="dropdown">
                            <button class="dropdown-trigger btn btn-secondary" onclick="toggleDropdown('actions-dropdown')">
                                Actions
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu" id="actions-dropdown">
                                <a href="#" class="dropdown-item">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    View Details
                                </a>
                                <a href="#" class="dropdown-item">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"/>
                                    </svg>
                                    Edit Customer
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-item-danger">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete Customer
                                </a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="dropdown-trigger btn btn-primary" onclick="toggleDropdown('user-dropdown')">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face" class="avatar avatar-sm" alt="User">
                                John Smith
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" id="user-dropdown">
                                <div class="dropdown-header">
                                    <div class="user-info">
                                        <div class="user-name">John Smith</div>
                                        <div class="user-email">john@acme.co.za</div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Profile Settings</a>
                                <a href="#" class="dropdown-item">Account Preferences</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tooltips --}}
                <div class="interactive-demo-section">
                    <h4 class="interactive-demo-title">Tooltips</h4>
                    <div class="tooltip-examples">
                        <button class="btn btn-secondary tooltip-trigger" data-tooltip="This button saves your current work">
                            Save
                        </button>
                        <button class="btn btn-danger tooltip-trigger" data-tooltip="Permanently delete this customer record">
                            Delete
                        </button>
                        <span class="tooltip-trigger" data-tooltip="Customer registration number assigned by CIPC">
                            Registration No. ℹ️
                        </span>
                        <span class="tooltip-trigger" data-tooltip="VAT number for South African tax compliance">
                            VAT Number ℹ️
                        </span>
                    </div>
                </div>

                {{-- Collapsible Sections --}}
                <div class="interactive-demo-section">
                    <h4 class="interactive-demo-title">Collapsible Sections</h4>
                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-header" onclick="toggleAccordion('accordion-1')">
                                <span>Customer Information</span>
                                <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div class="accordion-content" id="accordion-1">
                                <div class="accordion-body">
                                    <p>Basic customer details including company name, contact information, and registration details for business relationships.</p>
                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div>
                                            <strong>Company:</strong> Acme Manufacturing Ltd.
                                        </div>
                                        <div>
                                            <strong>Contact:</strong> John Mitchell
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-header" onclick="toggleAccordion('accordion-2')">
                                <span>Order History</span>
                                <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div class="accordion-content" id="accordion-2">
                                <div class="accordion-body">
                                    <p>Complete order history with details about past purchases, quotes, and transaction records.</p>
                                    <div class="mt-4">
                                        <div class="order-summary">
                                            <span>Total Orders: 47</span>
                                            <span>Total Value: R 1,247,890</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-header" onclick="toggleAccordion('accordion-3')">
                                <span>Payment Terms</span>
                                <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div class="accordion-content" id="accordion-3">
                                <div class="accordion-body">
                                    <p>Payment terms, credit limits, and billing preferences for this customer account.</p>
                                    <div class="mt-4 payment-details">
                                        <div>Credit Limit: R 500,000</div>
                                        <div>Payment Terms: 30 days net</div>
                                        <div>Status: Good standing</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Loading & Empty States --}}
    <div class="misc-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon loading">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Loading & Empty States</h3>
                    <p class="showcase-subtitle">Progress indicators, skeleton loaders, and no-data displays</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyMiscCode('loading')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="loading-demo-container">
                {{-- Loading Spinners --}}
                <div class="loading-demo-section">
                    <h4 class="loading-demo-title">Loading Spinners</h4>
                    <div class="spinner-examples">
                        <div class="spinner-item">
                            <div class="spinner spinner-sm"></div>
                            <span>Small</span>
                        </div>
                        <div class="spinner-item">
                            <div class="spinner"></div>
                            <span>Default</span>
                        </div>
                        <div class="spinner-item">
                            <div class="spinner spinner-lg"></div>
                            <span>Large</span>
                        </div>
                        <div class="spinner-item">
                            <div class="pulse-loader">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <span>Pulse</span>
                        </div>
                    </div>
                </div>

                {{-- Progress Bars --}}
                <div class="loading-demo-section">
                    <h4 class="loading-demo-title">Progress Indicators</h4>
                    <div class="progress-examples">
                        <div class="progress-item">
                            <div class="progress-label">Backup Progress</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 75%"></div>
                            </div>
                            <div class="progress-text">75% complete</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">File Upload</div>
                            <div class="progress-bar progress-bar-animated">
                                <div class="progress-fill progress-fill-striped" style="width: 45%"></div>
                            </div>
                            <div class="progress-text">Uploading... 45%</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">System Health</div>
                            <div class="progress-bar">
                                <div class="progress-fill progress-fill-success" style="width: 92%"></div>
                            </div>
                            <div class="progress-text">92% healthy</div>
                        </div>
                    </div>
                </div>

                {{-- Skeleton Loaders --}}
                <div class="loading-demo-section">
                    <h4 class="loading-demo-title">Skeleton Loaders</h4>
                    <div class="skeleton-examples">
                        <div class="skeleton-card">
                            <div class="skeleton-header">
                                <div class="skeleton-avatar"></div>
                                <div class="skeleton-content">
                                    <div class="skeleton-line skeleton-line-lg"></div>
                                    <div class="skeleton-line skeleton-line-md"></div>
                                </div>
                            </div>
                            <div class="skeleton-body">
                                <div class="skeleton-line"></div>
                                <div class="skeleton-line skeleton-line-sm"></div>
                                <div class="skeleton-line skeleton-line-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Empty States --}}
                <div class="loading-demo-section">
                    <h4 class="loading-demo-title">Empty States</h4>
                    <div class="empty-state-examples">
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="empty-state-title">No customers found</div>
                            <div class="empty-state-message">Get started by adding your first customer to the system.</div>
                            <div class="empty-state-actions">
                                <button class="btn btn-primary">Add Customer</button>
                                <button class="btn btn-ghost">Import Customers</button>
                            </div>
                        </div>

                        <div class="empty-state empty-state-sm">
                            <div class="empty-state-icon">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="empty-state-title">No orders yet</div>
                            <div class="empty-state-message">Orders will appear here once customers place them.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Implementation Examples --}}
    <div class="misc-showcase">
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
            <button class="copy-btn" onclick="copyMiscCode('implementation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="code-examples">
                <div class="code-example-card">
                    <h4 class="code-example-title">Modal Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Modal Backdrop --&gt;
&lt;div class="modal-backdrop" onclick="closeModal()"&gt;
    &lt;div class="modal" onclick="event.stopPropagation()"&gt;
        &lt;div class="modal-header"&gt;
            &lt;h3 class="modal-title"&gt;Confirm Action&lt;/h3&gt;
            &lt;button class="modal-close" onclick="closeModal()"&gt;×&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="modal-body"&gt;
            &lt;p&gt;Are you sure you want to proceed?&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="modal-footer"&gt;
            &lt;button class="btn btn-secondary" onclick="closeModal()"&gt;Cancel&lt;/button&gt;
            &lt;button class="btn btn-danger"&gt;Delete&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Alert Component</h4>
                    <pre class="code-block"><code>&lt;!-- Alert Banner --&gt;
&lt;div class="alert alert-success"&gt;
    &lt;div class="alert-icon"&gt;
        &lt;svg class="w-5 h-5"&gt;...&lt;/svg&gt;
    &lt;/div&gt;
    &lt;div class="alert-content"&gt;
        &lt;div class="alert-title"&gt;Success&lt;/div&gt;
        &lt;div class="alert-message"&gt;Operation completed successfully&lt;/div&gt;
    &lt;/div&gt;
    &lt;button class="alert-close"&gt;×&lt;/button&gt;
&lt;/div&gt;

&lt;!-- Toast Notification --&gt;
&lt;div class="toast toast-success"&gt;
    &lt;div class="toast-content"&gt;
        &lt;div class="toast-title"&gt;Success&lt;/div&gt;
        &lt;div class="toast-message"&gt;Customer created successfully&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Badge System</h4>
                    <pre class="code-block"><code>&lt;!-- Status Badges --&gt;
&lt;span class="badge badge-success"&gt;Active&lt;/span&gt;
&lt;span class="badge badge-warning"&gt;Pending&lt;/span&gt;
&lt;span class="badge badge-danger"&gt;Suspended&lt;/span&gt;

&lt;!-- Count Badge --&gt;
&lt;span class="nav-item"&gt;
    Messages
    &lt;span class="badge badge-danger badge-sm"&gt;12&lt;/span&gt;
&lt;/span&gt;

&lt;!-- Status Dot --&gt;
&lt;div class="status-item"&gt;
    &lt;span class="status-dot status-online"&gt;&lt;/span&gt;
    &lt;span&gt;System Online&lt;/span&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Dropdown Menu</h4>
                    <pre class="code-block"><code>&lt;!-- Dropdown Container --&gt;
&lt;div class="dropdown"&gt;
    &lt;button class="dropdown-trigger btn btn-secondary"&gt;
        Actions
        &lt;svg class="w-4 h-4"&gt;...&lt;/svg&gt;
    &lt;/button&gt;
    &lt;div class="dropdown-menu"&gt;
        &lt;a href="#" class="dropdown-item"&gt;View Details&lt;/a&gt;
        &lt;a href="#" class="dropdown-item"&gt;Edit Customer&lt;/a&gt;
        &lt;div class="dropdown-divider"&gt;&lt;/div&gt;
        &lt;a href="#" class="dropdown-item dropdown-item-danger"&gt;Delete&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- JavaScript --&gt;
&lt;script&gt;
function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle('show');
}
&lt;/script&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Modal Containers --}}
<div class="modal-container">
    {{-- Confirmation Modal --}}
    <div class="modal-backdrop" id="modal-confirm-delete">
        <div class="modal modal-sm" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Deletion</h3>
                <button class="modal-close" onclick="closeModal('confirm-delete')">×</button>
            </div>
            <div class="modal-body">
                <div class="modal-icon modal-icon-danger">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <p>Are you sure you want to delete this customer? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('confirm-delete')">Cancel</button>
                <button class="btn btn-danger">Delete Customer</button>
            </div>
        </div>
    </div>

    {{-- Action Confirmation Modal --}}
    <div class="modal-backdrop" id="modal-confirm-action">
        <div class="modal modal-sm" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">Process Order</h3>
                <button class="modal-close" onclick="closeModal('confirm-action')">×</button>
            </div>
            <div class="modal-body">
                <div class="modal-icon modal-icon-primary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p>Process Order #ORD-2024-156 for R 45,670.00? This will update inventory and generate an invoice.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('confirm-action')">Cancel</button>
                <button class="btn btn-primary">Process Order</button>
            </div>
        </div>
    </div>

    {{-- Form Modal --}}
    <div class="modal-backdrop" id="modal-add-customer">
        <div class="modal" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 class="modal-title">Add New Customer</h3>
                <button class="modal-close" onclick="closeModal('add-customer')">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Company Name *</label>
                            <input type="text" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Business Address</label>
                        <textarea class="form-textarea" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('add-customer')">Cancel</button>
                <button class="btn btn-primary">Add Customer</button>
            </div>
        </div>
    </div>
</div>

{{-- Toast Container --}}
<div class="toast-container" id="toast-container"></div>

@endsection

@push('head')
<style>
/* Hero Section */
.library-hero {
    background: linear-gradient(135deg, var(--warning-50) 0%, var(--warning-100) 100%);
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
        rgba(251, 146, 60, 0.03) 10px,
        rgba(251, 146, 60, 0.03) 20px
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
    background: linear-gradient(135deg, var(--warning-600), var(--warning-700));
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
    color: var(--warning-700);
    line-height: 1;
    margin-bottom: var(--space-1);
}

.stat-label {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    font-weight: 500;
}

/* Misc Showcases */
.misc-showcase {
    background: white;
    border-radius: var(--radius-3xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-slow);
    margin-bottom: var(--space-8);
}

.misc-showcase:hover {
    box-shadow: var(--shadow-xl);
    transform: translateY(-4px);
    border-color: var(--warning-200);
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

.showcase-icon.modals {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.alerts {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.badges {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.navigation {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
}

.showcase-icon.interactive {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.loading {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-700));
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
    background: var(--warning-600);
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
    background: var(--warning-700);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.showcase-body {
    padding: var(--space-8);
}

/* Modal System */
.modal-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-6);
}

.modal-demo-section {
    text-align: center;
}

.modal-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
}

.modal-preview {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.modal-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    pointer-events: none;
}

.modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--space-4);
    opacity: 0;
    visibility: hidden;
    transition: all var(--transition-base);
    pointer-events: none;
}

.modal-backdrop.show {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
}

.modal {
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-2xl);
    max-width: 32rem;
    width: 100%;
    max-height: 90vh;
    overflow: hidden;
    transform: translateY(var(--space-4));
    transition: transform var(--transition-slow);
}

.modal-backdrop.show .modal {
    transform: translateY(0);
}

.modal-sm {
    max-width: 24rem;
}

.modal-lg {
    max-width: 48rem;
}

.modal-header {
    padding: var(--space-6);
    border-bottom: 1px solid var(--neutral-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.modal-title {
    font-size: var(--text-xl);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0;
}

.modal-close {
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
    font-size: var(--text-lg);
    transition: all var(--transition-fast);
}

.modal-close:hover {
    background: var(--neutral-200);
    color: var(--neutral-900);
}

.modal-body {
    padding: var(--space-6);
    text-align: center;
}

.modal-icon {
    width: 64px;
    height: 64px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-4);
}

.modal-icon-danger {
    background: var(--danger-100);
    color: var(--danger-600);
}

.modal-icon-primary {
    background: var(--brand-100);
    color: var(--brand-600);
}

.modal-footer {
    padding: var(--space-4) var(--space-6);
    border-top: 1px solid var(--neutral-200);
    display: flex;
    gap: var(--space-3);
    justify-content: flex-end;
}

/* Alert System */
.alert-demo-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-8);
}

.alert-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.alert-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.toast-demo-buttons {
    display: flex;
    gap: var(--space-3);
    flex-wrap: wrap;
}

.alert-banners {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.alert {
    display: flex;
    align-items: flex-start;
    gap: var(--space-3);
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    border-width: 1px;
    border-style: solid;
}

.alert-success {
    background: var(--success-50);
    border-color: var(--success-200);
    color: var(--success-800);
}

.alert-warning {
    background: var(--warning-50);
    border-color: var(--warning-200);
    color: var(--warning-800);
}

.alert-primary {
    background: var(--brand-50);
    border-color: var(--brand-200);
    color: var(--brand-800);
}

.alert-danger {
    background: var(--danger-50);
    border-color: var(--danger-200);
    color: var(--danger-800);
}

.alert-icon {
    flex-shrink: 0;
    margin-top: 2px;
}

.alert-content {
    flex: 1;
    min-width: 0;
}

.alert-title {
    font-weight: 600;
    margin-bottom: var(--space-1);
}

.alert-message {
    font-size: var(--text-sm);
    line-height: 1.5;
}

.alert-actions {
    display: flex;
    gap: var(--space-2);
    margin-top: var(--space-3);
}

.alert-close {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    border: none;
    background: transparent;
    color: currentColor;
    cursor: pointer;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background var(--transition-fast);
}

.alert-close:hover {
    background: rgba(0, 0, 0, 0.1);
}

/* Toast Notifications */
.toast-container {
    position: fixed;
    top: var(--space-4);
    right: var(--space-4);
    z-index: 10000;
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    pointer-events: none;
}

.toast {
    background: white;
    border-radius: var(--radius-lg);
    padding: var(--space-4);
    box-shadow: var(--shadow-lg);
    border-left: 4px solid;
    min-width: 320px;
    opacity: 0;
    transform: translateX(100%);
    transition: all var(--transition-base);
    pointer-events: all;
}

.toast.show {
    opacity: 1;
    transform: translateX(0);
}

.toast-success {
    border-color: var(--success-500);
}

.toast-error {
    border-color: var(--danger-500);
}

.toast-warning {
    border-color: var(--warning-500);
}

.toast-info {
    border-color: var(--brand-500);
}

.toast-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: var(--space-3);
}

.toast-title {
    font-weight: 600;
    margin-bottom: var(--space-1);
}

.toast-message {
    font-size: var(--text-sm);
    color: var(--neutral-600);
}

.toast-close {
    width: 20px;
    height: 20px;
    border: none;
    background: transparent;
    color: var(--neutral-400);
    cursor: pointer;
    flex-shrink: 0;
}

/* Badge System */
.badge-demo-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-6);
}

.badge-demo-section {
    text-align: center;
}

.badge-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-4);
}

.badge-group {
    display: flex;
    gap: var(--space-3);
    flex-wrap: wrap;
    justify-content: center;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.badge-sm {
    padding: var(--space-1) var(--space-1);
    font-size: 10px;
}

.badge-lg {
    padding: var(--space-2) var(--space-3);
    font-size: var(--text-sm);
    text-transform: none;
    letter-spacing: normal;
}

.badge-success {
    background: var(--success-100);
    color: var(--success-800);
}

.badge-warning {
    background: var(--warning-100);
    color: var(--warning-800);
}

.badge-danger {
    background: var(--danger-100);
    color: var(--danger-800);
}

.badge-neutral {
    background: var(--neutral-200);
    color: var(--neutral-800);
}

.badge-primary {
    background: var(--brand-100);
    color: var(--brand-800);
}

.count-badge-examples {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.nav-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--space-3);
    background: var(--neutral-50);
    border-radius: var(--radius-lg);
}

.dot-indicator-examples {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
}

.status-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    background: var(--neutral-50);
    border-radius: var(--radius-lg);
}

.status-dot {
    width: 12px;
    height: 12px;
    border-radius: var(--radius-full);
    flex-shrink: 0;
}

.status-online {
    background: var(--success-500);
}

.status-warning {
    background: var(--warning-500);
}

.status-offline {
    background: var(--neutral-400);
}

/* Navigation Components */
.navigation-demo-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-8);
}

.nav-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.nav-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.tab-container {
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.tab-nav {
    display: flex;
    background: var(--neutral-50);
    border-bottom: 1px solid var(--neutral-200);
}

.tab-btn {
    flex: 1;
    padding: var(--space-3) var(--space-4);
    border: none;
    background: transparent;
    color: var(--neutral-600);
    font-weight: 500;
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: all var(--transition-fast);
}

.tab-btn:hover {
    color: var(--neutral-900);
    background: var(--neutral-100);
}

.tab-btn.active {
    color: var(--brand-600);
    border-color: var(--brand-600);
    background: white;
}

.tab-content {
    padding: var(--space-6);
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}

.breadcrumb-examples {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--text-sm);
    color: var(--neutral-500);
}

.breadcrumb-link {
    color: var(--neutral-600);
    text-decoration: none;
    transition: color var(--transition-fast);
}

.breadcrumb-link:hover {
    color: var(--brand-600);
}

.breadcrumb-separator {
    color: var(--neutral-400);
    display: flex;
    align-items: center;
}

.breadcrumb-current {
    color: var(--neutral-900);
    font-weight: 500;
}

.pagination-examples {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
    align-items: center;
}

.pagination {
    display: flex;
    align-items: center;
    gap: var(--space-2);
}

.pagination-btn {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-3);
    border: 1px solid var(--neutral-300);
    background: white;
    color: var(--neutral-700);
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: all var(--transition-fast);
    font-size: var(--text-sm);
}

.pagination-btn:hover:not(:disabled) {
    background: var(--neutral-50);
    border-color: var(--neutral-400);
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-numbers {
    display: flex;
    gap: var(--space-1);
}

.pagination-number {
    width: 36px;
    height: 36px;
    border: 1px solid var(--neutral-300);
    background: white;
    color: var(--neutral-700);
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: all var(--transition-fast);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--text-sm);
}

.pagination-number:hover {
    background: var(--neutral-50);
    border-color: var(--neutral-400);
}

.pagination-number.active {
    background: var(--brand-600);
    color: white;
    border-color: var(--brand-600);
}

.pagination-ellipsis {
    padding: var(--space-2);
    color: var(--neutral-400);
}

/* Interactive Elements */
.interactive-demo-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-8);
}

.interactive-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.interactive-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.dropdown-examples {
    display: flex;
    gap: var(--space-4);
    flex-wrap: wrap;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-trigger {
    display: flex;
    align-items: center;
    gap: var(--space-2);
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
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all var(--transition-fast);
    margin-top: var(--space-1);
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-menu-right {
    left: auto;
    right: 0;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-3);
    color: var(--neutral-700);
    text-decoration: none;
    font-size: var(--text-sm);
    transition: background var(--transition-fast);
    border-radius: var(--radius-md);
    margin: var(--space-1);
}

.dropdown-item:hover {
    background: var(--neutral-50);
    color: var(--brand-600);
}

.dropdown-item-danger:hover {
    background: var(--danger-50);
    color: var(--danger-600);
}

.dropdown-divider {
    height: 1px;
    background: var(--neutral-200);
    margin: var(--space-2) 0;
}

.dropdown-header {
    padding: var(--space-3);
    border-bottom: 1px solid var(--neutral-200);
}

.user-info {
    text-align: center;
}

.user-name {
    font-weight: 600;
    color: var(--neutral-900);
}

.user-email {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.avatar {
    border-radius: var(--radius-full);
    object-fit: cover;
}

.avatar-sm {
    width: 24px;
    height: 24px;
}

.tooltip-examples {
    display: flex;
    gap: var(--space-4);
    flex-wrap: wrap;
    align-items: center;
}

.tooltip-trigger {
    position: relative;
    cursor: help;
}

.tooltip-trigger:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: var(--neutral-900);
    color: white;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-lg);
    font-size: var(--text-xs);
    white-space: nowrap;
    z-index: 1000;
    margin-bottom: var(--space-1);
}

.tooltip-trigger:hover::before {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    border: 4px solid transparent;
    border-top-color: var(--neutral-900);
    z-index: 1000;
}

.accordion {
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.accordion-item {
    border-bottom: 1px solid var(--neutral-200);
}

.accordion-item:last-child {
    border-bottom: none;
}

.accordion-header {
    width: 100%;
    padding: var(--space-4);
    background: var(--neutral-50);
    border: none;
    text-align: left;
    font-weight: 500;
    color: var(--neutral-900);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: background var(--transition-fast);
}

.accordion-header:hover {
    background: var(--neutral-100);
}

.accordion-icon {
    width: 16px;
    height: 16px;
    transition: transform var(--transition-fast);
}

.accordion-item.active .accordion-icon {
    transform: rotate(180deg);
}

.accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height var(--transition-slow);
}

.accordion-item.active .accordion-content {
    max-height: 500px;
}

.accordion-body {
    padding: var(--space-4);
    background: white;
}

.order-summary {
    display: flex;
    gap: var(--space-4);
    font-size: var(--text-sm);
}

.payment-details {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
    font-size: var(--text-sm);
}

/* Loading & Empty States */
.loading-demo-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-8);
}

.loading-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.loading-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.spinner-examples {
    display: flex;
    gap: var(--space-6);
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.spinner-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-2);
}

.spinner {
    width: 24px;
    height: 24px;
    border: 2px solid var(--neutral-200);
    border-top: 2px solid var(--brand-600);
    border-radius: var(--radius-full);
    animation: spin 1s linear infinite;
}

.spinner-sm {
    width: 16px;
    height: 16px;
}

.spinner-lg {
    width: 32px;
    height: 32px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.pulse-loader {
    display: flex;
    gap: var(--space-1);
}

.pulse-loader div {
    width: 8px;
    height: 8px;
    background: var(--brand-600);
    border-radius: var(--radius-full);
    animation: pulse 1.4s ease-in-out infinite both;
}

.pulse-loader div:nth-child(1) { animation-delay: -0.32s; }
.pulse-loader div:nth-child(2) { animation-delay: -0.16s; }

@keyframes pulse {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

.progress-examples {
    display: flex;
    flex-direction: column;
    gap: var(--space-6);
}

.progress-item {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.progress-label {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--neutral-900);
}

.progress-bar {
    height: 8px;
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

.progress-fill-success {
    background: var(--success-600);
}

.progress-fill-striped {
    background-image: linear-gradient(
        45deg,
        rgba(255, 255, 255, 0.15) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, 0.15) 50%,
        rgba(255, 255, 255, 0.15) 75%,
        transparent 75%,
        transparent
    );
    background-size: 16px 16px;
}

.progress-bar-animated .progress-fill-striped {
    animation: progress-bar-stripes 1s linear infinite;
}

@keyframes progress-bar-stripes {
    0% { background-position: 16px 0; }
    100% { background-position: 0 0; }
}

.progress-text {
    font-size: var(--text-xs);
    color: var(--neutral-600);
    text-align: right;
}

.skeleton-examples {
    display: flex;
    justify-content: center;
}

.skeleton-card {
    width: 300px;
    padding: var(--space-4);
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
}

.skeleton-header {
    display: flex;
    gap: var(--space-3);
    margin-bottom: var(--space-4);
}

.skeleton-avatar {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-full);
    background: var(--neutral-200);
    animation: skeleton-pulse 2s ease-in-out infinite;
}

.skeleton-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.skeleton-body {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.skeleton-line {
    height: 12px;
    background: var(--neutral-200);
    border-radius: var(--radius-full);
    animation: skeleton-pulse 2s ease-in-out infinite;
}

.skeleton-line-sm {
    width: 60%;
}

.skeleton-line-md {
    width: 80%;
}

.skeleton-line-lg {
    width: 100%;
}

@keyframes skeleton-pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.empty-state-examples {
    display: flex;
    gap: var(--space-8);
    justify-content: center;
    flex-wrap: wrap;
}

.empty-state {
    text-align: center;
    padding: var(--space-8);
    max-width: 400px;
}

.empty-state-sm {
    padding: var(--space-6);
    max-width: 300px;
}

.empty-state-icon {
    color: var(--neutral-400);
    margin-bottom: var(--space-4);
}

.empty-state-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-2);
}

.empty-state-message {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-6);
    line-height: 1.5;
}

.empty-state-actions {
    display: flex;
    gap: var(--space-3);
    justify-content: center;
    flex-wrap: wrap;
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
    
    .modal-demo-grid,
    .badge-demo-container,
    .navigation-demo-container,
    .interactive-demo-container,
    .loading-demo-container {
        grid-template-columns: 1fr;
    }
    
    .toast-demo-buttons {
        flex-direction: column;
    }
    
    .dropdown-examples,
    .tooltip-examples {
        flex-direction: column;
        align-items: center;
    }
    
    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .pagination-numbers {
        order: 2;
        margin: var(--space-2) 0;
    }
    
    .tab-nav {
        flex-direction: column;
    }
    
    .breadcrumb {
        flex-wrap: wrap;
    }
    
    .empty-state-examples {
        flex-direction: column;
        align-items: center;
    }
}

/* Dark Mode Support */
[data-theme="dark"] .library-hero {
    background: linear-gradient(135deg, var(--neutral-800) 0%, var(--neutral-700) 100%);
}

[data-theme="dark"] .hero-title,
[data-theme="dark"] .hero-description {
    color: var(--neutral-100);
}

[data-theme="dark"] .stat-number {
    color: var(--warning-400);
}

[data-theme="dark"] .misc-showcase {
    background: var(--neutral-800);
    border-color: var(--neutral-600);
}

[data-theme="dark"] .showcase-header {
    background: var(--neutral-700);
    border-color: var(--neutral-600);
}

[data-theme="dark"] .showcase-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .showcase-subtitle {
    color: var(--neutral-300);
}

[data-theme="dark"] .modal {
    background: var(--neutral-800);
    color: var(--neutral-100);
}

[data-theme="dark"] .modal-header {
    border-color: var(--neutral-600);
}

[data-theme="dark"] .modal-footer {
    border-color: var(--neutral-600);
}

[data-theme="dark"] .alert {
    border-color: currentColor;
}

[data-theme="dark"] .tab-container {
    border-color: var(--neutral-600);
}

[data-theme="dark"] .tab-nav {
    background: var(--neutral-700);
    border-color: var(--neutral-600);
}

[data-theme="dark"] .tab-content {
    background: var(--neutral-800);
}

[data-theme="dark"] .dropdown-menu {
    background: var(--neutral-800);
    border-color: var(--neutral-600);
}

[data-theme="dark"] .dropdown-item {
    color: var(--neutral-200);
}

[data-theme="dark"] .dropdown-item:hover {
    background: var(--neutral-700);
}

[data-theme="dark"] .accordion {
    border-color: var(--neutral-600);
}

[data-theme="dark"] .accordion-header {
    background: var(--neutral-700);
    color: var(--neutral-100);
}

[data-theme="dark"] .accordion-body {
    background: var(--neutral-800);
    color: var(--neutral-200);
}

[data-theme="dark"] .skeleton-avatar,
[data-theme="dark"] .skeleton-line {
    background: var(--neutral-600);
}

[data-theme="dark"] .code-example-card {
    background: var(--neutral-700);
    border-color: var(--neutral-600);
}

[data-theme="dark"] .code-example-title {
    color: var(--neutral-100);
}

/* Animation Enhancements */
.misc-showcase {
    animation: fadeInUp 0.6s ease-out;
}

.misc-showcase:nth-child(2) { animation-delay: 0.1s; }
.misc-showcase:nth-child(3) { animation-delay: 0.2s; }
.misc-showcase:nth-child(4) { animation-delay: 0.3s; }
.misc-showcase:nth-child(5) { animation-delay: 0.4s; }
.misc-showcase:nth-child(6) { animation-delay: 0.5s; }
.misc-showcase:nth-child(7) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Focus States for Accessibility */
.copy-btn:focus,
.tab-btn:focus,
.pagination-btn:focus,
.pagination-number:focus,
.dropdown-trigger:focus,
.accordion-header:focus {
    outline: 2px solid var(--brand-500);
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .modal-container,
    .toast-container {
        display: none;
    }
    
    .misc-showcase {
        break-inside: avoid;
        box-shadow: none;
        border: 1px solid #ccc;
    }
    
    .copy-btn {
        display: none;
    }
}
</style>
@endpush

@pushOnce('scripts')
<script>
// ManuCore ERP Misc Components JavaScript
console.log('🎨 ManuCore ERP Misc Components Library loaded');

// Modal Management
let activeModals = new Set();

function showModal(modalId) {
    const modal = document.getElementById(`modal-${modalId}`);
    if (!modal) {
        console.warn(`Modal not found: modal-${modalId}`);
        return;
    }
    
    modal.classList.add('show');
    activeModals.add(modalId);
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
    
    // Focus trap
    const focusableElements = modal.querySelectorAll('button, input, select, textarea, [tabindex]:not([tabindex="-1"])');
    if (focusableElements.length > 0) {
        focusableElements[0].focus();
    }
    
    // Accessibility
    modal.setAttribute('aria-hidden', 'false');
    
    console.log(`Modal opened: ${modalId}`);
}

function closeModal(modalId) {
    const modal = document.getElementById(`modal-${modalId}`);
    if (!modal) return;
    
    modal.classList.remove('show');
    activeModals.delete(modalId);
    
    // Restore body scroll if no modals are open
    if (activeModals.size === 0) {
        document.body.style.overflow = '';
    }
    
    // Accessibility
    modal.setAttribute('aria-hidden', 'true');
    
    console.log(`Modal closed: ${modalId}`);
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && activeModals.size > 0) {
        const lastModal = Array.from(activeModals).pop();
        closeModal(lastModal);
    }
});

// Toast Notification System
let toastCounter = 0;

function showToast(type, message, duration = 4000) {
    const container = document.getElementById('toast-container');
    if (!container) {
        console.warn('Toast container not found');
        return;
    }
    
    toastCounter++;
    const toastId = `toast-${toastCounter}`;
    
    const toast = document.createElement('div');
    toast.id = toastId;
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <div>
                <div class="toast-title">${getToastTitle(type)}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="removeToast('${toastId}')" aria-label="Close notification">
                ×
            </button>
        </div>
    `;
    
    container.appendChild(toast);
    
    // Trigger animation
    setTimeout(() => toast.classList.add('show'), 10);
    
    // Auto-remove
    setTimeout(() => removeToast(toastId), duration);
    
    console.log(`Toast shown: ${type} - ${message}`);
}

function getToastTitle(type) {
    const titles = {
        success: 'Success',
        error: 'Error',
        warning: 'Warning',
        info: 'Information'
    };
    return titles[type] || 'Notification';
}

function removeToast(toastId) {
    const toast = document.getElementById(toastId);
    if (!toast) return;
    
    toast.classList.remove('show');
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 300);
}

// Alert Management
function closeAlert(button) {
    const alert = button.closest('.alert');
    if (!alert) return;
    
    alert.style.animation = 'slideUp 0.3s ease-out forwards';
    setTimeout(() => {
        if (alert.parentNode) {
            alert.parentNode.removeChild(alert);
        }
    }, 300);
}

// Tab Navigation
function switchTab(tabId) {
    // Update tab buttons
    const tabButtons = document.querySelectorAll('.tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove('active');
        if (btn.getAttribute('data-tab') === tabId) {
            btn.classList.add('active');
        }
    });
    
    // Update tab panels
    const tabPanels = document.querySelectorAll('.tab-panel');
    tabPanels.forEach(panel => {
        panel.classList.remove('active');
        if (panel.id === `tab-${tabId}`) {
            panel.classList.add('active');
        }
    });
    
    console.log(`Tab switched to: ${tabId}`);
}

// Pagination
let currentPage = 1;
const totalPages = 12;

function goToPage(page) {
    if (page < 1 || page > totalPages) return;
    
    currentPage = page;
    updatePaginationDisplay();
    console.log(`Page changed to: ${page}`);
}

function changePage(direction) {
    if (direction === 'prev' && currentPage > 1) {
        goToPage(currentPage - 1);
    } else if (direction === 'next' && currentPage < totalPages) {
        goToPage(currentPage + 1);
    }
}

function updatePaginationDisplay() {
    // Update active page number
    const pageNumbers = document.querySelectorAll('.pagination-number');
    pageNumbers.forEach(btn => {
        btn.classList.remove('active');
        if (parseInt(btn.textContent) === currentPage) {
            btn.classList.add('active');
        }
    });
    
    // Update prev/next button states
    const prevBtn = document.querySelector('.pagination-prev');
    const nextBtn = document.querySelector('.pagination-next');
    
    if (prevBtn) prevBtn.disabled = currentPage === 1;
    if (nextBtn) nextBtn.disabled = currentPage === totalPages;
}

// Dropdown Management
let activeDropdowns = new Set();

function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    if (!dropdown) return;
    
    const isOpen = dropdown.classList.contains('show');
    
    // Close all other dropdowns
    activeDropdowns.forEach(id => {
        if (id !== dropdownId) {
            document.getElementById(id)?.classList.remove('show');
        }
    });
    activeDropdowns.clear();
    
    // Toggle current dropdown
    if (isOpen) {
        dropdown.classList.remove('show');
    } else {
        dropdown.classList.add('show');
        activeDropdowns.add(dropdownId);
    }
    
    console.log(`Dropdown ${dropdownId}: ${isOpen ? 'closed' : 'opened'}`);
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.dropdown')) {
        activeDropdowns.forEach(id => {
            document.getElementById(id)?.classList.remove('show');
        });
        activeDropdowns.clear();
    }
});

// Accordion Management
function toggleAccordion(accordionId) {
    const content = document.getElementById(accordionId);
    const item = content?.closest('.accordion-item');
    
    if (!content || !item) return;
    
    const isActive = item.classList.contains('active');
    
    // Close all other accordion items in the same accordion
    const accordion = item.closest('.accordion');
    accordion.querySelectorAll('.accordion-item').forEach(otherItem => {
        if (otherItem !== item) {
            otherItem.classList.remove('active');
        }
    });
    
    // Toggle current item
    if (isActive) {
        item.classList.remove('active');
    } else {
        item.classList.add('active');
    }
    
    console.log(`Accordion ${accordionId}: ${isActive ? 'closed' : 'opened'}`);
}

// Copy to Clipboard Functionality
function copyMiscCode(category) {
    const codeExamples = {
        modals: `<!-- Modal Structure -->
<div class="modal-backdrop" onclick="closeModal()">
    <div class="modal" onclick="event.stopPropagation()">
        <div class="modal-header">
            <h3 class="modal-title">Confirm Action</h3>
            <button class="modal-close" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to proceed?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal()">Cancel</button>
            <button class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>`,

        alerts: `<!-- Alert Banner -->
<div class="alert alert-success">
    <div class="alert-icon">
        <svg class="w-5 h-5"><!-- Icon SVG --></svg>
    </div>
    <div class="alert-content">
        <div class="alert-title">Success</div>
        <div class="alert-message">Operation completed successfully</div>
    </div>
    <button class="alert-close">×</button>
</div>

<!-- Toast Notification -->
<div class="toast toast-success">
    <div class="toast-content">
        <div class="toast-title">Success</div>
        <div class="toast-message">Customer created successfully</div>
    </div>
</div>`,

        badges: `<!-- Status Badges -->
<span class="badge badge-success">Active</span>
<span class="badge badge-warning">Pending</span>
<span class="badge badge-danger">Suspended</span>

<!-- Count Badge -->
<div class="nav-item">
    <span>Messages</span>
    <span class="badge badge-danger badge-sm">12</span>
</div>

<!-- Status Dot -->
<div class="status-item">
    <span class="status-dot status-online"></span>
    <span>System Online</span>
</div>`,

        navigation: `<!-- Tab Navigation -->
<div class="tab-container">
    <div class="tab-nav">
        <button class="tab-btn active" onclick="switchTab('overview')">Overview</button>
        <button class="tab-btn" onclick="switchTab('details')">Details</button>
    </div>
    <div class="tab-content">
        <div class="tab-panel active" id="tab-overview">Content 1</div>
        <div class="tab-panel" id="tab-details">Content 2</div>
    </div>
</div>

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <a href="#" class="breadcrumb-link">Dashboard</a>
    <span class="breadcrumb-separator">›</span>
    <span class="breadcrumb-current">Current Page</span>
</nav>`,

        interactive: `<!-- Dropdown Menu -->
<div class="dropdown">
    <button class="dropdown-trigger btn btn-secondary" onclick="toggleDropdown('menu')">
        Actions <svg class="w-4 h-4"><!-- Chevron --></svg>
    </button>
    <div class="dropdown-menu" id="menu">
        <a href="#" class="dropdown-item">View Details</a>
        <a href="#" class="dropdown-item">Edit</a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-item-danger">Delete</a>
    </div>
</div>

<!-- Tooltip -->
<button class="tooltip-trigger" data-tooltip="Helpful information">
    Hover me
</button>`,

        loading: `<!-- Loading Spinner -->
<div class="spinner"></div>

<!-- Progress Bar -->
<div class="progress-bar">
    <div class="progress-fill" style="width: 75%"></div>
</div>

<!-- Empty State -->
<div class="empty-state">
    <div class="empty-state-icon">
        <svg class="w-12 h-12"><!-- Icon --></svg>
    </div>
    <div class="empty-state-title">No data found</div>
    <div class="empty-state-message">Get started by adding your first item.</div>
    <div class="empty-state-actions">
        <button class="btn btn-primary">Add Item</button>
    </div>
</div>`,

        implementation: `/* ManuCore ERP Misc Components CSS */

/* Modal System */
.modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modal-backdrop.show {
    opacity: 1;
    visibility: visible;
}

/* Alert System */
.alert {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 1rem;
    border-radius: 0.5rem;
    border: 1px solid;
}

.alert-success {
    background: #f0fdf4;
    border-color: #bbf7d0;
    color: #166534;
}

/* Badge System */
.badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

/* JavaScript Functions */
function showModal(id) {
    document.getElementById('modal-' + id).classList.add('show');
}

function showToast(type, message) {
    // Toast implementation
}`
    };
    
    const code = codeExamples[category];
    if (!code) {
        console.error('Category not found:', category);
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        showToast('success', `${category.charAt(0).toUpperCase() + category.slice(1)} code copied to clipboard!`);
    }).catch(() => {
        console.log('Code example:', code);
        showToast('info', 'Code logged to console (clipboard not available)');
    });
}

function exportMiscLibrary() {
    const libraryInfo = `/* MANUCORE ERP - MISC COMPONENTS LIBRARY */

Complete UI component system featuring:
✓ Modal dialogs (confirmation, form, detail views)
✓ Alert & notification system (toast, banners)
✓ Badge & label system (status, counts, priorities)
✓ Navigation components (tabs, breadcrumbs, pagination)
✓ Interactive elements (dropdowns, tooltips, accordions)
✓ Loading & empty states (spinners, progress, skeleton)
✓ Comprehensive implementation examples
✓ Full accessibility support
✓ Responsive design patterns
✓ Dark mode compatibility
✓ Professional ERP-focused design
✓ South African business context integration

Framework: ManuCore ERP Design System
Theme: Uxintace Blue (with 4 theme variants)
Technology: Blade + Alpine.js + Tailwind CSS
Standards: WCAG 2.1 AA compliant`;

    navigator.clipboard.writeText(libraryInfo).then(() => {
        showToast('success', 'Complete misc components library information exported!');
    }).catch(() => {
        console.log(libraryInfo);
        showToast('info', 'Library info logged to console');
    });
}

// Initialize components on page load
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎨 Initializing ManuCore ERP Misc Components...');
    
    // Initialize tooltips
    initializeTooltips();
    
    // Initialize keyboard navigation
    initializeKeyboardNavigation();
    
    // Initialize accessibility features
    initializeAccessibility();
    
    // Update pagination display
    updatePaginationDisplay();
    
    console.log('✅ ManuCore ERP Misc Components initialized successfully');
});

function initializeTooltips() {
    // Enhanced tooltip functionality could be added here
    // For now, using CSS-only tooltips via data-tooltip attribute
    console.log('Tooltips initialized');
}

function initializeKeyboardNavigation() {
    // Tab navigation with keyboard
    document.addEventListener('keydown', function(e) {
        if (e.target.classList.contains('tab-btn')) {
            const tabs = Array.from(document.querySelectorAll('.tab-btn'));
            const currentIndex = tabs.indexOf(e.target);
            
            if (e.key === 'ArrowLeft' && currentIndex > 0) {
                e.preventDefault();
                tabs[currentIndex - 1].focus();
                tabs[currentIndex - 1].click();
            } else if (e.key === 'ArrowRight' && currentIndex < tabs.length - 1) {
                e.preventDefault();
                tabs[currentIndex + 1].focus();
                tabs[currentIndex + 1].click();
            }
        }
        
        // Accordion navigation
        if (e.target.classList.contains('accordion-header')) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                e.target.click();
            }
        }
    });
    
    console.log('Keyboard navigation initialized');
}

function initializeAccessibility() {
    // Set initial ARIA states
    document.querySelectorAll('.modal-backdrop').forEach(modal => {
        modal.setAttribute('aria-hidden', 'true');
    });
    
    document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
        dropdown.setAttribute('aria-hidden', 'true');
    });
    
    // Announce dynamic content changes
    const announcer = document.createElement('div');
    announcer.setAttribute('aria-live', 'polite');
    announcer.setAttribute('aria-atomic', 'true');
    announcer.className = 'sr-only';
    announcer.id = 'misc-announcer';
    document.body.appendChild(announcer);
    
    console.log('Accessibility features initialized');
}

// Utility function to announce changes for screen readers
function announceChange(message) {
    const announcer = document.getElementById('misc-announcer');
    if (announcer) {
        announcer.textContent = message;
        setTimeout(() => announcer.textContent = '', 1000);
    }
}

// Enhanced interaction effects
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to interactive elements
    document.querySelectorAll('.misc-showcase').forEach((showcase, index) => {
        showcase.style.animationDelay = `${index * 0.1}s`;
        
        showcase.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        showcase.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(-4px)';
        });
    });
    
    // Add click effects to buttons
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'btn-ripple';
            ripple.style.left = (e.clientX - e.target.offsetLeft) + 'px';
            ripple.style.top = (e.clientY - e.target.offsetTop) + 'px';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
});

// Add smooth scroll behavior for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Performance optimization: lazy load heavy animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '50px'
};

const animationObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            animationObserver.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.misc-showcase').forEach(el => {
    animationObserver.observe(el);
});
</script>
@endpushOnce