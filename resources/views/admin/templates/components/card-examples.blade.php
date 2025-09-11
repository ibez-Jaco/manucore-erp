@extends('layouts.panel')

@section('title', 'Card Components - ManuCore ERP')

@section('header', 'ERP/CRM Card Component Library')
@section('subheader', 'Comprehensive card system for dashboards, data visualization, and content organization')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Templates
    </a>
    <button class="btn btn-primary" onclick="exportCardLibrary()">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h2 class="hero-title">ERP/CRM Card Components</h2>
            <p class="hero-description">Professional card system for dashboards, data visualization, and content organization with consistent styling, interactive widgets, and comprehensive layout patterns for manufacturing and business applications.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Card Types</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Widget Patterns</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Layout Options</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Color Themes</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Basic Card Structures --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon basic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Basic Card Structures</h3>
                    <p class="showcase-subtitle">Foundation card layouts with headers, body, and footer sections</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('basic')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="card-demo-grid">
                <div class="card-demo-section">
                    <h4 class="card-demo-title">Simple Card</h4>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Information</h5>
                            <p class="card-text">Basic card layout for displaying customer details and contact information.</p>
                            <div class="card-meta">
                                <span class="badge badge-success">Active</span>
                                <span class="text-muted">Updated 2 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-demo-section">
                    <h4 class="card-demo-title">Card with Header</h4>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-content">
                                <h5 class="card-header-title">Order Details</h5>
                                <div class="card-header-actions">
                                    <button class="btn btn-ghost btn-sm" onclick="handleCardAction('edit')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Order #ORD-2024-001 for Acme Manufacturing with detailed line items and shipping information.</p>
                        </div>
                    </div>
                </div>

                <div class="card-demo-section">
                    <h4 class="card-demo-title">Card with Footer</h4>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quote Approval</h5>
                            <p class="card-text">Review and approve the manufacturing quote for premium widget assemblies.</p>
                            <div class="card-meta">
                                <div class="card-meta-item">
                                    <span class="card-meta-label">Amount:</span>
                                    <span class="card-meta-value">R 156,750.00</span>
                                </div>
                                <div class="card-meta-item">
                                    <span class="card-meta-label">Valid Until:</span>
                                    <span class="card-meta-value">Oct 15, 2024</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-actions">
                                <button class="btn btn-success btn-sm" onclick="handleCardAction('approve')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Approve
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="handleCardAction('review')">Review</button>
                                <button class="btn btn-danger btn-sm" onclick="handleCardAction('reject')">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon stats">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Statistics Cards</h3>
                    <p class="showcase-subtitle">KPI cards and performance metrics for dashboard displays</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('stats')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="stats-demo-grid">
                <div class="widget-stat widget-stat-revenue">
                    <div class="widget-stat-header">
                        <div class="widget-stat-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <div class="widget-stat-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="widget-stat-value">R 2,450,000</div>
                    <div class="widget-stat-label">Monthly Revenue</div>
                    <div class="widget-stat-change positive">+15.3% from last month</div>
                    <div class="widget-stat-actions">
                        <button class="widget-action-btn" onclick="handleWidgetAction('revenue', 'drill-down')" title="View Details">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="widget-stat widget-stat-orders">
                    <div class="widget-stat-header">
                        <div class="widget-stat-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <div class="widget-stat-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="widget-stat-value">1,247</div>
                    <div class="widget-stat-label">Orders This Month</div>
                    <div class="widget-stat-change positive">+8.2% from last month</div>
                </div>

                <div class="widget-stat widget-stat-customers">
                    <div class="widget-stat-header">
                        <div class="widget-stat-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="widget-stat-trend positive">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="widget-stat-value">847</div>
                    <div class="widget-stat-label">Active Customers</div>
                    <div class="widget-stat-change positive">+15.3% growth rate</div>
                </div>

                <div class="widget-stat widget-stat-alerts">
                    <div class="widget-stat-header">
                        <div class="widget-stat-icon">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="widget-stat-trend negative">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="widget-stat-value">23</div>
                    <div class="widget-stat-label">Low Stock Items</div>
                    <div class="widget-stat-change negative">5 items need restocking</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Graph Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon graphs">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Graph & Chart Cards</h3>
                    <p class="showcase-subtitle">Data visualization cards with charts and analytics</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('graphs')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="graphs-demo-grid">
                <div class="widget-chart">
                    <div class="widget-chart-header">
                        <div class="widget-chart-title-section">
                            <h4 class="widget-chart-title">Revenue Analytics</h4>
                            <p class="widget-chart-subtitle">Monthly performance overview</p>
                        </div>
                        <div class="widget-chart-actions">
                            <button class="btn btn-secondary btn-sm" onclick="handleChartAction('export')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Export
                            </button>
                            <button class="btn btn-ghost btn-sm" onclick="handleChartAction('fullscreen')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="widget-chart-body">
                        <div class="chart-container">
                            <div class="chart-placeholder">
                                <div class="chart-bars">
                                    <div class="chart-bar" style="height: 40%;" data-value="R 850K"></div>
                                    <div class="chart-bar" style="height: 60%;" data-value="R 1.2M"></div>
                                    <div class="chart-bar" style="height: 35%;" data-value="R 730K"></div>
                                    <div class="chart-bar" style="height: 75%;" data-value="R 1.8M"></div>
                                    <div class="chart-bar" style="height: 55%;" data-value="R 1.1M"></div>
                                    <div class="chart-bar" style="height: 85%;" data-value="R 2.1M"></div>
                                    <div class="chart-bar" style="height: 65%;" data-value="R 1.5M"></div>
                                </div>
                                <div class="chart-labels">
                                    <span>Jan</span>
                                    <span>Feb</span>
                                    <span>Mar</span>
                                    <span>Apr</span>
                                    <span>May</span>
                                    <span>Jun</span>
                                    <span>Jul</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-chart">
                    <div class="widget-chart-header">
                        <div class="widget-chart-title-section">
                            <h4 class="widget-chart-title">Sales Pipeline</h4>
                            <p class="widget-chart-subtitle">Opportunity breakdown</p>
                        </div>
                        <div class="widget-chart-actions">
                            <button class="btn btn-secondary btn-sm" onclick="handleChartAction('refresh')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Refresh
                            </button>
                        </div>
                    </div>
                    <div class="widget-chart-body">
                        <div class="pipeline-grid">
                            <div class="pipeline-stage">
                                <div class="pipeline-value">R 5.2M</div>
                                <div class="pipeline-label">Qualified Leads</div>
                                <div class="pipeline-count">24 opportunities</div>
                            </div>
                            <div class="pipeline-stage">
                                <div class="pipeline-value">R 3.1M</div>
                                <div class="pipeline-label">Proposal Stage</div>
                                <div class="pipeline-count">15 opportunities</div>
                            </div>
                            <div class="pipeline-stage">
                                <div class="pipeline-value">R 1.8M</div>
                                <div class="pipeline-label">Negotiation</div>
                                <div class="pipeline-count">8 opportunities</div>
                            </div>
                            <div class="pipeline-stage">
                                <div class="pipeline-value">R 890K</div>
                                <div class="pipeline-label">Closed Won</div>
                                <div class="pipeline-count">3 this month</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Access Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon quick">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Quick Access Cards</h3>
                    <p class="showcase-subtitle">Fast navigation and commonly used actions</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('quick')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="quick-access-grid">
                <div class="quick-card" onclick="handleQuickAction('new-order')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <div class="quick-title">New Order</div>
                    <div class="quick-subtitle">Create purchase order</div>
                </div>

                <div class="quick-card" onclick="handleQuickAction('add-customer')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="quick-title">Add Customer</div>
                    <div class="quick-subtitle">Register new client</div>
                </div>

                <div class="quick-card" onclick="handleQuickAction('inventory')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="quick-title">Inventory</div>
                    <div class="quick-subtitle">Manage stock levels</div>
                </div>

                <div class="quick-card" onclick="handleQuickAction('reports')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div class="quick-title">Reports</div>
                    <div class="quick-subtitle">Business analytics</div>
                </div>

                <div class="quick-card" onclick="handleQuickAction('quotes')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="quick-title">Quotes</div>
                    <div class="quick-subtitle">Generate estimates</div>
                </div>

                <div class="quick-card" onclick="handleQuickAction('settings')">
                    <div class="quick-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="quick-title">Settings</div>
                    <div class="quick-subtitle">System configuration</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Notes Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon notes">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Notes & Reminders</h3>
                    <p class="showcase-subtitle">Important messages and task reminders</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('notes')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="notes-demo-grid">
                <div class="notes-card">
                    <div class="notes-header">
                        <div class="notes-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="notes-title">Important Reminder</div>
                        <div class="notes-priority">High</div>
                    </div>
                    <div class="notes-content">
                        Monthly inventory count scheduled for Friday, October 15th. Please ensure all purchase orders are processed by Thursday evening to avoid discrepancies.
                    </div>
                    <div class="notes-meta">
                        <div class="notes-author">Created by John Smith</div>
                        <div class="notes-date">Due: Oct 15, 2024</div>
                    </div>
                </div>

                <div class="notes-card notes-card-info">
                    <div class="notes-header">
                        <div class="notes-icon">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="notes-title">System Update</div>
                        <div class="notes-priority">Info</div>
                    </div>
                    <div class="notes-content">
                        New features deployed: Enhanced reporting dashboard, automated email notifications for low stock alerts, and improved mobile responsiveness.
                    </div>
                    <div class="notes-meta">
                        <div class="notes-author">System Admin</div>
                        <div class="notes-date">Posted: Oct 10, 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Activity History Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon activity">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Activity History</h3>
                    <p class="showcase-subtitle">Recent system activities and user actions</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('activity')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="activity-demo-grid">
                <div class="widget-activity">
                    <div class="widget-activity-header">
                        <h4 class="widget-activity-title">Recent Activity</h4>
                        <div class="widget-activity-actions">
                            <button class="btn btn-ghost btn-sm" onclick="handleActivityAction('refresh')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </button>
                            <button class="btn btn-secondary btn-sm" onclick="handleActivityAction('view-all')">View All</button>
                        </div>
                    </div>
                    <div class="widget-activity-body">
                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-icon activity-success">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Order #ORD-2024-156 completed</div>
                                    <div class="activity-meta">Acme Manufacturing • 2 minutes ago</div>
                                </div>
                                <div class="activity-value">R 45,670</div>
                            </div>
                            
                            <div class="activity-item">
                                <div class="activity-icon activity-user">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">New customer registration</div>
                                    <div class="activity-meta">TechCorp Solutions • 15 minutes ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon activity-warning">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Low stock alert: Widget Assembly</div>
                                    <div class="activity-meta">Inventory System • 1 hour ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon activity-quote">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Quote #QUO-2024-089 approved</div>
                                    <div class="activity-meta">BuildCorp Ltd • 2 hours ago</div>
                                </div>
                                <div class="activity-value">R 123,450</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon summary">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Summary Cards</h3>
                    <p class="showcase-subtitle">Executive summaries and key performance indicators</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('summary')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="summary-demo-grid">
                <div class="summary-card">
                    <div class="summary-header">
                        <div class="summary-icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                            </svg>
                        </div>
                        <div class="summary-content">
                            <h4 class="summary-title">Q3 Performance Summary</h4>
                            <p class="summary-subtitle">July - September 2024 Results</p>
                        </div>
                    </div>
                    <div class="summary-metrics">
                        <div class="summary-metric">
                            <div class="summary-metric-value">R 7.2M</div>
                            <div class="summary-metric-label">Total Revenue</div>
                        </div>
                        <div class="summary-metric">
                            <div class="summary-metric-value">3,847</div>
                            <div class="summary-metric-label">Orders Processed</div>
                        </div>
                        <div class="summary-metric">
                            <div class="summary-metric-value">97.3%</div>
                            <div class="summary-metric-label">Customer Satisfaction</div>
                        </div>
                        <div class="summary-metric">
                            <div class="summary-metric-value">23%</div>
                            <div class="summary-metric-label">Growth Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Overview Cards --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon overview">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Overview Cards</h3>
                    <p class="showcase-subtitle">Comprehensive business overview and trending metrics</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyCardCode('overview')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="overview-demo-grid">
                <div class="overview-card">
                    <div class="overview-header">
                        <div class="overview-title">Business Overview</div>
                        <div class="overview-period">October 2024 • Week 2</div>
                    </div>
                    <div class="overview-body">
                        <div class="overview-grid">
                            <div class="overview-item">
                                <div class="overview-value">R 1.2M</div>
                                <div class="overview-label">Weekly Revenue</div>
                                <div class="overview-change positive">+12% vs last week</div>
                            </div>
                            <div class="overview-item">
                                <div class="overview-value">347</div>
                                <div class="overview-label">New Orders</div>
                                <div class="overview-change positive">+8% vs last week</div>
                            </div>
                            <div class="overview-item">
                                <div class="overview-value">23</div>
                                <div class="overview-label">New Customers</div>
                                <div class="overview-change positive">+15% vs last week</div>
                            </div>
                            <div class="overview-item">
                                <div class="overview-value">94.5%</div>
                                <div class="overview-label">Order Fulfillment</div>
                                <div class="overview-change negative">-2% vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Implementation Examples --}}
    <div class="card-showcase">
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
            <button class="copy-btn" onclick="copyCardCode('implementation')" title="Copy HTML Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            <div class="code-examples">
                <div class="code-example-card">
                    <h4 class="code-example-title">Basic Card Structure</h4>
                    <pre class="code-block"><code>&lt;!-- Basic Card with Header and Footer --&gt;
&lt;div class="card"&gt;
    &lt;div class="card-header"&gt;
        &lt;div class="card-header-content"&gt;
            &lt;h5 class="card-header-title"&gt;Card Title&lt;/h5&gt;
            &lt;div class="card-header-actions"&gt;
                &lt;button class="btn btn-ghost btn-sm"&gt;Action&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="card-body"&gt;
        &lt;p class="card-text"&gt;Card content goes here&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="card-footer"&gt;
        &lt;div class="card-footer-actions"&gt;
            &lt;button class="btn btn-primary btn-sm"&gt;Save&lt;/button&gt;
            &lt;button class="btn btn-secondary btn-sm"&gt;Cancel&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Widget Stat Card</h4>
                    <pre class="code-block"><code>&lt;!-- Dashboard Widget Card --&gt;
&lt;div class="widget-stat widget-stat-revenue"&gt;
    &lt;div class="widget-stat-header"&gt;
        &lt;div class="widget-stat-icon"&gt;
            &lt;svg class="w-6 h-6"&gt;...&lt;/svg&gt;
        &lt;/div&gt;
        &lt;div class="widget-stat-trend positive"&gt;
            &lt;svg class="w-4 h-4"&gt;...&lt;/svg&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="widget-stat-value"&gt;R 2,450,000&lt;/div&gt;
    &lt;div class="widget-stat-label"&gt;Monthly Revenue&lt;/div&gt;
    &lt;div class="widget-stat-change positive"&gt;+15.3% from last month&lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">Quick Access Card</h4>
                    <pre class="code-block"><code>&lt;!-- Quick Action Card --&gt;
&lt;div class="quick-card" onclick="handleQuickAction('new-order')"&gt;
    &lt;div class="quick-icon"&gt;
        &lt;svg class="w-6 h-6"&gt;...&lt;/svg&gt;
    &lt;/div&gt;
    &lt;div class="quick-title"&gt;New Order&lt;/div&gt;
    &lt;div class="quick-subtitle"&gt;Create purchase order&lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="code-example-card">
                    <h4 class="code-example-title">CSS Theme Variables</h4>
                    <pre class="code-block"><code>/* ManuCore Theme Variables */
:root {
    /* Brand Colors */
    --brand-50: #eff6ff;
    --brand-100: #dbeafe;
    --brand-600: #2563eb;
    --brand-700: #1d4ed8;
    
    /* Semantic Colors */
    --success-600: #16a34a;
    --warning-600: #d97706;
    --danger-600: #dc2626;
    
    /* Layout */
    --radius-lg: 0.5rem;
    --radius-xl: 0.75rem;
    --space-4: 1rem;
    --space-6: 1.5rem;
}

/* Widget Stat Variants */
.widget-stat-revenue .widget-stat-icon {
    background: var(--brand-100);
    color: var(--brand-600);
}

.widget-stat-orders .widget-stat-icon {
    background: var(--success-100);
    color: var(--success-600);
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

/* Card Showcases */
.card-showcase {
    background: white;
    border-radius: var(--radius-3xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-slow);
    margin-bottom: var(--space-8);
}

.card-showcase:hover {
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

.showcase-icon.stats {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.graphs {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.quick {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

.showcase-icon.notes {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.activity {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.summary {
    background: linear-gradient(135deg, var(--neutral-600), var(--neutral-800));
}

.showcase-icon.overview {
    background: linear-gradient(135deg, var(--brand-600), var(--brand-800));
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

/* Card Demo Grids */
.card-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.card-demo-section {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.card-demo-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    text-align: center;
    margin-bottom: var(--space-2);
}

/* Card Components */
.card-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-2);
}

.card-text {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    line-height: 1.5;
    margin-bottom: var(--space-3);
}

.card-meta {
    display: flex;
    flex-direction: column;
    gap: var(--space-2);
}

.card-meta-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: var(--text-sm);
}

.card-meta-label {
    color: var(--neutral-500);
    font-weight: 500;
}

.card-meta-value {
    color: var(--neutral-900);
    font-weight: 600;
}

.card-header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}

.card-header-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0;
}

.card-header-actions {
    display: flex;
    gap: var(--space-2);
}

.card-footer-actions {
    display: flex;
    gap: var(--space-2);
    justify-content: flex-end;
}

/* Widget Stats */
.stats-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-6);
}

.widget-stat-revenue .widget-stat-icon {
    background: var(--brand-100);
    color: var(--brand-600);
}

.widget-stat-orders .widget-stat-icon {
    background: var(--success-100);
    color: var(--success-600);
}

.widget-stat-customers .widget-stat-icon {
    background: var(--warning-100);
    color: var(--warning-600);
}

.widget-stat-alerts .widget-stat-icon {
    background: var(--danger-100);
    color: var(--danger-600);
}

.widget-stat-trend.positive {
    background: var(--success-100);
    color: var(--success-600);
}

.widget-stat-trend.negative {
    background: var(--danger-100);
    color: var(--danger-600);
}

.widget-action-btn {
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

.widget-action-btn:hover {
    background: var(--brand-50);
    color: var(--brand-600);
    transform: translateY(-1px);
}

/* Graph Cards */
.graphs-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--space-6);
}

.widget-chart {
    background: white;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
}

.widget-chart-header {
    padding: var(--space-6);
    border-bottom: 1px solid var(--neutral-200);
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.widget-chart-title-section {
    flex: 1;
}

.widget-chart-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.widget-chart-subtitle {
    font-size: var(--text-sm);
    color: var(--neutral-600);
}

.widget-chart-actions {
    display: flex;
    gap: var(--space-2);
}

.widget-chart-body {
    padding: var(--space-6);
}

.chart-container {
    height: 200px;
    position: relative;
}

.chart-placeholder {
    height: 100%;
    background: linear-gradient(135deg, var(--brand-50), var(--brand-100));
    border-radius: var(--radius-lg);
    position: relative;
    overflow: hidden;
}

.chart-bars {
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
    height: 60%;
    display: flex;
    align-items: end;
    gap: 4px;
}

.chart-bar {
    flex: 1;
    background: var(--brand-600);
    border-radius: 2px 2px 0 0;
    transition: all var(--transition-fast);
    cursor: pointer;
    position: relative;
}

.chart-bar:hover {
    background: var(--brand-700);
    transform: translateY(-2px);
}

.chart-bar:hover::after {
    content: attr(data-value);
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--neutral-900);
    color: white;
    padding: 4px 8px;
    border-radius: var(--radius-md);
    font-size: var(--text-xs);
    white-space: nowrap;
}

.chart-labels {
    position: absolute;
    bottom: 0;
    left: 20px;
    right: 20px;
    height: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: var(--text-xs);
    color: var(--neutral-600);
}

.pipeline-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: var(--space-4);
}

.pipeline-stage {
    text-align: center;
    padding: var(--space-4);
    background: var(--brand-50);
    border-radius: var(--radius-lg);
    border: 1px solid var(--brand-200);
}

.pipeline-value {
    font-size: var(--text-xl);
    font-weight: 700;
    color: var(--brand-600);
    margin-bottom: var(--space-1);
}

.pipeline-label {
    font-size: var(--text-sm);
    color: var(--neutral-700);
    margin-bottom: var(--space-1);
}

.pipeline-count {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

/* Quick Access Cards */
.quick-access-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: var(--space-4);
}

.quick-card {
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    text-align: center;
    transition: all var(--transition-base);
    cursor: pointer;
}

.quick-card:hover {
    background: var(--brand-50);
    border-color: var(--brand-300);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.quick-icon {
    width: 56px;
    height: 56px;
    background: var(--brand-100);
    color: var(--brand-600);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-3);
    transition: all var(--transition-fast);
}

.quick-card:hover .quick-icon {
    background: var(--brand-600);
    color: white;
    transform: scale(1.1);
}

.quick-title {
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.quick-subtitle {
    font-size: var(--text-xs);
    color: var(--neutral-600);
}

/* Notes Cards */
.notes-demo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--space-6);
}

.notes-card {
    background: var(--warning-50);
    border: 1px solid var(--warning-200);
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    position: relative;
}

.notes-card.notes-card-info {
    background: var(--brand-50);
    border-color: var(--brand-200);
}

.notes-card::before {
    content: '';
    position: absolute;
    top: var(--space-4);
    left: var(--space-4);
    width: 16px;
    height: 16px;
    background: var(--warning-400);
    border-radius: var(--radius-full);
}

.notes-card.notes-card-info::before {
    background: var(--brand-400);
}

.notes-header {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    margin-bottom: var(--space-4);
    padding-left: var(--space-6);
}

.notes-icon {
    width: 40px;
    height: 40px;
    background: var(--warning-100);
    color: var(--warning-600);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
}

.notes-card.notes-card-info .notes-icon {
    background: var(--brand-100);
    color: var(--brand-600);
}

.notes-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    flex: 1;
}

.notes-priority {
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 600;
    background: var(--warning-200);
    color: var(--warning-800);
}

.notes-card.notes-card-info .notes-priority {
    background: var(--brand-200);
    color: var(--brand-800);
}

.notes-content {
    font-size: var(--text-sm);
    color: var(--neutral-700);
    line-height: 1.6;
    margin-bottom: var(--space-4);
    padding-left: var(--space-6);
}

.notes-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: var(--text-xs);
    color: var(--neutral-600);
    padding-left: var(--space-6);
}

/* Activity Cards */
.activity-demo-grid {
    display: grid;
    gap: var(--space-6);
}

.widget-activity {
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-2xl);
    overflow: hidden;
}

.widget-activity-header {
    padding: var(--space-6);
    border-bottom: 1px solid var(--neutral-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.widget-activity-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.widget-activity-actions {
    display: flex;
    gap: var(--space-2);
}

.widget-activity-body {
    padding: var(--space-6);
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: var(--space-3);
    padding: var(--space-3);
    border-radius: var(--radius-lg);
    transition: background var(--transition-fast);
}

.activity-item:hover {
    background: var(--neutral-50);
}

.activity-icon {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.activity-icon.activity-success {
    background: var(--success-100);
    color: var(--success-600);
}

.activity-icon.activity-user {
    background: var(--brand-100);
    color: var(--brand-600);
}

.activity-icon.activity-warning {
    background: var(--warning-100);
    color: var(--warning-600);
}

.activity-icon.activity-quote {
    background: var(--neutral-200);
    color: var(--neutral-600);
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

.activity-meta {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.activity-value {
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--success-600);
    flex-shrink: 0;
}

/* Summary Cards */
.summary-demo-grid {
    display: grid;
    gap: var(--space-6);
}

.summary-card {
    background: linear-gradient(135deg, var(--neutral-600), var(--neutral-800));
    color: white;
    border-radius: var(--radius-2xl);
    padding: var(--space-8);
    position: relative;
    overflow: hidden;
}

.summary-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1));
    pointer-events: none;
}

.summary-header {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: var(--space-6);
    position: relative;
    z-index: 1;
}

.summary-icon {
    width: 64px;
    height: 64px;
    background: rgba(255,255,255,0.2);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.summary-content {
    flex: 1;
}

.summary-title {
    font-size: var(--text-2xl);
    font-weight: 700;
    margin-bottom: var(--space-1);
}

.summary-subtitle {
    opacity: 0.9;
    font-size: var(--text-sm);
}

.summary-metrics {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: var(--space-6);
    position: relative;
    z-index: 1;
}

.summary-metric {
    text-align: center;
}

.summary-metric-value {
    font-size: var(--text-xl);
    font-weight: 700;
    margin-bottom: var(--space-1);
}

.summary-metric-label {
    font-size: var(--text-xs);
    opacity: 0.8;
}

/* Overview Cards */
.overview-demo-grid {
    display: grid;
    gap: var(--space-6);
}

.overview-card {
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-2xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.overview-header {
    padding: var(--space-6);
    background: linear-gradient(135deg, var(--brand-600), var(--brand-700));
    color: white;
}

.overview-title {
    font-size: var(--text-xl);
    font-weight: 700;
    margin-bottom: var(--space-2);
}

.overview-period {
    font-size: var(--text-sm);
    opacity: 0.9;
}

.overview-body {
    padding: var(--space-6);
}

.overview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: var(--space-6);
}

.overview-item {
    text-align: center;
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    background: var(--neutral-50);
    border: 1px solid var(--neutral-200);
}

.overview-value {
    font-size: var(--text-2xl);
    font-weight: 700;
    color: var(--brand-600);
    margin-bottom: var(--space-1);
}

.overview-label {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-2);
}

.overview-change {
    font-size: var(--text-xs);
    font-weight: 500;
}

.overview-change.positive {
    color: var(--success-600);
}

.overview-change.negative {
    color: var(--danger-600);
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

[data-theme="dark"] .card-showcase {
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

[data-theme="dark"] .card-footer {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .widget-chart,
[data-theme="dark"] .widget-activity,
[data-theme="dark"] .overview-card {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .widget-chart-header,
[data-theme="dark"] .widget-activity-header {
    border-color: var(--neutral-400);
}

[data-theme="dark"] .activity-item:hover {
    background: var(--neutral-200);
}

[data-theme="dark"] .notes-card {
    background: var(--warning-950);
    border-color: var(--warning-700);
}

[data-theme="dark"] .notes-card.notes-card-info {
    background: var(--brand-950);
    border-color: var(--brand-700);
}

[data-theme="dark"] .overview-item {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .quick-card {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .quick-card:hover {
    background: var(--brand-950);
    border-color: var(--brand-700);
}

[data-theme="dark"] .pipeline-stage {
    background: var(--brand-950);
    border-color: var(--brand-700);
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
    
    .card-demo-grid,
    .stats-demo-grid,
    .graphs-demo-grid,
    .quick-access-grid,
    .notes-demo-grid,
    .activity-demo-grid,
    .summary-demo-grid,
    .overview-demo-grid {
        grid-template-columns: 1fr;
    }
    
    .pipeline-grid,
    .overview-grid,
    .summary-metrics {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .chart-bars {
        left: 10px;
        right: 10px;
    }
    
    .chart-labels {
        left: 10px;
        right: 10px;
    }
}
</style>
@endpush

@push('scripts')
@verbatim
<script>
// Card interaction functions
function handleCardAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Card action: ${action}`, 'info');
    }
    console.log(`Card action: ${action}`);
}

function handleWidgetAction(widget, action) {
    if (window.ManuCore) {
        ManuCore.showToast(`${widget} widget: ${action}`, 'info');
    }
    console.log(`Widget action: ${widget} - ${action}`);
}

function handleChartAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Chart action: ${action}`, 'info');
    }
    console.log(`Chart action: ${action}`);
}

function handleQuickAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Quick action: ${action}`, 'success');
    }
    console.log(`Quick action: ${action}`);
}

function handleActivityAction(action) {
    if (window.ManuCore) {
        ManuCore.showToast(`Activity action: ${action}`, 'info');
    }
    console.log(`Activity action: ${action}`);
}

function copyCardCode(category) {
    const cardExamples = {
        basic: `<!-- Basic Card Structure -->
<div class="card">
    <div class="card-header">
        <div class="card-header-content">
            <h5 class="card-header-title">Card Title</h5>
            <div class="card-header-actions">
                <button class="btn btn-ghost btn-sm">Action</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">Card content goes here</p>
    </div>
    <div class="card-footer">
        <div class="card-footer-actions">
            <button class="btn btn-primary btn-sm">Save</button>
            <button class="btn btn-secondary btn-sm">Cancel</button>
        </div>
    </div>
</div>`,

        stats: `<!-- Statistics Widget Card -->
<div class="widget-stat widget-stat-revenue">
    <div class="widget-stat-header">
        <div class="widget-stat-icon">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
            </svg>
        </div>
        <div class="widget-stat-trend positive">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
            </svg>
        </div>
    </div>
    <div class="widget-stat-value">R 2,450,000</div>
    <div class="widget-stat-label">Monthly Revenue</div>
    <div class="widget-stat-change positive">+15.3% from last month</div>
</div>`,

        graphs: `<!-- Chart Widget Card -->
<div class="widget-chart">
    <div class="widget-chart-header">
        <div class="widget-chart-title-section">
            <h4 class="widget-chart-title">Revenue Analytics</h4>
            <p class="widget-chart-subtitle">Monthly performance overview</p>
        </div>
        <div class="widget-chart-actions">
            <button class="btn btn-secondary btn-sm" onclick="handleChartAction('export')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Export
            </button>
        </div>
    </div>
    <div class="widget-chart-body">
        <div class="chart-container">
            <!-- Chart content -->
        </div>
    </div>
</div>`,

        quick: `<!-- Quick Access Card -->
<div class="quick-card" onclick="handleQuickAction('new-order')">
    <div class="quick-icon">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
        </svg>
    </div>
    <div class="quick-title">New Order</div>
    <div class="quick-subtitle">Create purchase order</div>
</div>`,

        notes: `<!-- Notes Card -->
<div class="notes-card">
    <div class="notes-header">
        <div class="notes-icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <div class="notes-title">Important Reminder</div>
        <div class="notes-priority">High</div>
    </div>
    <div class="notes-content">
        Monthly inventory count scheduled for Friday, October 15th. Please ensure all purchase orders are processed by Thursday evening.
    </div>
    <div class="notes-meta">
        <div class="notes-author">Created by John Smith</div>
        <div class="notes-date">Due: Oct 15, 2024</div>
    </div>
</div>`,

        activity: `<!-- Activity Widget Card -->
<div class="widget-activity">
    <div class="widget-activity-header">
        <h4 class="widget-activity-title">Recent Activity</h4>
        <div class="widget-activity-actions">
            <button class="btn btn-secondary btn-sm" onclick="handleActivityAction('view-all')">View All</button>
        </div>
    </div>
    <div class="widget-activity-body">
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon activity-success">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Order completed</div>
                    <div class="activity-meta">2 minutes ago</div>
                </div>
            </div>
        </div>
    </div>
</div>`,

        summary: `<!-- Summary Card -->
<div class="summary-card">
    <div class="summary-header">
        <div class="summary-icon">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
            </svg>
        </div>
        <div class="summary-content">
            <h4 class="summary-title">Q3 Performance Summary</h4>
            <p class="summary-subtitle">July - September 2024 Results</p>
        </div>
    </div>
    <div class="summary-metrics">
        <div class="summary-metric">
            <div class="summary-metric-value">R 7.2M</div>
            <div class="summary-metric-label">Total Revenue</div>
        </div>
        <div class="summary-metric">
            <div class="summary-metric-value">3,847</div>
            <div class="summary-metric-label">Orders Processed</div>
        </div>
    </div>
</div>`,

        overview: `<!-- Overview Card -->
<div class="overview-card">
    <div class="overview-header">
        <div class="overview-title">Business Overview</div>
        <div class="overview-period">October 2024 • Week 2</div>
    </div>
    <div class="overview-body">
        <div class="overview-grid">
            <div class="overview-item">
                <div class="overview-value">R 1.2M</div>
                <div class="overview-label">Weekly Revenue</div>
                <div class="overview-change positive">+12% vs last week</div>
            </div>
            <div class="overview-item">
                <div class="overview-value">347</div>
                <div class="overview-label">New Orders</div>
                <div class="overview-change positive">+8% vs last week</div>
            </div>
        </div>
    </div>
</div>`,

        implementation: `<!-- Complete Card Implementation Examples -->

<!-- Basic Card -->
<div class="card">
    <div class="card-header">
        <div class="card-header-content">
            <h5 class="card-header-title">Card Title</h5>
        </div>
    </div>
    <div class="card-body">
        <p class="card-text">Card content</p>
    </div>
</div>

<!-- Stats Card -->
<div class="widget-stat widget-stat-revenue">
    <div class="widget-stat-header">
        <div class="widget-stat-icon">
            <svg class="w-6 h-6">...</svg>
        </div>
        <div class="widget-stat-trend positive">
            <svg class="w-4 h-4">...</svg>
        </div>
    </div>
    <div class="widget-stat-value">R 2,450,000</div>
    <div class="widget-stat-label">Monthly Revenue</div>
    <div class="widget-stat-change positive">+15.3% from last month</div>
</div>

<!-- Quick Access Card -->
<div class="quick-card" onclick="handleQuickAction('new-order')">
    <div class="quick-icon">
        <svg class="w-6 h-6">...</svg>
    </div>
    <div class="quick-title">New Order</div>
    <div class="quick-subtitle">Create purchase order</div>
</div>

<!-- Activity Card -->
<div class="widget-activity">
    <div class="widget-activity-header">
        <h4 class="widget-activity-title">Recent Activity</h4>
    </div>
    <div class="widget-activity-body">
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon activity-success">
                    <svg class="w-4 h-4">...</svg>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Order completed</div>
                    <div class="activity-meta">2 minutes ago</div>
                </div>
            </div>
        </div>
    </div>
</div>`
    };
    
    const code = cardExamples[category];
    if (!code) {
        console.error('Card category not found:', category);
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast(`${category.charAt(0).toUpperCase() + category.slice(1)} card code copied!`, 'success');
        }
    }).catch(() => {
        console.log('Card code:', code);
        if (window.ManuCore) {
            ManuCore.showToast('Code logged to console', 'info');
        }
    });
}

function exportCardLibrary() {
    const completeLibrary = `/* MANUCORE ERP - CARD LIBRARY */
Complete ERP/CRM card system with professional styling:
- Basic, Stats, Graph, Quick Access, Notes, Activity, Summary, Overview cards
- Multiple layouts and content types
- Interactive widgets with hover effects
- Chart placeholders and data visualization
- Full dark mode support
- Responsive design patterns
- Complete accessibility support
- South African business context (ZAR currency, manufacturing terminology)`;

    navigator.clipboard.writeText(completeLibrary).then(() => {
        if (window.ManuCore) {
            ManuCore.showToast('Complete card library exported!', 'success');
        }
    });
}

// Initialize card functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎴 ManuCore ERP Card Components Library loaded');
    
    // Add hover effects to chart bars
    const chartBars = document.querySelectorAll('.chart-bar');
    chartBars.forEach(bar => {
        bar.addEventListener('mouseenter', () => {
            bar.style.transform = 'translateY(-2px)';
        });
        
        bar.addEventListener('mouseleave', () => {
            bar.style.transform = '';
        });
    });
    
    // Add click handlers to quick cards
    const quickCards = document.querySelectorAll('.quick-card');
    quickCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-2px)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
    
    // Initialize tooltips
    if (window.ManuCore && ManuCore.initTooltips) {
        ManuCore.initTooltips();
    }
    
    // Enhanced card interactions
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
    
    // Widget stat interactions
    document.querySelectorAll('.widget-stat').forEach(widget => {
        widget.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        widget.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
    
    // Add ripple effect to activity items
    document.querySelectorAll('.activity-item').forEach(item => {
        item.addEventListener('click', function(e) {
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
                background: rgba(37, 99, 235, 0.1);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add CSS for ripple animation
    if (!document.querySelector('#card-ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'card-ripple-styles';
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
});
</script>
@endverbatim
@endpush