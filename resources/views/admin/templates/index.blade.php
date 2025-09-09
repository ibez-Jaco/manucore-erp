@extends('layouts.panel')

@section('title', 'Template Management - ManuCore ERP')

@section('header', 'Template Management')
@section('subheader', 'Manage system email templates and document layouts')

@section('page-actions')
    <button class="btn btn-secondary" onclick="exportTemplates()">
        📤 Export Templates
    </button>
    <button class="btn btn-primary" data-modal-open="create-template-modal">
        ➕ Add Template
    </button>
@endsection

@section('content')
<div class="space-y-6">
    
    {{-- Stats Widgets --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);">
                    📧
                </div>
            </div>
            <div class="widget-stat-value">24</div>
            <div class="widget-stat-label">Email Templates</div>
            <div class="widget-stat-change positive">+3 this month</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-600);">
                    ✅
                </div>
            </div>
            <div class="widget-stat-value">18</div>
            <div class="widget-stat-label">Active Templates</div>
            <div class="widget-stat-change positive">+2 enabled</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-600);">
                    ⚠️
                </div>
            </div>
            <div class="widget-stat-value">3</div>
            <div class="widget-stat-label">Needs Review</div>
            <div class="widget-stat-change negative">2 outdated</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-600);">
                    📊
                </div>
            </div>
            <div class="widget-stat-value">1,247</div>
            <div class="widget-stat-label">Emails Sent</div>
            <div class="widget-stat-change positive">+125 this week</div>
        </div>
    </div>

    {{-- Template Categories Tabs --}}
    <div class="card">
        <div class="card-body">
            <div class="nav-tabs">
                <a href="#" class="nav-tab active" data-tab-target="tab-email">Email Templates</a>
                <a href="#" class="nav-tab" data-tab-target="tab-documents">Document Templates</a>
                <a href="#" class="nav-tab" data-tab-target="tab-system">System Templates</a>
            </div>

            {{-- Email Templates Tab --}}
            <div id="tab-email" class="tab-panel" style="display: block;">
                <div class="data-table-container">
                    <div class="data-table-header">
                        <h3 class="data-table-title">Email Templates</h3>
                        <div class="data-table-actions">
                            {{-- Search --}}
                            <div class="data-table-search">
                                <input type="text" class="form-input form-input-sm" placeholder="Search templates..." data-table-search="email-templates-table">
                            </div>
                            
                            {{-- Filter Chips --}}
                            <div class="filter-chips">
                                <div class="filter-chip active">
                                    All Templates
                                    <span class="filter-chip-remove">×</span>
                                </div>
                                <div class="filter-chip">
                                    Active Only
                                </div>
                                <div class="filter-chip">
                                    System Templates
                                </div>
                            </div>
                            
                            {{-- Actions --}}
                            <button class="btn btn-secondary btn-sm" onclick="bulkExport()">
                                📤 Bulk Export
                            </button>
                        </div>
                    </div>

                    {{-- Bulk Actions (Hidden by default) --}}
                    <div id="bulk-actions" class="bulk-actions-bar">
                        <div class="justify-between d-flex align-center">
                            <span class="selection-count">0 selected</span>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm" onclick="bulkEdit()">✏️ Edit</button>
                                <button class="btn btn-secondary btn-sm" onclick="bulkDisable()">❌ Disable</button>
                                <button class="btn btn-danger btn-sm" onclick="bulkDelete()">🗑️ Delete</button>
                            </div>
                        </div>
                    </div>

                    {{-- Templates Table --}}
                    <table class="data-table" id="email-templates-table" data-selectable="true">
                        <thead>
                            <tr>
                                <th class="table-select-column">
                                    <input type="checkbox" class="select-all" aria-label="Select all">
                                </th>
                                <th class="sortable">Template Name</th>
                                <th class="sortable">Subject</th>
                                <th class="sortable">Category</th>
                                <th class="sortable">Status</th>
                                <th class="sortable">Last Modified</th>
                                <th class="sortable">Usage Count</th>
                                <th class="table-actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td class="table-select-cell">
                                    <input type="checkbox" class="select-row" value="1" aria-label="Select row">
                                </td>
                                <td>
                                    <div class="template-info">
                                        <div class="template-icon brand">📧</div>
                                        <div class="template-details">
                                            <div class="template-name">Welcome Email</div>
                                            <div class="template-key">welcome-new-user</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="template-subject">Welcome to ManuCore ERP!</td>
                                <td><span class="badge badge-primary">User Onboarding</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="template-date">2024-09-05</td>
                                <td class="template-usage">127</td>
                                <td>
                                    <div class="table-actions">
                                        <button class="table-action-btn" data-tooltip="Preview" onclick="previewTemplate(1)">👁️</button>
                                        <button class="table-action-btn" data-tooltip="Edit Template" onclick="editTemplate(1)">✏️</button>
                                        <button class="table-action-btn" data-tooltip="Duplicate" onclick="duplicateTemplate(1)">📋</button>
                                        <button class="table-action-btn" data-tooltip="Delete Template" onclick="deleteTemplate(1)">🗑️</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <td class="table-select-cell">
                                    <input type="checkbox" class="select-row" value="2" aria-label="Select row">
                                </td>
                                <td>
                                    <div class="template-info">
                                        <div class="template-icon success">💰</div>
                                        <div class="template-details">
                                            <div class="template-name">Invoice Notification</div>
                                            <div class="template-key">invoice-sent</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="template-subject">Your invoice #@{{invoice_number}} is ready</td>
                                <td><span class="badge badge-success">Billing</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="template-date">2024-09-03</td>
                                <td class="template-usage">89</td>
                                <td>
                                    <div class="table-actions">
                                        <button class="table-action-btn" data-tooltip="Preview" onclick="previewTemplate(2)">👁️</button>
                                        <button class="table-action-btn" data-tooltip="Edit Template" onclick="editTemplate(2)">✏️</button>
                                        <button class="table-action-btn" data-tooltip="Duplicate" onclick="duplicateTemplate(2)">📋</button>
                                        <button class="table-action-btn" data-tooltip="Delete Template" onclick="deleteTemplate(2)">🗑️</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="3">
                                <td class="table-select-cell">
                                    <input type="checkbox" class="select-row" value="3" aria-label="Select row">
                                </td>
                                <td>
                                    <div class="template-info">
                                        <div class="template-icon warning">🔔</div>
                                        <div class="template-details">
                                            <div class="template-name">Password Reset</div>
                                            <div class="template-key">password-reset</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="template-subject">Reset your ManuCore password</td>
                                <td><span class="badge badge-warning">Security</span></td>
                                <td><span class="badge badge-warning">Needs Review</span></td>
                                <td class="template-date">2024-08-28</td>
                                <td class="template-usage">45</td>
                                <td>
                                    <div class="table-actions">
                                        <button class="table-action-btn" data-tooltip="Preview" onclick="previewTemplate(3)">👁️</button>
                                        <button class="table-action-btn" data-tooltip="Edit Template" onclick="editTemplate(3)">✏️</button>
                                        <button class="table-action-btn" data-tooltip="Duplicate" onclick="duplicateTemplate(3)">📋</button>
                                        <button class="table-action-btn" data-tooltip="Delete Template" onclick="deleteTemplate(3)">🗑️</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="4">
                                <td class="table-select-cell">
                                    <input type="checkbox" class="select-row" value="4" aria-label="Select row">
                                </td>
                                <td>
                                    <div class="template-info">
                                        <div class="template-icon danger">❌</div>
                                        <div class="template-details">
                                            <div class="template-name">Account Suspension</div>
                                            <div class="template-key">account-suspended</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="template-subject">Your account has been suspended</td>
                                <td><span class="badge badge-danger">Security</span></td>
                                <td><span class="badge badge-neutral">Disabled</span></td>
                                <td class="template-date">2024-08-15</td>
                                <td class="template-usage">2</td>
                                <td>
                                    <div class="table-actions">
                                        <button class="table-action-btn" data-tooltip="Preview" onclick="previewTemplate(4)">👁️</button>
                                        <button class="table-action-btn" data-tooltip="Edit Template" onclick="editTemplate(4)">✏️</button>
                                        <button class="table-action-btn" data-tooltip="Duplicate" onclick="duplicateTemplate(4)">📋</button>
                                        <button class="table-action-btn" data-tooltip="Delete Template" onclick="deleteTemplate(4)">🗑️</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="table-pagination">
                        <div class="table-pagination-info">
                            <span class="text-small text-muted">Showing <strong>1-4</strong> of <strong>24</strong> templates</span>
                        </div>
                        <div class="table-pagination-controls">
                            <button class="btn btn-secondary btn-sm" disabled>Previous</button>
                            <button class="btn btn-secondary btn-sm active">1</button>
                            <button class="btn btn-secondary btn-sm">2</button>
                            <button class="btn btn-secondary btn-sm">3</button>
                            <span class="text-muted">...</span>
                            <button class="btn btn-secondary btn-sm">6</button>
                            <button class="btn btn-secondary btn-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Document Templates Tab --}}
            <div id="tab-documents" class="tab-panel" style="display: none;">
                <div class="empty-state-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">📄</div>
                        <div class="empty-state-title">Document Templates</div>
                        <div class="empty-state-description">Manage PDF and document templates for invoices, quotes, and reports.</div>
                        <div class="empty-state-action">
                            <button class="btn btn-primary">Add Document Template</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- System Templates Tab --}}
            <div id="tab-system" class="tab-panel" style="display: none;">
                <div class="empty-state-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">⚙️</div>
                        <div class="empty-state-title">System Templates</div>
                        <div class="empty-state-description">Core system notification templates and layouts.</div>
                        <div class="empty-state-action">
                            <button class="btn btn-primary">Manage System Templates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Template Usage Chart --}}
    <div class="widget-chart">
        <div class="widget-chart-header">
            <div>
                <h3 class="widget-chart-title">Template Usage Analytics</h3>
                <p class="text-muted text-small">Email template performance over time</p>
            </div>
            <div class="widget-chart-actions">
                <button class="btn btn-secondary btn-sm">📊 Full Report</button>
            </div>
        </div>
        <div class="widget-chart-body">
            <div class="chart-placeholder">
                📈 Template Usage Chart Placeholder
            </div>
        </div>
    </div>
</div>

{{-- Create Template Modal --}}
<div class="modal-backdrop" id="create-template-modal">
    <div class="modal modal-lg">
        <div class="modal-header">
            <h3 class="modal-title">Create New Template</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <form id="create-template-form">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Template Name *</label>
                        <input type="text" class="form-input" name="name" required placeholder="Enter template name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Template Key *</label>
                        <input type="text" class="form-input" name="key" required placeholder="template-key">
                        <div class="form-help">Unique identifier for the template</div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Category *</label>
                        <select class="form-select" name="category" required>
                            <option value="">Select category</option>
                            <option value="user_onboarding">User Onboarding</option>
                            <option value="billing">Billing</option>
                            <option value="security">Security</option>
                            <option value="notifications">Notifications</option>
                            <option value="marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="disabled">Disabled</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email Subject *</label>
                    <input type="text" class="form-input" name="subject" required placeholder="Enter email subject">
                    <div class="form-help">You can use variables like @{{user_name}} and @{{company_name}}</div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Template Content *</label>
                    <textarea class="form-textarea" name="content" rows="10" required placeholder="Enter the email template content..."></textarea>
                    <div class="form-help">Supports HTML and template variables</div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" name="description" rows="3" placeholder="Brief description of when this template is used"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Cancel</button>
            <button class="btn btn-primary" onclick="createTemplate()">Create Template</button>
        </div>
    </div>
</div>

{{-- Preview Modal --}}
<div class="modal-backdrop" id="preview-template-modal">
    <div class="modal modal-xl">
        <div class="modal-header">
            <h3 class="modal-title">Template Preview</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <div id="template-preview-content" class="template-preview">
                <!-- Preview content will be loaded here -->
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Close</button>
            <button class="btn btn-primary" onclick="sendTestEmail()">Send Test Email</button>
        </div>
    </div>
</div>

@endsection

@push('head')
<style>
/* Template Management Specific Styles */
.template-info {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.template-icon {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 14px;
    flex-shrink: 0;
}

.template-icon.brand {
    background: var(--brand-100);
    color: var(--brand-700);
}

.template-icon.success {
    background: var(--success-100);
    color: var(--success-700);
}

.template-icon.warning {
    background: var(--warning-100);
    color: var(--warning-700);
}

.template-icon.danger {
    background: var(--danger-100);
    color: var(--danger-700);
}

.template-details {
    min-width: 0;
    flex: 1;
}

.template-name {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    line-height: 1.2;
}

.template-key {
    font-size: var(--text-xs);
    color: var(--neutral-500);
    font-family: var(--font-mono);
    margin-top: 2px;
}

.template-subject {
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.template-date {
    font-size: var(--text-sm);
    color: var(--neutral-600);
}

.template-usage {
    font-weight: 600;
    color: var(--neutral-900);
}

/* Table Selection */
.table-select-column {
    width: 40px;
    padding: var(--space-3) var(--space-2);
}

.table-select-cell {
    padding: var(--space-3) var(--space-2);
}

.table-actions-column {
    width: 140px;
    text-align: center;
}

/* Bulk Actions Bar */
.bulk-actions-bar {
    padding: var(--space-4);
    background: var(--brand-50);
    border-bottom: 1px solid var(--neutral-200);
    display: none;
}

.selection-count {
    font-weight: 500;
    color: var(--neutral-700);
}

/* Empty State */
.empty-state-container {
    padding: var(--space-8);
    text-align: center;
}

.empty-state {
    max-width: 400px;
    margin: 0 auto;
}

.empty-state-icon {
    font-size: 48px;
    margin-bottom: var(--space-4);
    opacity: 0.6;
}

.empty-state-title {
    font-size: var(--text-xl);
    font-weight: 600;
    color: var(--neutral-900);
    margin-bottom: var(--space-2);
}

.empty-state-description {
    color: var(--neutral-600);
    margin-bottom: var(--space-4);
    line-height: 1.5;
}

.empty-state-action {
    margin-top: var(--space-4);
}

/* Chart Placeholder */
.chart-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, var(--brand-100), var(--brand-200));
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand-700);
    font-weight: 600;
    font-size: var(--text-lg);
}

/* Template Preview */
.template-preview {
    background: var(--neutral-50);
    border-radius: var(--radius-lg);
    padding: var(--space-4);
    min-height: 300px;
}

.template-preview h4 {
    color: var(--neutral-900);
    margin-bottom: var(--space-3);
    font-size: var(--text-lg);
}

/* Tab Panels */
.tab-panel {
    margin-top: var(--space-6);
}

/* Filter Chips */
.filter-chip-remove {
    width: 14px;
    height: 14px;
    border-radius: var(--radius-full);
    background: var(--neutral-400);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    cursor: pointer;
    transition: background var(--transition-fast);
}

.filter-chip-remove:hover {
    background: var(--neutral-600);
}

/* Form Layout */
.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--space-4);
    margin-bottom: var(--space-5);
}

/* Dark Mode Enhancements */
[data-theme="dark"] .template-icon.brand {
    background: var(--brand-950);
    color: var(--brand-300);
}

[data-theme="dark"] .template-icon.success {
    background: var(--success-100);
    color: var(--success-700);
}

[data-theme="dark"] .template-icon.warning {
    background: var(--warning-100);
    color: var(--warning-700);
}

[data-theme="dark"] .template-icon.danger {
    background: var(--danger-100);
    color: var(--danger-700);
}

[data-theme="dark"] .bulk-actions-bar {
    background: var(--brand-950);
}

[data-theme="dark"] .template-preview {
    background: var(--neutral-200);
}

[data-theme="dark"] .chart-placeholder {
    background: linear-gradient(45deg, var(--brand-950), var(--brand-800));
    color: var(--brand-300);
}

/* Responsive Design */
@media (max-width: 768px) {
    .template-subject {
        max-width: 200px;
    }
    
    .template-info {
        gap: var(--space-2);
    }
    
    .template-icon {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
@verbatim
<script>
// Template Management Functions
let currentTemplateId = null;

function previewTemplate(id) {
    // Simulate loading template preview
    const templates = {
        1: {
            subject: 'Welcome to ManuCore ERP!',
            content: `
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <h1 style="color: var(--brand-600);">Welcome to ManuCore ERP!</h1>
                    <p>Dear {{user_name}},</p>
                    <p>Welcome to your new ManuCore ERP account. We're excited to have you on board!</p>
                    <p>Your account details:</p>
                    <ul style="margin: 20px 0;">
                        <li>Company: {{company_name}}</li>
                        <li>Email: {{user_email}}</li>
                        <li>Role: {{user_role}}</li>
                    </ul>
                    <p>Get started by logging into your dashboard.</p>
                    <a href="{{dashboard_url}}" style="background: var(--brand-600); color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; display: inline-block; margin-top: 20px;">Go to Dashboard</a>
                </div>
            `
        }
    };
    
    const template = templates[id] || templates[1];
    document.getElementById('template-preview-content').innerHTML = `
        <h4>Subject: ${template.subject}</h4>
        <div style="border: 1px solid var(--neutral-300); border-radius: var(--radius-lg); padding: var(--space-4); background: white;">
            ${template.content}
        </div>
    `;
    
    currentTemplateId = id;
    ManuCore.openModal('preview-template-modal');
}

function editTemplate(id) {
    ManuCore.showToast(`Edit template ${id}`, 'info');
}

function duplicateTemplate(id) {
    ManuCore.confirmDelete('Duplicate Template?', `Create a copy of template ${id}?`).then((result) => {
        if (result.isConfirmed) {
            ManuCore.showToast('Template duplicated successfully', 'success');
        }
    });
}

function deleteTemplate(id) {
    ManuCore.confirmDelete('Delete Template?', 'This template will be permanently deleted!').then((result) => {
        if (result.isConfirmed) {
            ManuCore.showToast('Template deleted successfully', 'success');
            // Remove row from table
            document.querySelector(`tr[data-id="${id}"]`)?.remove();
            updateBulkActionsVisibility();
        }
    });
}

function createTemplate() {
    const form = document.getElementById('create-template-form');
    const formData = new FormData(form);
    
    // Basic validation
    if (!formData.get('name') || !formData.get('key') || !formData.get('subject')) {
        ManuCore.showToast('Please fill in all required fields', 'error');
        return;
    }
    
    ManuCore.showLoading('Creating Template...', 'Please wait while we create the template');
    
    setTimeout(() => {
        Swal.close();
        ManuCore.showToast('Template created successfully', 'success');
        ManuCore.closeModal('create-template-modal');
        form.reset();
    }, 2000);
}

function sendTestEmail() {
    const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';
    Swal.fire({
        title: 'Send Test Email',
        input: 'email',
        inputLabel: 'Test email address',
        inputPlaceholder: 'Enter email address',
        showCancelButton: true,
        confirmButtonText: 'Send Test',
        confirmButtonColor: brand,
        inputValidator: (value) => {
            if (!value) {
                return 'You need to enter an email address!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            ManuCore.showToast(`Test email sent to ${result.value}`, 'success');
        }
    });
}

function exportTemplates() {
    ManuCore.showToast('Templates export started', 'info');
}

function bulkExport() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        ManuCore.showToast('Please select templates to export', 'warning');
        return;
    }
    ManuCore.showToast(`Exporting ${selected.length} templates`, 'info');
}

function bulkEdit() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        ManuCore.showToast('Please select templates to edit', 'warning');
        return;
    }
    ManuCore.showToast(`Bulk edit for ${selected.length} templates`, 'info');
}

function bulkDisable() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        ManuCore.showToast('Please select templates to disable', 'warning');
        return;
    }
    
    ManuCore.confirmDelete(`Disable ${selected.length} templates?`, 'These templates will be disabled').then((result) => {
        if (result.isConfirmed) {
            ManuCore.showToast(`${selected.length} templates disabled`, 'success');
        }
    });
}

function bulkDelete() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        ManuCore.showToast('Please select templates to delete', 'warning');
        return;
    }
    
    ManuCore.confirmDelete(`Delete ${selected.length} templates?`, 'These templates will be permanently deleted!').then((result) => {
        if (result.isConfirmed) {
            ManuCore.showToast(`${selected.length} templates deleted`, 'success');
            // Remove selected rows
            selected.forEach(checkbox => {
                checkbox.closest('tr').remove();
            });
            updateBulkActionsVisibility();
        }
    });
}

// Table selection handling
document.addEventListener('change', (e) => {
    if (e.target.matches('#email-templates-table .select-row, #email-templates-table .select-all')) {
        updateBulkActionsVisibility();
        
        // Handle select all
        if (e.target.matches('.select-all')) {
            const checked = e.target.checked;
            document.querySelectorAll('#email-templates-table .select-row').forEach(checkbox => {
                checkbox.checked = checked;
                checkbox.closest('tr').classList.toggle('selected', checked);
            });
        } else {
            // Handle individual row selection
            const row = e.target.closest('tr');
            row.classList.toggle('selected', e.target.checked);
            
            // Update select all state
            const allRows = document.querySelectorAll('#email-templates-table .select-row');
            const checkedRows = document.querySelectorAll('#email-templates-table .select-row:checked');
            const selectAll = document.querySelector('#email-templates-table .select-all');
            
            if (selectAll) {
                selectAll.checked = allRows.length === checkedRows.length;
                selectAll.indeterminate = checkedRows.length > 0 && checkedRows.length < allRows.length;
            }
        }
    }
});

function updateBulkActionsVisibility() {
    const selectedCount = document.querySelectorAll('#email-templates-table .select-row:checked').length;
    const bulkActions = document.getElementById('bulk-actions');
    const countElement = document.querySelector('.selection-count');
    
    if (bulkActions) {
        bulkActions.style.display = selectedCount > 0 ? 'block' : 'none';
    }
    
    if (countElement) {
        countElement.textContent = `${selectedCount} selected`;
    }
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (window.ManuCore) {
        ManuCore.initTabs();
        ManuCore.initDataTables();
        ManuCore.initTooltips();
    }
    
    console.log('Templates page loaded with ManuCore theme system');
});
</script>
@endverbatim
@endpush
