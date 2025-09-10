@extends('layouts.panel')

@section('title', 'Card Examples - ManuCore ERP')

@section('header', 'Card Component Examples')
@section('subheader', 'Comprehensive collection of card layouts and widget patterns')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="copyAllCards()">
        📋 Copy All Examples
    </button>
@endsection

@section('content')
<div class="space-y-8">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">🎴</div>
        <div class="alert-content">
            <div class="alert-title">Card Component Library</div>
            <div class="alert-message">Reusable card patterns for dashboards, forms, and data display using the ManuCore theme system.</div>
        </div>
    </div>

    {{-- Basic Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Basic Cards</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            
            {{-- Simple Card --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2 font-semibold text-neutral-900">Simple Card</h4>
                    <p class="text-sm text-neutral-600">Basic card with header and body content. Perfect for general content display.</p>
                </div>
            </div>

            {{-- Card with Header --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">Card with Header</h4>
                </div>
                <div class="card-body">
                    <p class="text-sm text-neutral-600">Card with dedicated header section for titles and actions.</p>
                </div>
            </div>

            {{-- Card with Footer --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2 font-semibold text-neutral-900">Card with Footer</h4>
                    <p class="text-sm text-neutral-600">Card content goes here with footer actions below.</p>
                </div>
                <div class="card-footer">
                    <div class="gap-2 d-flex">
                        <button class="btn btn-primary btn-sm">Save</button>
                        <button class="btn btn-secondary btn-sm">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Widget Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Dashboard Widgets</h3>
        <div class="widget-grid widget-grid-4">
            
            {{-- Stat Widget --}}
            <div class="widget-stat">
                <div class="widget-stat-header">
                    <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);">
                        💰
                    </div>
                    <div class="widget-stat-actions">
                        <button class="btn btn-ghost btn-sm" onclick="drillDown('revenue')">📊</button>
                    </div>
                </div>
                <div class="widget-stat-value">R 2.4M</div>
                <div class="widget-stat-label">Monthly Revenue</div>
                <div class="widget-stat-change positive">+15.3% from last month</div>
            </div>

            {{-- Success Widget --}}
            <div class="widget-stat">
                <div class="widget-stat-header">
                    <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-600);">
                        ✅
                    </div>
                </div>
                <div class="widget-stat-value">847</div>
                <div class="widget-stat-label">Completed Orders</div>
                <div class="widget-stat-change positive">+12% completion rate</div>
            </div>

            {{-- Warning Widget --}}
            <div class="widget-stat">
                <div class="widget-stat-header">
                    <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-600);">
                        ⚠️
                    </div>
                </div>
                <div class="widget-stat-value">23</div>
                <div class="widget-stat-label">Low Stock Items</div>
                <div class="widget-stat-change negative">+5 items need restocking</div>
            </div>

            {{-- Danger Widget --}}
            <div class="widget-stat">
                <div class="widget-stat-header">
                    <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-600);">
                        🚨
                    </div>
                </div>
                <div class="widget-stat-value">7</div>
                <div class="widget-stat-label">Critical Alerts</div>
                <div class="widget-stat-change negative">Requires immediate attention</div>
            </div>

        </div>
    </section>

    {{-- Interactive Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Interactive Cards</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Hover Card --}}
            <div class="transition-all duration-300 cursor-pointer card hover:shadow-xl" onclick="cardClicked('hover')">
                <div class="card-body">
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 56px; height: 56px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-xl); font-size: 1.5rem;">
                            🖱️
                        </div>
                        <div>
                            <h4 class="font-semibold text-neutral-900">Clickable Card</h4>
                            <p class="text-sm text-neutral-600">This card has hover effects and click functionality.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Expandable Card --}}
            <div class="card">
                <div class="card-header">
                    <div class="justify-between d-flex align-center w-100">
                        <h4 class="font-semibold text-neutral-900">Expandable Card</h4>
                        <button class="btn btn-ghost btn-sm" onclick="toggleExpand()" id="expand-btn">
                            ⬇️ Expand
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-sm text-neutral-600">Basic content that's always visible.</p>
                    <div id="expanded-content" style="display: none;" class="pt-4 mt-4 border-t border-neutral-200">
                        <p class="text-sm text-neutral-600">This additional content is revealed when expanded. Perfect for detailed information or advanced options.</p>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm">Action 1</button>
                            <button class="btn btn-secondary btn-sm">Action 2</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Content Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Content Display Cards</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- User Profile Card --}}
            <div class="card">
                <div class="card-body">
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); border-radius: var(--radius-full); color: white; font-weight: 700; font-size: 1.25rem;">
                            JS
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-neutral-900">John Smith</h4>
                            <p class="text-sm text-neutral-600">Senior Procurement Manager</p>
                            <div class="gap-4 mt-2 text-xs d-flex text-neutral-500">
                                <span>📧 john@acme.com</span>
                                <span>📞 +27 11 123 4567</span>
                            </div>
                            <div class="gap-2 mt-3 d-flex">
                                <span class="badge badge-success">Active</span>
                                <span class="badge badge-primary">Premium</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Card --}}
            <div class="card">
                <div class="card-body">
                    <div class="gap-4 d-flex">
                        <div class="justify-center d-flex align-center" style="width: 80px; height: 80px; background: var(--neutral-100); border-radius: var(--radius-lg); font-size: 2rem;">
                            ⚙️
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-neutral-900">Premium Widget Assembly</h4>
                            <p class="mb-2 text-sm text-neutral-600">SKU: PWA-001</p>
                            <div class="justify-between d-flex align-center">
                                <div>
                                    <div class="text-lg font-bold text-brand-600">R 1,250.00</div>
                                    <div class="text-xs text-neutral-500">In Stock: 234 units</div>
                                </div>
                                <div class="text-right">
                                    <span class="badge badge-success">Available</span>
                                    <div class="mt-1 text-xs text-neutral-500">Last ordered: 2 days ago</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="gap-2 d-flex">
                        <button class="flex-1 btn btn-primary btn-sm">Add to Cart</button>
                        <button class="btn btn-secondary btn-sm">Details</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Special Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Special Purpose Cards</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Chart Card --}}
            <div class="widget-chart">
                <div class="widget-chart-header">
                    <div>
                        <h4 class="widget-chart-title">Sales Chart</h4>
                        <p class="text-muted text-small">Revenue over time</p>
                    </div>
                    <div class="widget-chart-actions">
                        <button class="btn btn-secondary btn-sm">📊 View</button>
                    </div>
                </div>
                <div class="widget-chart-body">
                    <div style="height: 200px; background: linear-gradient(135deg, var(--brand-50), var(--brand-100)); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; position: relative;">
                        {{-- Chart Simulation --}}
                        <div style="position: absolute; bottom: 20px; left: 20px; right: 20px; display: flex; align-items: end; height: 60%;">
                            <div style="flex: 1; height: 40%; background: var(--brand-400); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                            <div style="flex: 1; height: 60%; background: var(--brand-500); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                            <div style="flex: 1; height: 35%; background: var(--brand-400); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                            <div style="flex: 1; height: 75%; background: var(--brand-600); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                            <div style="flex: 1; height: 55%; background: var(--brand-500); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                            <div style="flex: 1; height: 85%; background: var(--brand-700); margin: 0 2px; border-radius: 2px 2px 0 0;"></div>
                        </div>
                        <div class="text-center" style="color: var(--brand-700); font-weight: 600; z-index: 1;">
                            📈 Chart Area
                        </div>
                    </div>
                </div>
            </div>

            {{-- Activity Card --}}
            <div class="widget-activity">
                <div class="widget-activity-header">
                    <h4 class="widget-activity-title">Recent Activity</h4>
                    <button class="btn btn-ghost btn-sm">View All</button>
                </div>
                <div class="widget-activity-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--success-100); color: var(--success-600);">
                                ✅
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Order completed</div>
                                <div class="activity-meta">2 mins ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--brand-100); color: var(--brand-600);">
                                👤
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New customer</div>
                                <div class="activity-meta">15 mins ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--warning-100); color: var(--warning-600);">
                                📦
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Stock alert</div>
                                <div class="activity-meta">1 hour ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Settings Card --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">Quick Settings</h4>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <label class="gap-3 d-flex align-center">
                            <input type="checkbox" checked>
                            <span class="text-sm">Email notifications</span>
                        </label>
                        <label class="gap-3 d-flex align-center">
                            <input type="checkbox">
                            <span class="text-sm">SMS alerts</span>
                        </label>
                        <label class="gap-3 d-flex align-center">
                            <input type="checkbox" checked>
                            <span class="text-sm">Auto-save</span>
                        </label>
                        <label class="gap-3 d-flex align-center">
                            <input type="checkbox">
                            <span class="text-sm">Dark mode</span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm w-100">Save Settings</button>
                </div>
            </div>

        </div>
    </section>

    {{-- Gradient Cards --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Gradient & Styled Cards</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Brand Gradient Card --}}
            <div class="overflow-hidden card">
                <div style="background: linear-gradient(135deg, var(--brand-600), var(--brand-700)); padding: var(--space-6); color: white;">
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 64px; height: 64px; background: rgba(255,255,255,0.2); border-radius: var(--radius-xl); font-size: 1.75rem;">
                            🌟
                        </div>
                        <div>
                            <h4 class="mb-1 text-xl font-bold">Premium Account</h4>
                            <p class="opacity-90">Unlock advanced features and priority support</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-lg font-bold text-brand-600">∞</div>
                            <div class="text-xs text-neutral-500">Storage</div>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-brand-600">24/7</div>
                            <div class="text-xs text-neutral-500">Support</div>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-brand-600">✓</div>
                            <div class="text-xs text-neutral-500">Advanced</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Success Gradient Card --}}
            <div class="overflow-hidden card">
                <div style="background: linear-gradient(135deg, var(--success-600), var(--success-700)); padding: var(--space-6); color: white;">
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 64px; height: 64px; background: rgba(255,255,255,0.2); border-radius: var(--radius-xl); font-size: 1.75rem;">
                            ✅
                        </div>
                        <div>
                            <h4 class="mb-1 text-xl font-bold">System Status</h4>
                            <p class="opacity-90">All systems operational</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="space-y-2">
                        <div class="justify-between d-flex align-center">
                            <span class="text-sm">Database:</span>
                            <span class="badge badge-success">Online</span>
                        </div>
                        <div class="justify-between d-flex align-center">
                            <span class="text-sm">API:</span>
                            <span class="badge badge-success">Healthy</span>
                        </div>
                        <div class="justify-between d-flex align-center">
                            <span class="text-sm">Storage:</span>
                            <span class="badge badge-success">Available</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Code Examples --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Implementation Examples</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Card Component Code</h4>
            </div>
            <div class="card-body">
                <div class="space-y-4">
                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Basic Card Structure</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;div class="card"&gt;
    &lt;div class="card-header"&gt;
        &lt;h4 class="font-semibold text-neutral-900"&gt;Card Title&lt;/h4&gt;
    &lt;/div&gt;
    &lt;div class="card-body"&gt;
        &lt;p&gt;Card content goes here&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="card-footer"&gt;
        &lt;button class="btn btn-primary"&gt;Action&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Widget Stat Structure</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;div class="widget-stat"&gt;
    &lt;div class="widget-stat-header"&gt;
        &lt;div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);"&gt;
            💰
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="widget-stat-value"&gt;R 2.4M&lt;/div&gt;
    &lt;div class="widget-stat-label"&gt;Monthly Revenue&lt;/div&gt;
    &lt;div class="widget-stat-change positive"&gt;+15.3% from last month&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">CSS Variables for Theming</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>/* Use CSS variables for theme compatibility */
background: var(--brand-600);
color: var(--neutral-900);
border: 1px solid var(--neutral-200);

/* Color variants */
var(--brand-100)    /* Light brand background */
var(--brand-600)    /* Primary brand color */
var(--success-600)  /* Success green */
var(--warning-600)  /* Warning orange */
var(--danger-600)   /* Error red */</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
// Card interaction functions
function cardClicked(type) {
    if (window.ManuCore) {
        ManuCore.showToast(`${type} card clicked!`, 'info');
    }
}

function toggleExpand() {
    const content = document.getElementById('expanded-content');
    const btn = document.getElementById('expand-btn');
    
    if (content.style.display === 'none') {
        content.style.display = 'block';
        btn.textContent = '⬆️ Collapse';
    } else {
        content.style.display = 'none';
        btn.textContent = '⬇️ Expand';
    }
}

function drillDown(metric) {
    if (window.ManuCore) {
        ManuCore.showToast(`Drilling down into ${metric} data...`, 'info');
    }
}

function copyAllCards() {
    const cardExamples = `
// Basic Card
<div class="card">
    <div class="card-body">
        <h4 class="mb-2 font-semibold text-neutral-900">Card Title</h4>
        <p class="text-sm text-neutral-600">Card content</p>
    </div>
</div>

// Widget Stat
<div class="widget-stat">
    <div class="widget-stat-header">
        <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);">
            💰
        </div>
    </div>
    <div class="widget-stat-value">R 2.4M</div>
    <div class="widget-stat-label">Monthly Revenue</div>
    <div class="widget-stat-change positive">+15.3% from last month</div>
</div>

// Chart Widget
<div class="widget-chart">
    <div class="widget-chart-header">
        <div>
            <h4 class="widget-chart-title">Chart Title</h4>
            <p class="text-muted text-small">Chart description</p>
        </div>
    </div>
    <div class="widget-chart-body">
        <!-- Chart content -->
    </div>
</div>
`;
    
    if (window.ManuCore) {
        ManuCore.showToast('Card examples copied to console! Check browser console for full code.', 'success');
    }
    
    console.log('Card Component Examples:');
    console.log(cardExamples);
}

// Initialize card functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎴 Card Examples loaded');
    
    // Add interactive hover effects
    const interactiveCards = document.querySelectorAll('.card.hover\\:shadow-xl');
    interactiveCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-2px)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush