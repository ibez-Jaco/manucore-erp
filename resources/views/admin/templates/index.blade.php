@extends('layouts.panel')

@section('title', 'Developer Templates - ManuCore ERP')

@section('header', 'Developer Templates')
@section('subheader', 'Professional ERP component library and page templates for rapid development')

@section('page-actions')
    <button class="btn btn-primary" onclick="exportTemplateLibrary()">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
            <h2 class="hero-title">ManuCore ERP Template Gallery</h2>
            <p class="hero-description">Professional component library featuring copy-paste ready templates that demonstrate modern ERP patterns. All templates support dark mode, 4 color themes, and are optimized for manufacturing and business workflows.</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">75+</div>
                    <div class="stat-label">Components</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Categories</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Color Themes</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Mobile Ready</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Page Templates --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon pages">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Page Templates</h3>
                    <p class="showcase-subtitle">Complete page layouts for manufacturing and business applications</p>
                </div>
            </div>
            <button class="copy-btn" onclick="copyPageTemplates()" title="Copy Page Template Code">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
            </button>
        </div>
        <div class="showcase-body">
            @if(isset($templates) && isset($templates['pages']))
                <div class="page-templates-grid">
                    @foreach($templates['pages'] as $template)
                    <div class="page-template-card" onclick="handlePageTemplate('{{ $template['route'] ?? '#' }}', '{{ $template['name'] ?? 'Template' }}')">
                        <div class="page-template-body">
                            <div class="page-template-header">
                                <div class="page-template-icon">
                                    {{ $template['icon'] ?? 'T' }}
                                </div>
                                <div class="page-template-info">
                                    <h4 class="page-template-title">{{ $template['name'] ?? 'Template' }}</h4>
                                    <span class="badge badge-primary badge-sm">{{ $template['category'] ?? 'General' }}</span>
                                </div>
                            </div>
                            <p class="page-template-description">{{ $template['description'] ?? 'Template description' }}</p>
                            <div class="page-template-actions">
                                <a href="{{ route($template['route']) }}" class="btn btn-primary w-100" onclick="showTemplateToast('{{ $template['name'] ?? 'Template' }}')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View Template
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="empty-state-title">No page templates available</div>
                    <p class="empty-state-description">Templates data not found or not properly configured.</p>
                    <button class="btn btn-primary" onclick="showSetupAlert()">Setup Templates</button>
                </div>
            @endif
        </div>
    </div>

    {{-- Component Library --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon components">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Component Library</h3>
                    <p class="showcase-subtitle">Interactive UI components for forms, tables, buttons, cards, and more</p>
                </div>
            </div>
            <div class="showcase-badges">
                <span class="badge badge-primary">5 Categories</span>
                <span class="badge badge-neutral">100+ Examples</span>
            </div>
        </div>
        <div class="showcase-body">
            <div class="component-grid">
                
                {{-- Form Components --}}
                <div class="component-card" onclick="handleComponentNavigation('forms', '{{ route('admin.templates.components.forms') }}')">
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon success">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Form Components</h4>
                                <span class="badge badge-success badge-sm">25+ Patterns</span>
                            </div>
                        </div>
                        <p class="component-description">Comprehensive form system for data entry, validation, quotations, and business workflows. Includes customer forms, quote builders, and complex input patterns.</p>
                        <div class="component-tags">
                            <span class="component-tag success">Input Fields</span>
                            <span class="component-tag success">Validation</span>
                            <span class="component-tag success">Layouts</span>
                        </div>
                        <a href="{{ route('admin.templates.components.forms') }}" class="btn btn-success w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Explore Forms
                        </a>
                    </div>
                </div>

                {{-- Card Components --}}
                <div class="component-card" onclick="handleComponentNavigation('cards', '{{ route('admin.templates.components.cards') }}')">
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon primary">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Card Components</h4>
                                <span class="badge badge-primary badge-sm">15+ Layouts</span>
                            </div>
                        </div>
                        <p class="component-description">Professional card system for dashboards, data visualization, and content organization. Features KPI widgets, stat cards, and content displays.</p>
                        <div class="component-tags">
                            <span class="component-tag primary">Widgets</span>
                            <span class="component-tag primary">Statistics</span>
                            <span class="component-tag primary">Layouts</span>
                        </div>
                        <a href="{{ route('admin.templates.components.cards') }}" class="btn btn-primary w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Explore Cards
                        </a>
                    </div>
                </div>

                {{-- Button Components --}}
                <div class="component-card" onclick="handleComponentNavigation('buttons', '{{ route('admin.templates.components.buttons') }}')">
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon warning">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Button Components</h4>
                                <span class="badge badge-warning badge-sm">20+ Variants</span>
                            </div>
                        </div>
                        <p class="component-description">Complete button system with variants, sizes, states, and specialized actions for ERP workflows. Includes bulk actions and confirmation patterns.</p>
                        <div class="component-tags">
                            <span class="component-tag warning">Actions</span>
                            <span class="component-tag warning">States</span>
                            <span class="component-tag warning">Variants</span>
                        </div>
                        <a href="{{ route('admin.templates.components.buttons') }}" class="btn btn-warning w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Explore Buttons
                        </a>
                    </div>
                </div>

                {{-- Table Components --}}
                <div class="component-card" onclick="handleComponentNavigation('tables', '{{ route('admin.templates.components.tables') }}')">
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon purple">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 4v16m4-16v16m4-16v16M3 14h18"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Table Components</h4>
                                <span class="badge badge-secondary badge-sm" style="background: #8b5cf6; color: white;">6 Types</span>
                            </div>
                        </div>
                        <p class="component-description">Advanced data table patterns for customer management, quotes, orders, and business operations. Features search, filtering, sorting, and bulk actions.</p>
                        <div class="component-tags">
                            <span class="component-tag purple">Data Display</span>
                            <span class="component-tag purple">Filtering</span>
                            <span class="component-tag purple">Actions</span>
                        </div>
                        <a href="{{ route('admin.templates.components.tables') }}" class="btn btn-secondary w-100" style="background: #8b5cf6; border-color: #8b5cf6; color: white;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 4v16m4-16v16m4-16v16M3 14h18"/>
                            </svg>
                            Explore Tables
                        </a>
                    </div>
                </div>

                {{-- Misc Components (NEW) --}}
                <div class="component-card" onclick="handleComponentNavigation('misc', '{{ route('admin.templates.components.misc') }}')">
                    <div class="new-badge">NEW</div>
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon danger">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Misc Components</h4>
                                <span class="badge badge-danger badge-sm">10+ Elements</span>
                            </div>
                        </div>
                        <p class="component-description">Essential UI components including modals, alerts, badges, navigation, and interactive elements. Perfect for notifications, confirmations, and user feedback.</p>
                        <div class="component-tags">
                            <span class="component-tag danger">Modals</span>
                            <span class="component-tag danger">Alerts</span>
                            <span class="component-tag danger">Navigation</span>
                        </div>
                        <a href="{{ route('admin.templates.components.misc') }}" class="btn btn-danger w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                            </svg>
                            Explore Misc
                        </a>
                    </div>
                </div>

                {{-- Quick Overview Card --}}
                <div class="component-card overview-card">
                    <div class="component-card-body">
                        <div class="component-header">
                            <div class="component-icon neutral">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                            <div class="component-info">
                                <h4 class="component-title">Library Overview</h4>
                                <span class="badge badge-neutral badge-sm">Summary</span>
                            </div>
                        </div>
                        <div class="overview-stats">
                            <div class="stat-item">
                                <div class="stat-number brand">75+</div>
                                <div class="stat-label">Total Components</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number success">4</div>
                                <div class="stat-label">Color Themes</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number warning">100%</div>
                                <div class="stat-label">Mobile Ready</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number purple">∞</div>
                                <div class="stat-label">Customizable</div>
                            </div>
                        </div>
                        <button class="btn btn-neutral w-100" onclick="showLibraryStats()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            View Full Stats
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Developer Guide --}}
    <div class="guide-grid">
        
        {{-- CSS Integration --}}
        <div class="guide-card">
            <div class="guide-header">
                <h3 class="guide-title">CSS Integration Guide</h3>
            </div>
            <div class="guide-body">
                <h4 class="guide-subtitle">Theme System Usage</h4>
                <div class="code-example">
                    <div class="code-comment">/* Use CSS variables for theming */</div>
                    <div class="code-property">background: var(--brand-600);</div>
                    <div class="code-property">color: var(--neutral-900);</div>
                    <div class="code-property">border: 1px solid var(--neutral-200);</div>
                    <div class="code-comment">/* Dark mode automatic */</div>
                    <div class="code-property">[data-theme="dark"] .card { ... }</div>
                </div>
                
                <h4 class="guide-subtitle">Component Classes</h4>
                <div class="code-example">
                    <div class="code-property">btn btn-primary</div>
                    <div class="code-property">card card-body</div>
                    <div class="code-property">form-input form-label</div>
                    <div class="code-property">badge badge-success</div>
                </div>
                
                <button class="btn btn-primary btn-sm" onclick="copyIntegrationCode()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Copy CSS Guide
                </button>
            </div>
        </div>

        {{-- Quick Start Guide --}}
        <div class="guide-card">
            <div class="guide-header">
                <h3 class="guide-title">Quick Start Guide</h3>
            </div>
            <div class="guide-body">
                <h4 class="guide-subtitle">Implementation Steps</h4>
                <ol class="guide-list">
                    <li><strong>Browse</strong> component categories above</li>
                    <li><strong>Copy</strong> the component code you need</li>
                    <li><strong>Paste</strong> into your Blade templates</li>
                    <li><strong>Update</strong> data bindings and routes</li>
                    <li><strong>Test</strong> across themes and dark mode</li>
                </ol>
                
                <div class="pro-tip">
                    <div class="pro-tip-content">
                        <svg class="pro-tip-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="pro-tip-text">
                            <strong>Pro Tip:</strong> All components are Laravel 12 compatible and follow ManuCore ERP standards
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-success btn-sm" onclick="showQuickStartDemo()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Interactive Demo
                </button>
            </div>
        </div>

    </div>

    {{-- Performance Stats --}}
    <div class="card-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <div class="showcase-icon performance">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Library Performance</h3>
                    <p class="showcase-subtitle">Comprehensive statistics and performance metrics</p>
                </div>
            </div>
        </div>
        <div class="showcase-body">
            <div class="performance-grid">
                <div class="performance-item">
                    <div class="stat-number brand">75+</div>
                    <div class="stat-label">Ready Components</div>
                </div>
                <div class="performance-item">
                    <div class="stat-number success">4</div>
                    <div class="stat-label">Color Themes</div>
                </div>
                <div class="performance-item">
                    <div class="stat-number warning">100%</div>
                    <div class="stat-label">Mobile Compatible</div>
                </div>
                <div class="performance-item">
                    <div class="stat-number purple">∞</div>
                    <div class="stat-label">Customizable</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('head')
<style>
/* ManuCore ERP Template Gallery - Professional Styling System */

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

.showcase-icon.pages {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.showcase-icon.components {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.showcase-icon.performance {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
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

.showcase-badges {
    display: flex;
    gap: var(--space-2);
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

/* Page Templates */
.page-templates-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.page-template-card {
    background: white;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    transition: all var(--transition-base);
    cursor: pointer;
}

.page-template-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
    border-color: var(--brand-300);
}

.page-template-body {
    padding: var(--space-6);
}

.page-template-header {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    margin-bottom: var(--space-4);
}

.page-template-icon {
    width: 48px;
    height: 48px;
    background: var(--brand-100);
    color: var(--brand-600);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.page-template-info {
    flex: 1;
}

.page-template-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0 0 var(--space-1) 0;
}

.page-template-description {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-4);
    line-height: 1.5;
}

.page-template-actions {
    margin-top: var(--space-4);
}

/* Component Grid */
.component-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: var(--space-6);
}

.component-card {
    background: white;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    transition: all var(--transition-base);
    position: relative;
    cursor: pointer;
}

.component-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
    border-color: var(--brand-300);
}

.component-card.overview-card {
    background: linear-gradient(135deg, var(--neutral-50), var(--neutral-100));
}

.component-card-body {
    padding: var(--space-6);
}

.component-header {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin-bottom: var(--space-4);
}

.component-icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: var(--shadow-lg);
}

.component-icon.success {
    background: linear-gradient(135deg, var(--success-500), var(--success-600));
}

.component-icon.primary {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-600));
}

.component-icon.warning {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-600));
}

.component-icon.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.component-icon.danger {
    background: linear-gradient(135deg, var(--danger-500), var(--danger-600));
}

.component-icon.neutral {
    background: linear-gradient(135deg, var(--neutral-500), var(--neutral-600));
}

.component-info {
    flex: 1;
}

.component-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0 0 var(--space-1) 0;
    line-height: 1.2;
}

.component-description {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin: 0 0 var(--space-4) 0;
    line-height: 1.5;
}

.component-tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    margin-bottom: var(--space-4);
}

.component-tag {
    padding: var(--space-1) var(--space-2);
    font-size: var(--text-xs);
    border-radius: var(--radius-full);
    font-weight: 500;
}

.component-tag.success {
    background: var(--success-100);
    color: var(--success-700);
}

.component-tag.primary {
    background: var(--brand-100);
    color: var(--brand-700);
}

.component-tag.warning {
    background: var(--warning-100);
    color: var(--warning-700);
}

.component-tag.purple {
    background: #f3f4f6;
    color: #7c3aed;
}

.component-tag.danger {
    background: var(--danger-100);
    color: var(--danger-700);
}

/* NEW Badge */
.new-badge {
    position: absolute;
    top: var(--space-2);
    right: var(--space-2);
    background: var(--danger-500);
    color: white;
    font-size: var(--text-xs);
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
    font-weight: 600;
    z-index: 2;
}

/* Overview Stats */
.overview-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: var(--space-4);
    margin-bottom: var(--space-4);
}

.stat-number.brand { color: var(--brand-600); }
.stat-number.success { color: var(--success-600); }
.stat-number.warning { color: var(--warning-600); }
.stat-number.purple { color: #8b5cf6; }

/* Empty State */
.empty-state {
    text-align: center;
    padding: var(--space-12) var(--space-4);
}

.empty-state-icon {
    width: 80px;
    height: 80px;
    background: var(--neutral-100);
    color: var(--neutral-400);
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-4);
}

.empty-state-title {
    font-size: var(--text-xl);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-2);
}

.empty-state-description {
    font-size: var(--text-sm);
    color: var(--neutral-600);
    margin-bottom: var(--space-6);
}

/* Performance Grid */
.performance-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: var(--space-6);
    text-align: center;
}

.performance-item .stat-number {
    font-size: var(--text-3xl);
    margin-bottom: var(--space-2);
}

/* Guide Cards */
.guide-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
}

.guide-card {
    background: white;
    border-radius: var(--radius-2xl);
    border: 1px solid var(--neutral-200);
    overflow: hidden;
    transition: all var(--transition-base);
}

.guide-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.guide-header {
    padding: var(--space-6) var(--space-6) var(--space-4);
    background: var(--neutral-50);
    border-bottom: 1px solid var(--neutral-200);
}

.guide-body {
    padding: var(--space-6);
}

.guide-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
    margin: 0 0 var(--space-3) 0;
}

.guide-subtitle {
    font-size: var(--text-base);
    font-weight: 500;
    color: var(--neutral-900);
    margin: 0 0 var(--space-3) 0;
}

.code-example {
    padding: var(--space-4);
    font-family: var(--font-mono);
    font-size: var(--text-sm);
    border-radius: var(--radius-lg);
    border: 1px solid var(--neutral-200);
    background: var(--neutral-50);
    margin-bottom: var(--space-4);
    line-height: 1.5;
}

.code-comment {
    color: var(--neutral-500);
}

.code-property {
    color: var(--brand-600);
}

.guide-list {
    list-style: decimal;
    list-style-position: inside;
    margin: 0 0 var(--space-4) 0;
    padding: 0;
}

.guide-list li {
    font-size: var(--text-sm);
    color: var(--neutral-700);
    line-height: 1.6;
    margin-bottom: var(--space-3);
}

.guide-list li strong {
    color: var(--neutral-900);
}

.pro-tip {
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    background: var(--success-50);
    border: 1px solid var(--success-200);
    margin-bottom: var(--space-4);
}

.pro-tip-content {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.pro-tip-icon {
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    color: var(--success-600);
}

.pro-tip-text {
    font-size: var(--text-sm);
    color: var(--success-800);
}

.pro-tip-text strong {
    font-weight: 600;
}

/* Dark Mode Support */
[data-theme="dark"] .library-hero {
    background: linear-gradient(135deg, var(--neutral-200) 0%, var(--neutral-300) 100%);
}

[data-theme="dark"] .library-hero::before {
    background-image: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 10px,
        rgba(255, 255, 255, 0.03) 10px,
        rgba(255, 255, 255, 0.03) 20px
    );
}

[data-theme="dark"] .hero-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .hero-description {
    color: var(--neutral-300);
}

[data-theme="dark"] .card-showcase {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .showcase-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .showcase-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .showcase-subtitle {
    color: var(--neutral-300);
}

[data-theme="dark"] .component-card,
[data-theme="dark"] .page-template-card {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .component-card:hover,
[data-theme="dark"] .page-template-card:hover {
    border-color: var(--brand-400);
}

[data-theme="dark"] .component-title,
[data-theme="dark"] .page-template-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .component-description,
[data-theme="dark"] .page-template-description {
    color: var(--neutral-300);
}

[data-theme="dark"] .guide-card {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .guide-header {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .guide-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .guide-subtitle {
    color: var(--neutral-100);
}

[data-theme="dark"] .code-example {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .guide-list li {
    color: var(--neutral-300);
}

[data-theme="dark"] .guide-list li strong {
    color: var(--neutral-100);
}

[data-theme="dark"] .pro-tip {
    background: var(--success-950);
    border-color: var(--success-700);
}

[data-theme="dark"] .pro-tip-text {
    color: var(--success-300);
}

[data-theme="dark"] .stat-label {
    color: var(--neutral-300);
}

[data-theme="dark"] .empty-state-icon {
    background: var(--neutral-200);
    color: var(--neutral-500);
}

[data-theme="dark"] .empty-state-title {
    color: var(--neutral-100);
}

[data-theme="dark"] .empty-state-description {
    color: var(--neutral-400);
}

[data-theme="dark"] .page-template-icon {
    background: var(--brand-950);
    color: var(--brand-300);
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
    
    .component-grid,
    .page-templates-grid,
    .guide-grid {
        grid-template-columns: 1fr;
    }
    
    .performance-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .overview-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .performance-grid,
    .overview-stats {
        grid-template-columns: 1fr;
    }
    
    .component-header,
    .page-template-header {
        flex-direction: column;
        text-align: center;
        gap: var(--space-3);
    }
    
    .component-icon,
    .page-template-icon {
        align-self: center;
    }
}

/* Utility Classes */
.d-flex { display: flex; }
.align-center { align-items: center; }
.justify-center { justify-content: center; }
.justify-between { justify-content: space-between; }
.flex-1 { flex: 1; }
.flex-shrink-0 { flex-shrink: 0; }
.w-100 { width: 100%; }
.text-center { text-align: center; }

.gap-2 { gap: var(--space-2); }
.gap-3 { gap: var(--space-3); }
.gap-4 { gap: var(--space-4); }
.gap-6 { gap: var(--space-6); }

.grid { display: grid; }
.grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }

@media (min-width: 768px) {
    .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .md\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}

@media (min-width: 1024px) {
    .lg\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
}

.space-y-3 > * + * { margin-top: var(--space-3); }
.space-y-6 > * + * { margin-top: var(--space-6); }
.space-y-8 > * + * { margin-top: var(--space-8); }

.mb-1 { margin-bottom: var(--space-1); }
.mb-2 { margin-bottom: var(--space-2); }
.mb-3 { margin-bottom: var(--space-3); }
.mb-4 { margin-bottom: var(--space-4); }

.text-xs { font-size: var(--text-xs); }
.text-sm { font-size: var(--text-sm); }
.text-lg { font-size: var(--text-lg); }
.text-xl { font-size: var(--text-xl); }
.text-2xl { font-size: var(--text-2xl); }
.text-3xl { font-size: var(--text-3xl); }

.font-medium { font-weight: 500; }
.font-semibold { font-weight: 600; }
.font-bold { font-weight: 700; }

.rounded-full { border-radius: var(--radius-full); }
.px-2 { padding-left: var(--space-2); padding-right: var(--space-2); }
.py-1 { padding-top: var(--space-1); padding-bottom: var(--space-1); }
.p-4 { padding: var(--space-4); }

.list-decimal { list-style-type: decimal; }
.list-inside { list-style-position: inside; }
</style>
@endpush

@pushOnce('scripts')
@verbatim
<script>
// Export template library function
function exportTemplateLibrary() {
    if (window.Swal) {
        Swal.fire({
            title: 'Export Template Library',
            text: 'Preparing complete ManuCore ERP template library...',
            icon: 'info',
            showConfirmButton: false,
            timer: 2000,
            didOpen: () => {
                Swal.showLoading();
            }
        }).then(() => {
            const completeLibrary = `/* MANUCORE ERP - COMPLETE TEMPLATE LIBRARY */
Professional ERP/CRM template system with comprehensive components:
- Form Components: 25+ patterns for data entry, validation, and business workflows
- Card Components: 15+ layouts for dashboards, data visualization, and content organization
- Button Components: 20+ variants with sizes, states, and specialized ERP actions
- Table Components: 6 types with advanced search, filtering, and bulk operations
- Misc Components: 10+ elements for modals, alerts, badges, and navigation
- Page Templates: Complete page layouts for manufacturing and business applications

Features:
- Full dark mode support with CSS variables
- 4 color themes (Blue, Green, Purple, Orange)
- Mobile responsive design patterns
- South African business context (ZAR currency, manufacturing terminology)
- Laravel 12 compatible with proper namespacing
- Complete accessibility support
- Copy-paste ready code examples

ManuCore ERP Theme System:
- CSS Variable-based theming (--brand-*, --neutral-*, etc.)
- Automatic dark mode switching
- Professional gradient effects and shadows
- Consistent spacing and typography
- Manufacturing-optimized color schemes`;

            navigator.clipboard.writeText(completeLibrary).then(() => {
                Swal.fire({
                    title: 'Export Complete!',
                    text: 'Complete template library has been copied to clipboard',
                    icon: 'success',
                    confirmButtonColor: '#2171B5',
                    timer: 3000
                });
            }).catch(() => {
                console.log('Template Library:', completeLibrary);
                Swal.fire({
                    title: 'Export Information',
                    text: 'Library info has been logged to console',
                    icon: 'info',
                    confirmButtonColor: '#2171B5'
                });
            });
        });
    } else {
        // Fallback without SweetAlert
        console.log('Exporting template library...');
    }
}

// Handle page template interactions
function handlePageTemplate(route, name) {
    if (window.Swal && route !== '#') {
        Swal.fire({
            title: `Opening ${name}`,
            text: 'Loading page template...',
            icon: 'info',
            timer: 1500,
            showConfirmButton: false
        });
    }
}

// Show template toast
function showTemplateToast(templateName) {
    if (window.Swal) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'success',
            title: `Loading ${templateName} template`
        });
    }
}

// Handle component navigation
function handleComponentNavigation(componentType, route) {
    if (window.Swal) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });

        Toast.fire({
            icon: 'info',
            title: `Exploring ${componentType} components`
        });
    }
    
    console.log(`Navigating to ${componentType}:`, route);
}

// Copy page templates
function copyPageTemplates() {
    const pageTemplateCode = `<!-- ManuCore ERP Page Template Structure -->
@extends('layouts.panel')

@section('title', 'Page Title - ManuCore ERP')
@section('header', 'Page Header')
@section('subheader', 'Page description and context')

@section('page-actions')
    <button class="btn btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Action Button
    </button>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Page content here -->
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Content Section</h3>
            <p class="card-text">Page content goes here...</p>
        </div>
    </div>
</div>
@endsection`;

    navigator.clipboard.writeText(pageTemplateCode).then(() => {
        if (window.Swal) {
            Swal.fire({
                title: 'Page Template Copied!',
                text: 'Basic page template structure has been copied to clipboard',
                icon: 'success',
                confirmButtonColor: '#2171B5',
                timer: 3000
            });
        }
    });
}

// Copy integration code
function copyIntegrationCode() {
    const integrationCode = `/* ManuCore ERP CSS Integration */

/* Use CSS variables for theming */
.custom-component {
    background: var(--brand-600);
    color: var(--neutral-900);
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    padding: var(--space-4);
}

/* Dark mode automatic support */
[data-theme="dark"] .custom-component {
    background: var(--brand-400);
    color: var(--neutral-100);
    border-color: var(--neutral-400);
}

/* Component classes */
.btn.btn-primary { /* Primary button styles */ }
.card.card-body { /* Card container styles */ }
.form-input.form-label { /* Form element styles */ }
.badge.badge-success { /* Badge component styles */ }`;

    navigator.clipboard.writeText(integrationCode).then(() => {
        if (window.Swal) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });

            Toast.fire({
                icon: 'success',
                title: 'CSS integration guide copied!'
            });
        }
    });
}

// Show setup alert
function showSetupAlert() {
    if (window.Swal) {
        Swal.fire({
            title: 'Setup Templates',
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <p><strong>To set up page templates:</strong></p>
                    <ol style="margin: 15px 0; padding-left: 20px;">
                        <li>Create template configuration array</li>
                        <li>Define routes for each template</li>
                        <li>Add template metadata (name, description, icon)</li>
                        <li>Pass templates array to this view</li>
                    </ol>
                    <div style="background: #f8fafc; padding: 15px; border-radius: 8px; margin-top: 20px;">
                        <code>$templates = ['pages' => [...]];</code>
                    </div>
                </div>
            `,
            icon: 'info',
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#2171B5',
            showCancelButton: true,
            cancelButtonText: 'Documentation',
            width: '500px'
        }).then((result) => {
            if (result.isDismissed) {
                // Show documentation toast
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true
                });

                Toast.fire({
                    icon: 'info',
                    title: 'Check the Laravel docs for template setup'
                });
            }
        });
    }
}

// Show library stats
function showLibraryStats() {
    if (window.Swal) {
        Swal.fire({
            title: 'ManuCore ERP Library Statistics',
            html: `
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin: 20px 0;">
                    <div style="text-align: center; padding: 20px; background: #f8fafc; border-radius: 12px;">
                        <div style="font-size: 2rem; font-weight: bold; color: #2171B5; margin-bottom: 8px;">75+</div>
                        <div style="font-size: 14px; color: #6b7280;">Ready Components</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8fafc; border-radius: 12px;">
                        <div style="font-size: 2rem; font-weight: bold; color: #16a34a; margin-bottom: 8px;">5</div>
                        <div style="font-size: 14px; color: #6b7280;">Component Categories</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8fafc; border-radius: 12px;">
                        <div style="font-size: 2rem; font-weight: bold; color: #ea580c; margin-bottom: 8px;">4</div>
                        <div style="font-size: 14px; color: #6b7280;">Color Themes</div>
                    </div>
                    <div style="text-align: center; padding: 20px; background: #f8fafc; border-radius: 12px;">
                        <div style="font-size: 2rem; font-weight: bold; color: #8b5cf6; margin-bottom: 8px;">100%</div>
                        <div style="font-size: 14px; color: #6b7280;">Mobile Compatible</div>
                    </div>
                </div>
                <div style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, #2171B5, #1d4ed8); color: white; border-radius: 8px;">
                    <strong>Laravel 12 Ready</strong> • Dark Mode Support • Manufacturing Optimized
                </div>
            `,
            confirmButtonText: 'Explore Components',
            confirmButtonColor: '#2171B5',
            showCancelButton: true,
            cancelButtonText: 'Close',
            width: '600px'
        }).then((result) => {
            if (result.isConfirmed) {
                // Scroll to components section
                document.querySelector('.component-grid').scrollIntoView({ behavior: 'smooth' });
                
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });

                Toast.fire({
                    icon: 'info',
                    title: 'Scrolled to components section'
                });
            }
        });
    }
}

// Show quick start demo
function showQuickStartDemo() {
    if (window.Swal) {
        Swal.fire({
            title: 'Quick Start Interactive Demo',
            html: `
                <div style="text-align: left; margin: 20px 0;">
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin-bottom: 10px; color: #374151;">1. Copy Component Code</h4>
                        <div style="background: #f3f4f6; padding: 10px; border-radius: 6px; font-family: monospace; font-size: 12px;">
                            &lt;button class="btn btn-primary"&gt;Click Me&lt;/button&gt;
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <h4 style="margin-bottom: 10px; color: #374151;">2. Test Live Component</h4>
                        <button class="btn btn-primary" onclick="Swal.fire('Demo Button Clicked!', '', 'success')" style="background: #2171B5; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer;">
                            Demo Button
                        </button>
                    </div>
                    <div style="background: #ecfdf5; border: 1px solid #d1fae5; padding: 15px; border-radius: 8px;">
                        <div style="color: #065f46; font-weight: 600; margin-bottom: 5px;">✓ Ready to Use</div>
                        <div style="color: #047857; font-size: 14px;">All components include proper styling, interactions, and responsive design.</div>
                    </div>
                </div>
            `,
            confirmButtonText: 'Start Building',
            confirmButtonColor: '#2171B5',
            showCancelButton: true,
            cancelButtonText: 'Close Demo',
            width: '500px'
        });
    }
}

// Initialize template gallery
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎨 ManuCore ERP Template Gallery loaded');
    console.log('Current theme:', document.documentElement.getAttribute('data-theme') || 'light');
    console.log('Current accent:', document.documentElement.getAttribute('data-accent') || 'blue');
    
    // Add smooth loading animation to cards
    const cards = document.querySelectorAll('.component-card, .card-showcase, .page-template-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.5s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Enhanced hover effects for component cards
    document.querySelectorAll('.component-card, .page-template-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = 'var(--shadow-xl)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
    
    // Initialize tooltips if available
    if (window.ManuCore && ManuCore.initTooltips) {
        ManuCore.initTooltips();
    }
    
    // Add ripple effect to clickable elements
    document.querySelectorAll('.btn, .component-card, .page-template-card').forEach(element => {
        element.addEventListener('click', function(e) {
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
                z-index: 1000;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Add CSS for ripple animation
    if (!document.querySelector('#template-ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'template-ripple-styles';
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
    
    // Show welcome toast if SweetAlert is available
    if (window.Swal) {
        setTimeout(() => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: 'Welcome to ManuCore ERP Template Gallery!'
            });
        }, 1000);
    }
    
    // Performance monitoring
    if (window.performance) {
        const loadTime = window.performance.timing.loadEventEnd - window.performance.timing.navigationStart;
        console.log(`Template Gallery loaded in ${loadTime}ms`);
    }
});

// Utility function for component interactions
function handleComponentInteraction(componentType, action) {
    if (window.Swal) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });

        Toast.fire({
            icon: 'info',
            title: `${componentType}: ${action}`
        });
    }
    console.log(`Component interaction: ${componentType} - ${action}`);
}

// Enhanced error handling
window.addEventListener('error', function(e) {
    console.error('Template Gallery Error:', e.error);
    if (window.Swal) {
        Swal.fire({
            title: 'Template Gallery Error',
            text: 'An error occurred. Please check the console for details.',
            icon: 'error',
            confirmButtonColor: '#dc2626'
        });
    }
});

// Performance optimization for large component lists
function lazyLoadComponents() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('loaded');
                observer.unobserve(entry.target);
            }
        });
    });
    
    document.querySelectorAll('.component-card, .page-template-card').forEach(card => {
        observer.observe(card);
    });
}

// Initialize lazy loading after DOM content loaded
document.addEventListener('DOMContentLoaded', lazyLoadComponents);
</script>
@endverbatim
@endpushOnce