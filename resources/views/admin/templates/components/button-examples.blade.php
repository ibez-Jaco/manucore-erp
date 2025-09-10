@extends('layouts.panel')

@section('title', 'Button Examples - ManuCore ERP')

@section('header', 'Button Component Examples')
@section('subheader', 'Comprehensive collection of button styles and interactive elements')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="copyAllButtons()">
        📋 Copy All Examples
    </button>
@endsection

@section('content')
<div class="space-y-8">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">🔘</div>
        <div class="alert-content">
            <div class="alert-title">Button Component Library</div>
            <div class="alert-message">Complete button system with variants, sizes, states, and interactive patterns using the ManuCore theme system.</div>
        </div>
    </div>

    {{-- Basic Button Variants --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Button Variants</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Primary Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Primary Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary" onclick="buttonClicked('primary')">Primary Button</button>
                            <button class="btn btn-primary" onclick="buttonClicked('primary-icon')">
                                ✅ With Icon
                            </button>
                            <button class="btn btn-primary" onclick="buttonClicked('primary-loading')" id="loading-btn">
                                Loading Example
                            </button>
                        </div>
                    </div>

                    {{-- Secondary Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Secondary Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-secondary" onclick="buttonClicked('secondary')">Secondary Button</button>
                            <button class="btn btn-secondary" onclick="buttonClicked('secondary-icon')">
                                📊 Dashboard
                            </button>
                            <button class="btn btn-secondary" onclick="buttonClicked('secondary-arrow')">
                                Next Step →
                            </button>
                        </div>
                    </div>

                    {{-- Success Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Success Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-success" onclick="buttonClicked('success')">Success Button</button>
                            <button class="btn btn-success" onclick="buttonClicked('success-save')">
                                💾 Save Changes
                            </button>
                            <button class="btn btn-success" onclick="buttonClicked('success-approve')">
                                ✓ Approve Order
                            </button>
                        </div>
                    </div>

                    {{-- Warning Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Warning Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-warning" onclick="buttonClicked('warning')">Warning Button</button>
                            <button class="btn btn-warning" onclick="buttonClicked('warning-pending')">
                                ⏳ Pending Review
                            </button>
                            <button class="btn btn-warning" onclick="buttonClicked('warning-alert')">
                                ⚠️ System Alert
                            </button>
                        </div>
                    </div>

                    {{-- Danger Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Danger Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-danger" onclick="buttonClicked('danger')">Danger Button</button>
                            <button class="btn btn-danger" onclick="confirmDelete()">
                                🗑️ Delete Item
                            </button>
                            <button class="btn btn-danger" onclick="buttonClicked('danger-suspend')">
                                ⏸️ Suspend Account
                            </button>
                        </div>
                    </div>

                    {{-- Ghost Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Ghost Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-ghost" onclick="buttonClicked('ghost')">Ghost Button</button>
                            <button class="btn btn-ghost" onclick="buttonClicked('ghost-close')">
                                ✕ Close
                            </button>
                            <button class="btn btn-ghost" onclick="buttonClicked('ghost-more')">
                                ⋯ More Options
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Button Sizes --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Button Sizes</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Extra Large --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Extra Large (XL)</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary btn-xl" onclick="buttonClicked('xl-primary')">
                                🚀 Get Started
                            </button>
                            <button class="btn btn-secondary btn-xl" onclick="buttonClicked('xl-secondary')">
                                📖 Learn More
                            </button>
                        </div>
                    </div>

                    {{-- Large --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Large (LG)</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary btn-lg" onclick="buttonClicked('lg-primary')">
                                📝 Create Order
                            </button>
                            <button class="btn btn-secondary btn-lg" onclick="buttonClicked('lg-secondary')">
                                📊 View Report
                            </button>
                            <button class="btn btn-success btn-lg" onclick="buttonClicked('lg-success')">
                                💾 Save & Continue
                            </button>
                        </div>
                    </div>

                    {{-- Regular --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Regular (Default)</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary" onclick="buttonClicked('reg-primary')">Add Item</button>
                            <button class="btn btn-secondary" onclick="buttonClicked('reg-secondary')">Edit</button>
                            <button class="btn btn-danger" onclick="buttonClicked('reg-danger')">Delete</button>
                        </div>
                    </div>

                    {{-- Small --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Small (SM)</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary btn-sm" onclick="buttonClicked('sm-primary')">Quick Add</button>
                            <button class="btn btn-secondary btn-sm" onclick="buttonClicked('sm-secondary')">Options</button>
                            <button class="btn btn-ghost btn-sm" onclick="buttonClicked('sm-ghost')">×</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Button States --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Button States</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Normal State --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Normal State</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary" onclick="buttonClicked('normal')">Normal Button</button>
                            <button class="btn btn-secondary" onclick="buttonClicked('normal')">Hover Me</button>
                            <button class="btn btn-success" onclick="buttonClicked('normal')">Click Me</button>
                        </div>
                    </div>

                    {{-- Active State --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Active State</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary active" onclick="buttonClicked('active')">Active Primary</button>
                            <button class="btn btn-secondary active" onclick="buttonClicked('active')">Active Secondary</button>
                            <button class="btn btn-success active" onclick="buttonClicked('active')">Active Success</button>
                        </div>
                    </div>

                    {{-- Disabled State --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Disabled State</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary" disabled>Disabled Primary</button>
                            <button class="btn btn-secondary" disabled>Disabled Secondary</button>
                            <button class="btn btn-danger" disabled>Disabled Danger</button>
                        </div>
                    </div>

                    {{-- Loading State --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Loading State</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary" onclick="simulateLoading(this)">
                                <span class="btn-text">Click to Load</span>
                                <span class="btn-spinner" style="display: none;">
                                    <div class="spinner"></div>
                                </span>
                            </button>
                            <button class="btn btn-secondary" onclick="simulateLoading(this)">
                                <span class="btn-text">Process Data</span>
                                <span class="btn-spinner" style="display: none;">
                                    <div class="spinner"></div>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Button Groups --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Button Groups</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Horizontal Button Group --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Horizontal Groups</h4>
                        <div class="space-y-4">
                            <div class="btn-group">
                                <button class="btn btn-secondary active" onclick="selectTab(this, 'overview')">Overview</button>
                                <button class="btn btn-secondary" onclick="selectTab(this, 'details')">Details</button>
                                <button class="btn btn-secondary" onclick="selectTab(this, 'settings')">Settings</button>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-primary" onclick="buttonClicked('save')">💾 Save</button>
                                <button class="btn btn-secondary" onclick="buttonClicked('save-and-continue')">💾 Save & Continue</button>
                                <button class="btn btn-ghost" onclick="buttonClicked('cancel')">Cancel</button>
                            </div>
                        </div>
                    </div>

                    {{-- Toolbar Groups --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Toolbar Groups</h4>
                        <div class="flex-wrap gap-4 d-flex">
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('bold')" title="Bold">
                                    <strong>B</strong>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('italic')" title="Italic">
                                    <em>I</em>
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('underline')" title="Underline">
                                    <u>U</u>
                                </button>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('align-left')" title="Align Left">
                                    ⟵
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('align-center')" title="Align Center">
                                    ≡
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('align-right')" title="Align Right">
                                    ⟶
                                </button>
                            </div>

                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('undo')" title="Undo">
                                    ↶
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('redo')" title="Redo">
                                    ↷
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Special Button Types --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Special Button Types</h3>
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            
            {{-- Action Buttons --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">Action Buttons</h4>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        <button class="btn btn-primary w-100" onclick="buttonClicked('create-order')">
                            📋 Create New Order
                        </button>
                        <button class="btn btn-success w-100" onclick="buttonClicked('approve')">
                            ✅ Approve & Process
                        </button>
                        <button class="btn btn-warning w-100" onclick="buttonClicked('review')">
                            👁️ Review & Hold
                        </button>
                        <button class="btn btn-secondary w-100" onclick="buttonClicked('export')">
                            📤 Export to Excel
                        </button>
                    </div>
                </div>
            </div>

            {{-- Icon-only Buttons --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="font-semibold text-neutral-900">Icon-only Buttons</h4>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        <div>
                            <h5 class="mb-2 font-medium text-neutral-700">Table Actions</h5>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-ghost btn-sm" onclick="buttonClicked('view')" title="View">👁️</button>
                                <button class="btn btn-ghost btn-sm" onclick="buttonClicked('edit')" title="Edit">✏️</button>
                                <button class="btn btn-ghost btn-sm" onclick="buttonClicked('duplicate')" title="Duplicate">📋</button>
                                <button class="btn btn-ghost btn-sm" onclick="buttonClicked('delete')" title="Delete">🗑️</button>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="mb-2 font-medium text-neutral-700">Navigation</h5>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('first')" title="First">⏮</button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('prev')" title="Previous">◀</button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('next')" title="Next">▶</button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('last')" title="Last">⏭</button>
                            </div>
                        </div>

                        <div>
                            <h5 class="mb-2 font-medium text-neutral-700">Media Controls</h5>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-success btn-sm" onclick="buttonClicked('play')" title="Play">▶️</button>
                                <button class="btn btn-warning btn-sm" onclick="buttonClicked('pause')" title="Pause">⏸️</button>
                                <button class="btn btn-danger btn-sm" onclick="buttonClicked('stop')" title="Stop">⏹️</button>
                                <button class="btn btn-secondary btn-sm" onclick="buttonClicked('refresh')" title="Refresh">🔄</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Button Styles --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Custom Button Styles</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Gradient Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Gradient Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn-gradient btn-gradient-primary" onclick="buttonClicked('gradient-primary')">
                                ✨ Premium Feature
                            </button>
                            <button class="btn-gradient btn-gradient-success" onclick="buttonClicked('gradient-success')">
                                🌟 Success Action
                            </button>
                            <button class="btn-gradient btn-gradient-warning" onclick="buttonClicked('gradient-warning')">
                                ⚡ Power Mode
                            </button>
                        </div>
                    </div>

                    {{-- Rounded Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Rounded Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-primary btn-rounded" onclick="buttonClicked('rounded-primary')">
                                💫 Rounded Primary
                            </button>
                            <button class="btn btn-secondary btn-rounded" onclick="buttonClicked('rounded-secondary')">
                                🔘 Rounded Secondary
                            </button>
                            <button class="btn btn-success btn-rounded btn-sm" onclick="buttonClicked('rounded-small')">
                                ✓
                            </button>
                        </div>
                    </div>

                    {{-- Outlined Buttons --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Outlined Buttons</h4>
                        <div class="flex-wrap gap-3 d-flex">
                            <button class="btn btn-outline-primary" onclick="buttonClicked('outline-primary')">
                                Outline Primary
                            </button>
                            <button class="btn btn-outline-success" onclick="buttonClicked('outline-success')">
                                ✓ Outline Success
                            </button>
                            <button class="btn btn-outline-danger" onclick="buttonClicked('outline-danger')">
                                ⚠️ Outline Danger
                            </button>
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
                <h4 class="font-semibold text-neutral-900">Button Component Code</h4>
            </div>
            <div class="card-body">
                <div class="space-y-4">
                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Basic Button Structure</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;!-- Primary Button --&gt;
&lt;button class="btn btn-primary" onclick="action()"&gt;
    💾 Save Changes
&lt;/button&gt;

&lt;!-- Secondary Button --&gt;
&lt;button class="btn btn-secondary"&gt;
    Cancel
&lt;/button&gt;

&lt;!-- Button with Icon --&gt;
&lt;button class="btn btn-success"&gt;
    ✅ Approve Order
&lt;/button&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Button Sizes</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;!-- Size Variants --&gt;
&lt;button class="btn btn-primary btn-sm"&gt;Small&lt;/button&gt;
&lt;button class="btn btn-primary"&gt;Regular&lt;/button&gt;
&lt;button class="btn btn-primary btn-lg"&gt;Large&lt;/button&gt;
&lt;button class="btn btn-primary btn-xl"&gt;Extra Large&lt;/button&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Button States</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;!-- Button States --&gt;
&lt;button class="btn btn-primary"&gt;Normal&lt;/button&gt;
&lt;button class="btn btn-primary active"&gt;Active&lt;/button&gt;
&lt;button class="btn btn-primary" disabled&gt;Disabled&lt;/button&gt;

&lt;!-- Loading State --&gt;
&lt;button class="btn btn-primary"&gt;
    &lt;span class="btn-text"&gt;Process&lt;/span&gt;
    &lt;span class="btn-spinner" style="display: none;"&gt;
        &lt;div class="spinner"&gt;&lt;/div&gt;
    &lt;/span&gt;
&lt;/button&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Button Groups</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;!-- Button Group --&gt;
&lt;div class="btn-group"&gt;
    &lt;button class="btn btn-secondary active"&gt;Tab 1&lt;/button&gt;
    &lt;button class="btn btn-secondary"&gt;Tab 2&lt;/button&gt;
    &lt;button class="btn btn-secondary"&gt;Tab 3&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('head')
<style>
/* Custom button styles */
.btn-group {
    display: inline-flex;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.btn-group .btn {
    border-radius: 0;
    border-right: 1px solid rgba(255,255,255,0.2);
    margin-right: 0;
}

.btn-group .btn:last-child {
    border-right: none;
}

.btn-group .btn:first-child {
    border-top-left-radius: var(--radius-lg);
    border-bottom-left-radius: var(--radius-lg);
}

.btn-group .btn:last-child {
    border-top-right-radius: var(--radius-lg);
    border-bottom-right-radius: var(--radius-lg);
}

/* Gradient buttons */
.btn-gradient {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
    color: white;
    border: none;
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-gradient:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-lg);
}

.btn-gradient-primary {
    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
}

.btn-gradient-success {
    background: linear-gradient(135deg, var(--success-500), var(--success-700));
}

.btn-gradient-warning {
    background: linear-gradient(135deg, var(--warning-500), var(--warning-700));
}

/* Rounded buttons */
.btn-rounded {
    border-radius: var(--radius-full);
}

/* Outlined buttons */
.btn-outline-primary {
    background: transparent;
    color: var(--brand-600);
    border: 2px solid var(--brand-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-primary:hover {
    background: var(--brand-600);
    color: white;
}

.btn-outline-success {
    background: transparent;
    color: var(--success-600);
    border: 2px solid var(--success-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-success:hover {
    background: var(--success-600);
    color: white;
}

.btn-outline-danger {
    background: transparent;
    color: var(--danger-600);
    border: 2px solid var(--danger-600);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-lg);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
}

.btn-outline-danger:hover {
    background: var(--danger-600);
    color: white;
}

/* Button spinner styles */
.btn-spinner {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.spinner {
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: white;
    border-radius: var(--radius-full);
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Dark mode adjustments */
[data-theme="dark"] .btn-group {
    box-shadow: var(--shadow-md);
}

[data-theme="dark"] .btn-group .btn {
    border-right-color: rgba(255,255,255,0.1);
}

[data-theme="dark"] .btn-outline-primary {
    color: var(--brand-400);
    border-color: var(--brand-400);
}

[data-theme="dark"] .btn-outline-primary:hover {
    background: var(--brand-400);
    color: var(--neutral-900);
}

[data-theme="dark"] .btn-outline-success {
    color: var(--success-400);
    border-color: var(--success-400);
}

[data-theme="dark"] .btn-outline-success:hover {
    background: var(--success-400);
    color: var(--neutral-900);
}

[data-theme="dark"] .btn-outline-danger {
    color: var(--danger-400);
    border-color: var(--danger-400);
}

[data-theme="dark"] .btn-outline-danger:hover {
    background: var(--danger-400);
    color: var(--neutral-900);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-group .btn {
        border-right: none;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        border-radius: 0;
    }
    
    .btn-group .btn:last-child {
        border-bottom: none;
    }
    
    .btn-group .btn:first-child {
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }
    
    .btn-group .btn:last-child {
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
    }
}
</style>
@endpush

@push('scripts')
<script>
// Button interaction functions
function buttonClicked(type) {
    if (window.ManuCore) {
        ManuCore.showToast(`${type} button clicked!`, 'info');
    }
    console.log(`Button clicked: ${type}`);
}

function confirmDelete() {
    if (window.ManuCore) {
        ManuCore.confirmDelete('Delete Item?', 'This action cannot be undone!').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast('Item deleted successfully', 'success');
            }
        });
    }
}

function simulateLoading(button) {
    const textSpan = button.querySelector('.btn-text');
    const spinnerSpan = button.querySelector('.btn-spinner');
    
    // Show loading state
    textSpan.style.display = 'none';
    spinnerSpan.style.display = 'inline-flex';
    button.disabled = true;
    
    // Simulate processing time
    setTimeout(() => {
        // Restore normal state
        textSpan.style.display = 'inline';
        spinnerSpan.style.display = 'none';
        button.disabled = false;
        
        if (window.ManuCore) {
            ManuCore.showToast('Process completed!', 'success');
        }
    }, 3000);
}

function selectTab(button, tab) {
    // Remove active class from all buttons in the group
    const group = button.closest('.btn-group');
    group.querySelectorAll('.btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Add active class to clicked button
    button.classList.add('active');
    
    if (window.ManuCore) {
        ManuCore.showToast(`Selected tab: ${tab}`, 'info');
    }
}

function copyAllButtons() {
    const buttonExamples = `
// Basic Button Variants
<button class="btn btn-primary">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-success">Success Button</button>
<button class="btn btn-warning">Warning Button</button>
<button class="btn btn-danger">Danger Button</button>
<button class="btn btn-ghost">Ghost Button</button>

// Button Sizes
<button class="btn btn-primary btn-sm">Small</button>
<button class="btn btn-primary">Regular</button>
<button class="btn btn-primary btn-lg">Large</button>
<button class="btn btn-primary btn-xl">Extra Large</button>

// Button States
<button class="btn btn-primary">Normal</button>
<button class="btn btn-primary active">Active</button>
<button class="btn btn-primary" disabled>Disabled</button>

// Button with Icon
<button class="btn btn-primary">
    ✅ Save Changes
</button>

// Loading Button
<button class="btn btn-primary">
    <span class="btn-text">Process</span>
    <span class="btn-spinner" style="display: none;">
        <div class="spinner"></div>
    </span>
</button>

// Button Group
<div class="btn-group">
    <button class="btn btn-secondary active">Tab 1</button>
    <button class="btn btn-secondary">Tab 2</button>
    <button class="btn btn-secondary">Tab 3</button>
</div>

// Gradient Button
<button class="btn-gradient btn-gradient-primary">
    ✨ Premium Feature
</button>

// Outlined Button
<button class="btn btn-outline-primary">
    Outline Primary
</button>
`;
    
    if (window.ManuCore) {
        ManuCore.showToast('Button examples copied to console! Check browser console for full code.', 'success');
    }
    
    console.log('Button Component Examples:');
    console.log(buttonExamples);
}

// Loading button example
document.getElementById('loading-btn').addEventListener('click', function() {
    simulateLoading(this);
});

// Initialize button functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔘 Button Examples loaded');
    
    // Add hover effects to gradient buttons
    const gradientButtons = document.querySelectorAll('.btn-gradient');
    gradientButtons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.boxShadow = 'var(--shadow-xl)';
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.boxShadow = '';
        });
    });
    
    // Initialize tooltips for icon-only buttons
    if (window.ManuCore) {
        ManuCore.initTooltips();
    }
});
</script>
@endpush