@extends('layouts.panel')

@section('title', 'Developer Templates - ManuCore ERP')

@section('header', 'Developer Templates')
@section('subheader', 'Professional ERP component library and page templates for rapid development')

@section('page-actions')
    <button class="btn btn-secondary" onclick="toggleTheme()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
        </svg>
        Dark Mode
    </button>
    <button class="btn btn-secondary" onclick="showAccentPicker()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
        </svg>
        Test Colors
    </button>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Welcome Hero Section --}}
    <div class="card">
        <div class="card-body">
            <div class="gap-6 d-flex align-center">
                <div class="justify-center d-flex align-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--brand-500), var(--brand-600)); border-radius: var(--radius-2xl); color: white; font-size: 2.5rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    📚
                </div>
                <div class="flex-1">
                    <h2 class="mb-3 text-3xl font-bold text-neutral-900">ManuCore ERP Template Gallery</h2>
                    <p class="mb-4 text-lg text-neutral-600">Professional component library featuring copy-paste ready templates that demonstrate modern ERP patterns. All templates support dark mode, 4 color themes, and are optimized for manufacturing and business workflows.</p>
                    <div class="flex-wrap gap-3 d-flex">
                        <span class="badge badge-primary">Laravel 12 Ready</span>
                        <span class="badge badge-success">Dark Mode Compatible</span>
                        <span class="badge badge-neutral">4 Color Themes</span>
                        <span class="badge badge-warning">Mobile Responsive</span>
                        <span class="badge badge-secondary">Manufacturing Optimized</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Theme Testing --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Quick Theme Testing</h3>
        </div>
        <div class="card-body">
            <p class="mb-4 text-sm text-neutral-600">Test how all templates look across different color themes and light/dark modes:</p>
            <div class="flex-wrap gap-3 d-flex">
                <button class="btn btn-primary btn-sm" onclick="setAccent('blue')" style="background: #2171B5; border-color: #2171B5;">
                    <div class="gap-2 d-flex align-center">
                        <div style="width: 12px; height: 12px; background: #2171B5; border-radius: 50%;"></div>
                        Blue Theme
                    </div>
                </button>
                <button class="btn btn-success btn-sm" onclick="setAccent('green')" style="background: #16a34a; border-color: #16a34a;">
                    <div class="gap-2 d-flex align-center">
                        <div style="width: 12px; height: 12px; background: #16a34a; border-radius: 50%;"></div>
                        Green Theme
                    </div>
                </button>
                <button class="btn btn-secondary btn-sm" onclick="setAccent('purple')" style="background: #8b5cf6; border-color: #8b5cf6; color: white;">
                    <div class="gap-2 d-flex align-center">
                        <div style="width: 12px; height: 12px; background: #8b5cf6; border-radius: 50%;"></div>
                        Purple Theme
                    </div>
                </button>
                <button class="btn btn-warning btn-sm" onclick="setAccent('orange')" style="background: #ea580c; border-color: #ea580c;">
                    <div class="gap-2 d-flex align-center">
                        <div style="width: 12px; height: 12px; background: #ea580c; border-radius: 50%;"></div>
                        Orange Theme
                    </div>
                </button>
                <div style="width: 1px; height: 24px; background: var(--neutral-300);"></div>
                <button class="btn btn-secondary btn-sm" onclick="toggleTheme()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    Toggle Dark Mode
                </button>
            </div>
        </div>
    </div>

    {{-- Component Library --}}
    <div class="card">
        <div class="card-header">
            <div class="justify-between d-flex align-center">
                <div>
                    <h3 class="text-xl font-semibold">Component Library</h3>
                    <p class="text-sm text-neutral-600">Interactive UI components for forms, tables, buttons, cards, and more</p>
                </div>
                <div class="gap-2 d-flex">
                    <span class="badge badge-primary">5 Categories</span>
                    <span class="badge badge-neutral">100+ Examples</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                
                {{-- Form Components --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200);">
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--success-100), var(--success-200)); color: var(--success-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                📝
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Form Components</h4>
                                <span class="badge badge-success badge-sm">25+ Patterns</span>
                            </div>
                        </div>
                        <p class="mb-4 text-sm text-neutral-600">Comprehensive form system for data entry, validation, quotations, and business workflows. Includes customer forms, quote builders, and complex input patterns.</p>
                        <div class="flex-wrap gap-2 mb-4 d-flex">
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--success-100); color: var(--success-700);">Input Fields</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--success-100); color: var(--success-700);">Validation</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--success-100); color: var(--success-700);">Layouts</span>
                        </div>
                        <a href="{{ route('admin.templates.components.forms') }}" class="btn btn-success w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Explore Forms
                        </a>
                    </div>
                </div>

                {{-- Card Components --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200);">
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--brand-100), var(--brand-200)); color: var(--brand-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                🗂️
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Card Components</h4>
                                <span class="badge badge-primary badge-sm">15+ Layouts</span>
                            </div>
                        </div>
                        <p class="mb-4 text-sm text-neutral-600">Professional card system for dashboards, data visualization, and content organization. Features KPI widgets, stat cards, and content displays.</p>
                        <div class="flex-wrap gap-2 mb-4 d-flex">
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--brand-100); color: var(--brand-700);">Widgets</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--brand-100); color: var(--brand-700);">Statistics</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--brand-100); color: var(--brand-700);">Layouts</span>
                        </div>
                        <a href="{{ route('admin.templates.components.cards') }}" class="btn btn-primary w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            Explore Cards
                        </a>
                    </div>
                </div>

                {{-- Button Components --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200);">
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--warning-100), var(--warning-200)); color: var(--warning-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                🔘
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Button Components</h4>
                                <span class="badge badge-warning badge-sm">20+ Variants</span>
                            </div>
                        </div>
                        <p class="mb-4 text-sm text-neutral-600">Complete button system with variants, sizes, states, and specialized actions for ERP workflows. Includes bulk actions and confirmation patterns.</p>
                        <div class="flex-wrap gap-2 mb-4 d-flex">
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--warning-100); color: var(--warning-700);">Actions</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--warning-100); color: var(--warning-700);">States</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--warning-100); color: var(--warning-700);">Variants</span>
                        </div>
                        <a href="{{ route('admin.templates.components.buttons') }}" class="btn btn-warning w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                            </svg>
                            Explore Buttons
                        </a>
                    </div>
                </div>

                {{-- Table Components --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200);">
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--purple-100), var(--purple-200)); color: var(--purple-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                🗃️
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Table Components</h4>
                                <span class="badge badge-secondary badge-sm" style="background: #8b5cf6; color: white;">6 Types</span>
                            </div>
                        </div>
                        <p class="mb-4 text-sm text-neutral-600">Advanced data table patterns for customer management, quotes, orders, and business operations. Features search, filtering, sorting, and bulk actions.</p>
                        <div class="flex-wrap gap-2 mb-4 d-flex">
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--purple-100); color: var(--purple-700);">Data Display</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--purple-100); color: var(--purple-700);">Filtering</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--purple-100); color: var(--purple-700);">Actions</span>
                        </div>
                        <a href="{{ route('admin.templates.components.tables') }}" class="btn btn-secondary w-100" style="background: #8b5cf6; border-color: #8b5cf6; color: white;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            Explore Tables
                        </a>
                    </div>
                </div>

                {{-- Misc Components (NEW) --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200); position: relative;">
                    <div style="position: absolute; top: 8px; right: 8px; background: var(--danger-500); color: white; font-size: 10px; padding: 2px 6px; border-radius: 12px; font-weight: 600;">NEW</div>
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--danger-100), var(--danger-200)); color: var(--danger-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                🎨
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Misc Components</h4>
                                <span class="badge badge-danger badge-sm">10+ Elements</span>
                            </div>
                        </div>
                        <p class="mb-4 text-sm text-neutral-600">Essential UI components including modals, alerts, badges, navigation, and interactive elements. Perfect for notifications, confirmations, and user feedback.</p>
                        <div class="flex-wrap gap-2 mb-4 d-flex">
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--danger-100); color: var(--danger-700);">Modals</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--danger-100); color: var(--danger-700);">Alerts</span>
                            <span class="px-2 py-1 text-xs rounded-full" style="background: var(--danger-100); color: var(--danger-700);">Navigation</span>
                        </div>
                        <a href="{{ route('admin.templates.components.misc') }}" class="btn btn-danger w-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                            Explore Misc
                        </a>
                    </div>
                </div>

                {{-- Quick Overview Card --}}
                <div class="transition-all card hover:shadow-lg" style="border: 1px solid var(--neutral-200); background: linear-gradient(135deg, var(--neutral-50), var(--neutral-100));">
                    <div class="card-body">
                        <div class="gap-4 mb-4 d-flex align-center">
                            <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--neutral-200), var(--neutral-300)); color: var(--neutral-700); border-radius: var(--radius-xl); font-size: 1.5rem;">
                                📊
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-lg font-semibold text-neutral-900">Library Overview</h4>
                                <span class="badge badge-neutral badge-sm">Summary</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="gap-3 d-flex align-center">
                                <div class="text-2xl font-bold text-brand-600">75+</div>
                                <div class="text-sm text-neutral-600">Total Components</div>
                            </div>
                            <div class="gap-3 d-flex align-center">
                                <div class="text-2xl font-bold text-success-600">4</div>
                                <div class="text-sm text-neutral-600">Color Themes</div>
                            </div>
                            <div class="gap-3 d-flex align-center">
                                <div class="text-2xl font-bold text-warning-600">100%</div>
                                <div class="text-sm text-neutral-600">Mobile Ready</div>
                            </div>
                        </div>
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
            </div>
        </div>

    </div>

    {{-- Performance Stats --}}
    <div class="component-showcase">
        <div class="showcase-header">
            <div class="showcase-info">
                <h3 class="text-lg font-semibold">Library Performance</h3>
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

@push('scripts')
<script>
// Export template library function
function exportTemplateLibrary() {
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
        if (window.ManuCore) {
            ManuCore.showToast('Complete template library exported!', 'success');
        }
    }).catch(() => {
        console.log('Template Library:', completeLibrary);
        if (window.ManuCore) {
            ManuCore.showToast('Library info logged to console', 'info');
        }
    });
}

// Initialize template gallery
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎨 ManuCore ERP Template Gallery loaded');
    console.log('Current theme:', document.documentElement.getAttribute('data-theme') || 'light');
    console.log('Current accent:', document.documentElement.getAttribute('data-accent') || 'blue');
    
    // Add smooth loading animation to cards
    const cards = document.querySelectorAll('.component-card, .component-showcase');
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
    document.querySelectorAll('.component-card').forEach(card => {
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
    document.querySelectorAll('.btn, .component-card').forEach(element => {
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
    
    // Performance monitoring
    if (window.performance) {
        const loadTime = window.performance.timing.loadEventEnd - window.performance.timing.navigationStart;
        console.log(`Template Gallery loaded in ${loadTime}ms`);
    }
});

// Utility function for component interactions
function handleComponentInteraction(componentType, action) {
    if (window.ManuCore) {
        ManuCore.showToast(`${componentType}: ${action}`, 'info');
    }
    console.log(`Component interaction: ${componentType} - ${action}`);
}

// Enhanced error handling
window.addEventListener('error', function(e) {
    console.error('Template Gallery Error:', e.error);
    if (window.ManuCore) {
        ManuCore.showToast('An error occurred. Please check the console.', 'error');
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
    
    document.querySelectorAll('.component-card').forEach(card => {
        observer.observe(card);
    });
}

// Initialize lazy loading after DOM content loaded
document.addEventListener('DOMContentLoaded', lazyLoadComponents);
</script>
@endpush

@push('head')
<style>
/* Custom styles for the template gallery */
.purple-600 {
    color: #8b5cf6 !important;
}

.theme-picker-modal {
    border-radius: 16px !important;
}

/* Smooth hover effects */
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

/* Badge color variations */
.badge-secondary {
    background: #6b7280;
    color: white;
}

/* Additional component styling */
.d-flex {
    display: flex;
}

.align-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.justify-between {
    justify-content: space-between;
}

.gap-2 { gap: 0.5rem; }
.gap-3 { gap: 0.75rem; }
.gap-4 { gap: 1rem; }
.gap-6 { gap: 1.5rem; }

.flex-1 { flex: 1; }
.flex-shrink-0 { flex-shrink: 0; }

.w-100 { width: 100%; }

/* Grid responsive helpers */
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

/* Spacing utilities */
.space-y-3 > * + * { margin-top: 0.75rem; }
.space-y-6 > * + * { margin-top: 1.5rem; }

.mb-1 { margin-bottom: 0.25rem; }
.mb-2 { margin-bottom: 0.5rem; }
.mb-3 { margin-bottom: 0.75rem; }
.mb-4 { margin-bottom: 1rem; }

.text-xs { font-size: 0.75rem; }
.text-sm { font-size: 0.875rem; }
.text-lg { font-size: 1.125rem; }
.text-xl { font-size: 1.25rem; }
.text-2xl { font-size: 1.5rem; }
.text-3xl { font-size: 1.875rem; }

.font-medium { font-weight: 500; }
.font-semibold { font-weight: 600; }
.font-bold { font-weight: 700; }

.text-center { text-align: center; }

.rounded-full { border-radius: 9999px; }

.px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
.py-1 { padding-top: 0.25rem; padding-bottom: 0.25rem; }
.p-4 { padding: 1rem; }

.list-decimal { list-style-type: decimal; }
.list-inside { list-style-position: inside; }
</style>
@endpush