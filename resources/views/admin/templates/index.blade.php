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
                    <div id="bulk-actions" style="display: none;" class="p-4 bg-brand-50 border-bottom">
                        <div class="d-flex align-center justify-between">
                            <span class="selection-count font-medium">0 selected</span>
                            <div class="d-flex gap-2">
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
                                <th class="sortable">Template Name</th>
                                <th class="sortable">Subject</th>
                                <th class="sortable">Category</th>
                                <th class="sortable">Status</th>
                                <th class="sortable">Last Modified</th>
                                <th class="sortable">Usage Count</th>
                                <th style="width: 140px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>
                                    <div class="d-flex align-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--brand-100); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--brand-700);">📧</div>
                                        <div>
                                            <div class="font-medium">Welcome Email</div>
                                            <div class="text-small text-muted">welcome-new-user</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Welcome to ManuCore ERP!</td>
                                <td><span class="badge badge-primary">User Onboarding</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2024-09-05</td>
                                <td class="font-semibold">127</td>
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
                                <td>
                                    <div class="d-flex align-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--success-100); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--success-700);">💰</div>
                                        <div>
                                            <div class="font-medium">Invoice Notification</div>
                                            <div class="text-small text-muted">invoice-sent</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Your invoice #{{invoice_number}} is ready</td>
                                <td><span class="badge badge-success">Billing</span></td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2024-09-03</td>
                                <td class="font-semibold">89</td>
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
                                <td>
                                    <div class="d-flex align-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--warning-100); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--warning-700);">🔔</div>
                                        <div>
                                            <div class="font-medium">Password Reset</div>
                                            <div class="text-small text-muted">password-reset</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Reset your ManuCore password</td>
                                <td><span class="badge badge-warning">Security</span></td>
                                <td><span class="badge badge-warning">Needs Review</span></td>
                                <td>2024-08-28</td>
                                <td class="font-semibold">45</td>
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
                                <td>
                                    <div class="d-flex align-center gap-2">
                                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--danger-100); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--danger-700);">❌</div>
                                        <div>
                                            <div class="font-medium">Account Suspension</div>
                                            <div class="text-small text-muted">account-suspended</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Your account has been suspended</td>
                                <td><span class="badge badge-danger">Security</span></td>
                                <td><span class="badge badge-neutral">Disabled</span></td>
                                <td>2024-08-15</td>
                                <td class="font-semibold">2</td>
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
                <div class="card">
                    <div class="card-body text-center">
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
            </div>

            {{-- System Templates Tab --}}
            <div id="tab-system" class="tab-panel" style="display: none;">
                <div class="card">
                    <div class="card-body text-center">
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
            <div style="width: 100%; height: 100%; background: linear-gradient(45deg, var(--brand-100), var(--brand-200)); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--brand-700); font-weight: 600;">
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
                    <div class="form-help">You can use variables like {{user_name}} and {{company_name}}</div>
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
            <div id="template-preview-content">
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

@push('scripts')
<script>
// Template Management Functions
let currentTemplateId = null;

function previewTemplate(id) {
    // Simulate loading template preview
    const templates = {
        1: {
            subject: 'Welcome to ManuCore ERP!',
            content: `
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
                    <h1 style="color: #2563eb;">Welcome to ManuCore ERP!</h1>
                    <p>Dear {{user_name}},</p>
                    <p>Welcome to your new ManuCore ERP account. We're excited to have you on board!</p>
                    <p>Your account details:</p>
                    <ul>
                        <li>Company: {{company_name}}</li>
                        <li>Email: {{user_email}}</li>
                        <li>Role: {{user_role}}</li>
                    </ul>
                    <p>Get started by logging into your dashboard.</p>
                    <a href="{{dashboard_url}}" style="background: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px;">Go to Dashboard</a>
                </div>
            `
        }
    };
    
    const template = templates[id] || templates[1];
    document.getElementById('template-preview-content').innerHTML = `
        <div class="mb-4">
            <h4>Subject: ${template.subject}</h4>
        </div>
        <div class="border rounded p-4" style="background: #f9fafb;">
            ${template.content}
        </div>
    `;
    
    currentTemplateId = id;
    // Open modal using your existing modal system
    document.getElementById('preview-template-modal').classList.add('show');
    document.getElementById('preview-template-modal').style.display = 'flex';
}

function editTemplate(id) {
    Swal.fire({
        title: 'Edit Template',
        text: `Edit template ${id}`,
        icon: 'info'
    });
}

function duplicateTemplate(id) {
    Swal.fire({
        title: 'Duplicate Template?',
        text: `Create a copy of template ${id}?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2563eb',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, duplicate it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Duplicated!', 'Template has been duplicated.', 'success');
        }
    });
}

function deleteTemplate(id) {
    Swal.fire({
        title: 'Delete Template?',
        text: "This template will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Deleted!', 'Template has been deleted.', 'success');
            // Remove row from table
            document.querySelector(`tr[data-id="${id}"]`)?.remove();
        }
    });
}

function createTemplate() {
    const form = document.getElementById('create-template-form');
    const formData = new FormData(form);
    
    // Basic validation
    if (!formData.get('name') || !formData.get('key') || !formData.get('subject')) {
        Swal.fire('Error!', 'Please fill in all required fields.', 'error');
        return;
    }
    
    Swal.fire({
        title: 'Creating Template...',
        text: 'Please wait while we create the template',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    setTimeout(() => {
        Swal.fire('Success!', 'Template created successfully.', 'success');
        document.getElementById('create-template-modal').classList.remove('show');
        document.getElementById('create-template-modal').style.display = 'none';
        form.reset();
    }, 2000);
}

function sendTestEmail() {
    Swal.fire({
        title: 'Send Test Email',
        input: 'email',
        inputLabel: 'Test email address',
        inputPlaceholder: 'Enter email address',
        showCancelButton: true,
        confirmButtonText: 'Send Test',
        inputValidator: (value) => {
            if (!value) {
                return 'You need to enter an email address!'
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Test Sent!', `Test email sent to ${result.value}`, 'success');
        }
    });
}

function exportTemplates() {
    Swal.fire('Export Started', 'Templates are being exported...', 'info');
}

function bulkExport() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        Swal.fire('No Selection', 'Please select templates to export.', 'warning');
        return;
    }
    Swal.fire('Export Started', `Exporting ${selected.length} templates...`, 'info');
}

function bulkEdit() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        Swal.fire('No Selection', 'Please select templates to edit.', 'warning');
        return;
    }
    Swal.fire('Bulk Edit', `Edit ${selected.length} templates...`, 'info');
}

function bulkDisable() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        Swal.fire('No Selection', 'Please select templates to disable.', 'warning');
        return;
    }
    
    Swal.fire({
        title: `Disable ${selected.length} templates?`,
        text: "These templates will be disabled",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, disable them!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Disabled!', `${selected.length} templates disabled.`, 'success');
        }
    });
}

function bulkDelete() {
    const selected = document.querySelectorAll('#email-templates-table .select-row:checked');
    if (selected.length === 0) {
        Swal.fire('No Selection', 'Please select templates to delete.', 'warning');
        return;
    }
    
    Swal.fire({
        title: `Delete ${selected.length} templates?`,
        text: "These templates will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        confirmButtonText: 'Yes, delete them!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Deleted!', `${selected.length} templates deleted.`, 'success');
            // Remove selected rows
            selected.forEach(checkbox => {
                checkbox.closest('tr').remove();
            });
        }
    });
}

// Table selection handling
document.addEventListener('change', (e) => {
    if (e.target.matches('#email-templates-table .select-row, #email-templates-table .select-all')) {
        updateBulkActionsVisibility();
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

// Initialize tooltips and table functionality when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Your existing table and tooltip initialization code here
    console.log('Templates page loaded');
});
</script>
@endpush