@extends('layouts.panel')

@section('title', 'Table Page Template - ManuCore ERP')

@section('header', 'Order Management')
@section('subheader', 'Advanced data table with filtering, sorting, and bulk actions')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="exportOrders()">
        📤 Export Orders
    </button>
    <button class="btn btn-primary" data-modal-open="create-order-modal">
        ➕ New Order
    </button>
@endsection

@section('content')
<div class="space-y-6">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">📊</div>
        <div class="alert-content">
            <div class="alert-title">Advanced Table Template</div>
            <div class="alert-message">Demonstrates data tables with search, filtering, sorting, pagination, and bulk operations.</div>
        </div>
    </div>

    {{-- Stats Summary --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);">
                    📋
                </div>
            </div>
            <div class="widget-stat-value">2,847</div>
            <div class="widget-stat-label">Total Orders</div>
            <div class="widget-stat-change positive">+12% from last month</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-600);">
                    ✅
                </div>
            </div>
            <div class="widget-stat-value">1,923</div>
            <div class="widget-stat-label">Completed</div>
            <div class="widget-stat-change positive">+8% completion rate</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-600);">
                    ⏳
                </div>
            </div>
            <div class="widget-stat-value">756</div>
            <div class="widget-stat-label">In Progress</div>
            <div class="widget-stat-change neutral">Same as last week</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-600);">
                    🚨
                </div>
            </div>
            <div class="widget-stat-value">168</div>
            <div class="widget-stat-label">Overdue</div>
            <div class="widget-stat-change negative">+3 since yesterday</div>
        </div>
    </div>

    {{-- Orders Data Table --}}
    <div class="data-table-container">
        <div class="data-table-header">
            <h3 class="data-table-title">Sales Orders</h3>
            <div class="data-table-actions">
                {{-- Search --}}
                <div class="data-table-search">
                    <input type="text" class="form-input form-input-sm" placeholder="Search orders..." id="order-search">
                </div>
                
                {{-- Filter Chips --}}
                <div class="filter-chips">
                    <div class="filter-chip active" data-filter="all">
                        All Orders
                        <span class="filter-chip-remove">×</span>
                    </div>
                    <div class="filter-chip" data-filter="pending">
                        Pending
                    </div>
                    <div class="filter-chip" data-filter="processing">
                        Processing
                    </div>
                    <div class="filter-chip" data-filter="shipped">
                        Shipped
                    </div>
                    <div class="filter-chip" data-filter="delivered">
                        Delivered
                    </div>
                </div>
                
                {{-- Quick Actions --}}
                <button class="btn btn-secondary btn-sm" onclick="refreshTable()">
                    🔄 Refresh
                </button>
            </div>
        </div>

        {{-- Bulk Actions (Hidden by default) --}}
        <div id="bulk-actions" class="bulk-actions-bar" style="display: none;">
            <div class="justify-between d-flex align-center">
                <span class="selection-count">0 selected</span>
                <div class="gap-2 d-flex">
                    <button class="btn btn-secondary btn-sm" onclick="bulkUpdate()">📝 Update Status</button>
                    <button class="btn btn-secondary btn-sm" onclick="bulkExport()">📤 Export Selected</button>
                    <button class="btn btn-danger btn-sm" onclick="bulkDelete()">🗑️ Delete Selected</button>
                </div>
            </div>
        </div>

        {{-- Orders Table --}}
        <table class="data-table" id="orders-table" data-selectable="true">
            <thead>
                <tr>
                    <th class="table-select-column">
                        <input type="checkbox" class="select-all" aria-label="Select all">
                    </th>
                    <th class="sortable" data-sort="order_number">Order #</th>
                    <th class="sortable" data-sort="customer">Customer</th>
                    <th class="sortable" data-sort="date">Order Date</th>
                    <th class="sortable" data-sort="status">Status</th>
                    <th class="sortable" data-sort="amount">Amount</th>
                    <th class="sortable" data-sort="delivery_date">Delivery Date</th>
                    <th class="table-actions-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1" data-status="processing">
                    <td class="table-select-cell">
                        <input type="checkbox" class="select-row" value="1" aria-label="Select row">
                    </td>
                    <td>
                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-001</div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="font-semibold text-neutral-900">Acme Manufacturing</div>
                            <div class="text-sm text-neutral-500">John Smith</div>
                        </div>
                    </td>
                    <td class="text-sm text-neutral-600">2024-09-05</td>
                    <td><span class="badge badge-warning">Processing</span></td>
                    <td class="font-semibold">R 45,670.00</td>
                    <td class="text-sm text-neutral-600">2024-09-12</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(1)">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit Order" onclick="editOrder(1)">✏️</button>
                            <button class="table-action-btn" data-tooltip="Print Invoice" onclick="printInvoice(1)">🖨️</button>
                            <button class="table-action-btn" data-tooltip="Delete Order" onclick="deleteOrder(1)">🗑️</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2" data-status="shipped">
                    <td class="table-select-cell">
                        <input type="checkbox" class="select-row" value="2" aria-label="Select row">
                    </td>
                    <td>
                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-002</div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="font-semibold text-neutral-900">TechCorp Solutions</div>
                            <div class="text-sm text-neutral-500">Sarah Johnson</div>
                        </div>
                    </td>
                    <td class="text-sm text-neutral-600">2024-09-04</td>
                    <td><span class="badge badge-primary">Shipped</span></td>
                    <td class="font-semibold">R 78,950.00</td>
                    <td class="text-sm text-neutral-600">2024-09-10</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(2)">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit Order" onclick="editOrder(2)">✏️</button>
                            <button class="table-action-btn" data-tooltip="Track Shipment" onclick="trackShipment(2)">📦</button>
                            <button class="table-action-btn" data-tooltip="Print Invoice" onclick="printInvoice(2)">🖨️</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3" data-status="delivered">
                    <td class="table-select-cell">
                        <input type="checkbox" class="select-row" value="3" aria-label="Select row">
                    </td>
                    <td>
                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-003</div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="font-semibold text-neutral-900">Global Enterprises</div>
                            <div class="text-sm text-neutral-500">Mike Wilson</div>
                        </div>
                    </td>
                    <td class="text-sm text-neutral-600">2024-09-03</td>
                    <td><span class="badge badge-success">Delivered</span></td>
                    <td class="font-semibold">R 125,430.00</td>
                    <td class="text-sm text-neutral-600">2024-09-09</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(3)">👁️</button>
                            <button class="table-action-btn" data-tooltip="Print Invoice" onclick="printInvoice(3)">🖨️</button>
                            <button class="table-action-btn" data-tooltip="Customer Feedback" onclick="feedback(3)">⭐</button>
                            <button class="table-action-btn" data-tooltip="Reorder" onclick="reorder(3)">🔄</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4" data-status="pending">
                    <td class="table-select-cell">
                        <input type="checkbox" class="select-row" value="4" aria-label="Select row">
                    </td>
                    <td>
                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-004</div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="font-semibold text-neutral-900">Industrial Supplies Co.</div>
                            <div class="text-sm text-neutral-500">Lisa Chen</div>
                        </div>
                    </td>
                    <td class="text-sm text-neutral-600">2024-09-06</td>
                    <td><span class="badge badge-neutral">Pending</span></td>
                    <td class="font-semibold">R 67,890.00</td>
                    <td class="text-sm text-neutral-600">2024-09-15</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(4)">👁️</button>
                            <button class="table-action-btn" data-tooltip="Edit Order" onclick="editOrder(4)">✏️</button>
                            <button class="table-action-btn" data-tooltip="Approve Order" onclick="approveOrder(4)">✅</button>
                            <button class="table-action-btn" data-tooltip="Cancel Order" onclick="cancelOrder(4)">❌</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5" data-status="overdue">
                    <td class="table-select-cell">
                        <input type="checkbox" class="select-row" value="5" aria-label="Select row">
                    </td>
                    <td>
                        <div class="font-mono font-semibold text-brand-600">#ORD-2024-005</div>
                    </td>
                    <td>
                        <div class="customer-info">
                            <div class="font-semibold text-neutral-900">Quick Parts Ltd.</div>
                            <div class="text-sm text-neutral-500">David Brown</div>
                        </div>
                    </td>
                    <td class="text-sm text-neutral-600">2024-08-28</td>
                    <td><span class="badge badge-danger">Overdue</span></td>
                    <td class="font-semibold">R 34,250.00</td>
                    <td class="text-sm text-danger-600">2024-09-05</td>
                    <td>
                        <div class="table-actions">
                            <button class="table-action-btn" data-tooltip="View Order" onclick="viewOrder(5)">👁️</button>
                            <button class="table-action-btn" data-tooltip="Urgent Action" onclick="urgentAction(5)">🚨</button>
                            <button class="table-action-btn" data-tooltip="Contact Customer" onclick="contactCustomer(5)">📞</button>
                            <button class="table-action-btn" data-tooltip="Reschedule" onclick="reschedule(5)">📅</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="table-pagination">
            <div class="table-pagination-info">
                <span class="text-small text-muted">Showing <strong>1-5</strong> of <strong>2,847</strong> orders</span>
            </div>
            <div class="table-pagination-controls">
                <button class="btn btn-secondary btn-sm" disabled>Previous</button>
                <button class="btn btn-secondary btn-sm active">1</button>
                <button class="btn btn-secondary btn-sm">2</button>
                <button class="btn btn-secondary btn-sm">3</button>
                <span class="text-muted">...</span>
                <button class="btn btn-secondary btn-sm">570</button>
                <button class="btn btn-secondary btn-sm">Next</button>
            </div>
        </div>
    </div>

</div>

{{-- Create Order Modal --}}
<div class="modal-backdrop" id="create-order-modal">
    <div class="modal modal-lg">
        <div class="modal-header">
            <h3 class="modal-title">Create New Order</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <form id="create-order-form">
                @csrf
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="form-group">
                        <label class="form-label">Customer *</label>
                        <select class="form-select" name="customer_id" required>
                            <option value="">Select customer</option>
                            <option value="1">Acme Manufacturing</option>
                            <option value="2">TechCorp Solutions</option>
                            <option value="3">Global Enterprises</option>
                            <option value="4">Industrial Supplies Co.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Date *</label>
                        <input type="date" class="form-input" name="order_date" value="2024-09-09" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Delivery Date *</label>
                        <input type="date" class="form-input" name="delivery_date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-select" name="priority">
                            <option value="normal" selected>Normal</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Special Instructions</label>
                    <textarea class="form-textarea" name="instructions" rows="3" placeholder="Any special delivery or handling instructions..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Cancel</button>
            <button class="btn btn-primary" onclick="createOrder()">Create Order</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Table interaction functions
let selectedRows = [];

function viewOrder(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Viewing order #${id}`, 'info');
    }
}

function editOrder(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Editing order #${id}`, 'info');
    }
}

function deleteOrder(id) {
    if (window.ManuCore) {
        ManuCore.confirmDelete('Delete Order?', 'This order will be permanently deleted!').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast('Order deleted successfully', 'success');
                // Remove row from table
                document.querySelector(`tr[data-id="${id}"]`)?.remove();
                updateBulkActionsVisibility();
            }
        });
    }
}

function printInvoice(id) {
    if (window.ManuCore) {
        ManuCore.showToast(`Printing invoice for order #${id}`, 'info');
    }
}

function trackShipment(id) {
    if (window.Swal) {
        Swal.fire({
            title: 'Shipment Tracking',
            html: `
                <div style="text-align: left;">
                    <h4>Order #ORD-2024-00${id}</h4>
                    <div style="margin: 20px 0;">
                        <div style="margin-bottom: 10px;">
                            <strong>Tracking Number:</strong> TRK123456789${id}
                        </div>
                        <div style="margin-bottom: 10px;">
                            <strong>Carrier:</strong> FastTrack Logistics
                        </div>
                        <div style="margin-bottom: 10px;">
                            <strong>Status:</strong> In Transit
                        </div>
                        <div style="margin-bottom: 10px;">
                            <strong>Est. Delivery:</strong> Tomorrow 2:00 PM
                        </div>
                    </div>
                    <div style="background: #f0f9ff; padding: 15px; border-radius: 8px; border-left: 4px solid var(--brand-600);">
                        <strong>Latest Update:</strong> Package is out for delivery
                    </div>
                </div>
            `,
            confirmButtonColor: 'var(--brand-600)'
        });
    }
}

function approveOrder(id) {
    if (window.ManuCore) {
        ManuCore.showSuccess('Order Approved!', `Order #${id} has been approved and moved to processing.`);
        // Update status badge
        const row = document.querySelector(`tr[data-id="${id}"]`);
        if (row) {
            const statusCell = row.querySelector('.badge');
            statusCell.className = 'badge badge-warning';
            statusCell.textContent = 'Processing';
            row.dataset.status = 'processing';
        }
    }
}

function exportOrders() {
    if (window.ManuCore) {
        ManuCore.showToast('Exporting orders to Excel...', 'info');
    }
}

function refreshTable() {
    if (window.ManuCore) {
        ManuCore.showToast('Table refreshed', 'success');
    }
}

function createOrder() {
    const form = document.getElementById('create-order-form');
    const formData = new FormData(form);
    
    // Basic validation
    if (!formData.get('customer_id') || !formData.get('order_date') || !formData.get('delivery_date')) {
        if (window.ManuCore) {
            ManuCore.showToast('Please fill in all required fields', 'error');
        }
        return;
    }
    
    if (window.ManuCore) {
        ManuCore.showLoading('Creating Order...', 'Please wait while we create the order');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('Order created successfully!', 'success');
            ManuCore.closeModal('create-order-modal');
            form.reset();
        }, 2000);
    }
}

// Bulk operations
function bulkUpdate() {
    const selected = document.querySelectorAll('#orders-table .select-row:checked');
    if (selected.length === 0) {
        if (window.ManuCore) {
            ManuCore.showToast('Please select orders to update', 'warning');
        }
        return;
    }
    
    if (window.Swal) {
        Swal.fire({
            title: 'Update Status',
            html: `
                <div style="margin: 20px 0;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">New Status:</label>
                    <select id="bulk-status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px;">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: 'var(--brand-600)',
            confirmButtonText: `Update ${selected.length} Orders`
        }).then((result) => {
            if (result.isConfirmed) {
                if (window.ManuCore) {
                    ManuCore.showToast(`Updated ${selected.length} orders`, 'success');
                }
            }
        });
    }
}

function bulkExport() {
    const selected = document.querySelectorAll('#orders-table .select-row:checked');
    if (selected.length === 0) {
        if (window.ManuCore) {
            ManuCore.showToast('Please select orders to export', 'warning');
        }
        return;
    }
    
    if (window.ManuCore) {
        ManuCore.showToast(`Exporting ${selected.length} selected orders`, 'info');
    }
}

function bulkDelete() {
    const selected = document.querySelectorAll('#orders-table .select-row:checked');
    if (selected.length === 0) {
        if (window.ManuCore) {
            ManuCore.showToast('Please select orders to delete', 'warning');
        }
        return;
    }
    
    if (window.ManuCore) {
        ManuCore.confirmDelete(`Delete ${selected.length} orders?`, 'These orders will be permanently deleted!').then((result) => {
            if (result.isConfirmed) {
                ManuCore.showToast(`${selected.length} orders deleted`, 'success');
                // Remove selected rows
                selected.forEach(checkbox => {
                    checkbox.closest('tr').remove();
                });
                updateBulkActionsVisibility();
            }
        });
    }
}

// Table filtering
document.addEventListener('click', (e) => {
    if (e.target.matches('.filter-chip')) {
        const filter = e.target.dataset.filter;
        
        // Update active state
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.classList.remove('active');
        });
        e.target.classList.add('active');
        
        // Filter table rows
        const rows = document.querySelectorAll('#orders-table tbody tr');
        rows.forEach(row => {
            if (filter === 'all' || row.dataset.status === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        
        if (window.ManuCore) {
            ManuCore.showToast(`Filtered by: ${e.target.textContent.trim()}`, 'info');
        }
    }
});

// Search functionality
document.getElementById('order-search').addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#orders-table tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Table selection handling
document.addEventListener('change', (e) => {
    if (e.target.matches('#orders-table .select-row, #orders-table .select-all')) {
        updateBulkActionsVisibility();
        
        // Handle select all
        if (e.target.matches('.select-all')) {
            const checked = e.target.checked;
            document.querySelectorAll('#orders-table .select-row').forEach(checkbox => {
                checkbox.checked = checked;
                checkbox.closest('tr').classList.toggle('selected', checked);
            });
        } else {
            // Handle individual row selection
            const row = e.target.closest('tr');
            row.classList.toggle('selected', e.target.checked);
            
            // Update select all state
            const allRows = document.querySelectorAll('#orders-table .select-row');
            const checkedRows = document.querySelectorAll('#orders-table .select-row:checked');
            const selectAll = document.querySelector('#orders-table .select-all');
            
            if (selectAll) {
                selectAll.checked = allRows.length === checkedRows.length;
                selectAll.indeterminate = checkedRows.length > 0 && checkedRows.length < allRows.length;
            }
        }
    }
});

function updateBulkActionsVisibility() {
    const selectedCount = document.querySelectorAll('#orders-table .select-row:checked').length;
    const bulkActions = document.getElementById('bulk-actions');
    const countElement = document.querySelector('.selection-count');
    
    if (bulkActions) {
        bulkActions.style.display = selectedCount > 0 ? 'block' : 'none';
    }
    
    if (countElement) {
        countElement.textContent = `${selectedCount} selected`;
    }
}

// Column sorting
document.addEventListener('click', (e) => {
    if (e.target.matches('.sortable')) {
        const column = e.target.dataset.sort;
        if (window.ManuCore) {
            ManuCore.showToast(`Sorting by: ${column}`, 'info');
        }
        // Add visual indicator
        document.querySelectorAll('.sortable').forEach(th => {
            th.classList.remove('sort-asc', 'sort-desc');
        });
        e.target.classList.add('sort-asc');
    }
});

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    if (window.ManuCore) {
        ManuCore.initDataTables();
        ManuCore.initTooltips();
    }
    
    console.log('📊 Table Page Template loaded');
});
</script>
@endpush