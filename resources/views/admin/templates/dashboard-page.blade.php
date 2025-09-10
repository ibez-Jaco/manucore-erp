@extends('layouts.panel')

@section('title', 'Dashboard Template - ManuCore ERP')

@section('header', 'Executive Dashboard')
@section('subheader', 'Real-time business insights and key performance indicators')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="refreshDashboard()">
        🔄 Refresh Data
    </button>
    <button class="btn btn-primary" onclick="exportReport()">
        📊 Export Report
    </button>
@endsection

@section('content')
<div class="space-y-6">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">📈</div>
        <div class="alert-content">
            <div class="alert-title">Executive Dashboard Template</div>
            <div class="alert-message">Comprehensive dashboard with widgets, charts, and real-time business metrics for ERP systems.</div>
        </div>
    </div>

    {{-- Key Performance Indicators --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-600);">
                    💰
                </div>
                <div class="widget-stat-actions">
                    <button class="btn btn-ghost btn-sm" onclick="drillDownRevenue()">📊</button>
                </div>
            </div>
            <div class="widget-stat-value">R 2.4M</div>
            <div class="widget-stat-label">Monthly Revenue</div>
            <div class="widget-stat-change positive">+15.3% from last month</div>
            <div class="widget-stat-progress">
                <div class="progress-bar" style="width: 78%"></div>
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-600);">
                    📋
                </div>
                <div class="widget-stat-actions">
                    <button class="btn btn-ghost btn-sm" onclick="viewOrders()">👁️</button>
                </div>
            </div>
            <div class="widget-stat-value">847</div>
            <div class="widget-stat-label">Orders This Month</div>
            <div class="widget-stat-change positive">+12% completion rate</div>
            <div class="widget-stat-progress">
                <div class="progress-bar" style="width: 84%; background: var(--success-600);"></div>
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-600);">
                    👥
                </div>
                <div class="widget-stat-actions">
                    <button class="btn btn-ghost btn-sm" onclick="viewCustomers()">📞</button>
                </div>
            </div>
            <div class="widget-stat-value">234</div>
            <div class="widget-stat-label">Active Customers</div>
            <div class="widget-stat-change positive">+8 new customers</div>
            <div class="widget-stat-progress">
                <div class="progress-bar" style="width: 92%; background: var(--warning-600);"></div>
            </div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-600);">
                    📦
                </div>
                <div class="widget-stat-actions">
                    <button class="btn btn-ghost btn-sm" onclick="manageInventory()">⚙️</button>
                </div>
            </div>
            <div class="widget-stat-value">1,523</div>
            <div class="widget-stat-label">Items in Stock</div>
            <div class="widget-stat-change negative">-3% from restock cycle</div>
            <div class="widget-stat-progress">
                <div class="progress-bar" style="width: 67%; background: var(--danger-600);"></div>
            </div>
        </div>
    </div>

    {{-- Main Dashboard Grid --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        
        {{-- Sales Chart --}}
        <div class="lg:col-span-2">
            <div class="widget-chart">
                <div class="widget-chart-header">
                    <div>
                        <h3 class="widget-chart-title">Sales Performance</h3>
                        <p class="text-muted text-small">Revenue trends over the last 12 months</p>
                    </div>
                    <div class="widget-chart-actions">
                        <button class="btn btn-secondary btn-sm" onclick="changeChartPeriod('quarter')">Quarter</button>
                        <button class="btn btn-primary btn-sm active" onclick="changeChartPeriod('year')">Year</button>
                    </div>
                </div>
                <div class="widget-chart-body">
                    <div class="chart-container" style="height: 300px; background: linear-gradient(135deg, var(--brand-50), var(--brand-100)); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                        {{-- Simulated Chart --}}
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; display: flex; align-items: end; height: 80%; padding: 20px;">
                            <div style="flex: 1; height: 60%; background: var(--brand-400); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 75%; background: var(--brand-500); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 45%; background: var(--brand-400); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 85%; background: var(--brand-600); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 70%; background: var(--brand-500); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 55%; background: var(--brand-400); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 90%; background: var(--brand-700); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 80%; background: var(--brand-600); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 65%; background: var(--brand-500); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 95%; background: var(--brand-700); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 88%; background: var(--brand-600); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                            <div style="flex: 1; height: 78%; background: var(--brand-500); margin: 0 2px; border-radius: 3px 3px 0 0;"></div>
                        </div>
                        <div class="text-center" style="color: var(--brand-700); font-weight: 600; z-index: 1;">
                            📈 Interactive Chart Placeholder
                            <div class="mt-2 text-sm opacity-75">Replace with Chart.js, ApexCharts, or similar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div>
            <div class="widget-activity">
                <div class="widget-activity-header">
                    <h3 class="widget-activity-title">Recent Activity</h3>
                    <button class="btn btn-ghost btn-sm" onclick="viewAllActivity()">View All</button>
                </div>
                <div class="widget-activity-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--success-100); color: var(--success-600);">
                                ✅
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Order #ORD-2024-847 completed</div>
                                <div class="activity-meta">Acme Manufacturing • 2 mins ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--brand-100); color: var(--brand-600);">
                                👤
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">New customer registered</div>
                                <div class="activity-meta">TechCorp Solutions • 15 mins ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--warning-100); color: var(--warning-600);">
                                📦
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Low stock alert</div>
                                <div class="activity-meta">Widget Assembly Kit • 1 hour ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--brand-100); color: var(--brand-600);">
                                💰
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Payment received</div>
                                <div class="activity-meta">R 45,670 from Global Enterprises • 2 hours ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--success-100); color: var(--success-600);">
                                🚚
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Shipment dispatched</div>
                                <div class="activity-meta">Order #ORD-2024-845 • 3 hours ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Secondary Metrics Grid --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        
        {{-- Top Products --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Top Selling Products</h3>
                <button class="btn btn-secondary btn-sm" onclick="viewProductReport()">📊 Full Report</button>
            </div>
            <div class="card-body">
                <div class="space-y-4">
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 48px; height: 48px; background: var(--brand-100); color: var(--brand-600); border-radius: var(--radius-lg); font-size: 1.25rem;">
                            ⚙️
                        </div>
                        <div class="flex-1">
                            <div class="justify-between d-flex align-center">
                                <div>
                                    <div class="font-semibold text-neutral-900">Premium Widget Assembly</div>
                                    <div class="text-sm text-neutral-500">SKU: PWA-001</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-brand-600">453 sold</div>
                                    <div class="text-sm text-neutral-500">R 892,340</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 48px; height: 48px; background: var(--success-100); color: var(--success-600); border-radius: var(--radius-lg); font-size: 1.25rem;">
                            🔧
                        </div>
                        <div class="flex-1">
                            <div class="justify-between d-flex align-center">
                                <div>
                                    <div class="font-semibold text-neutral-900">Industrial Connector Set</div>
                                    <div class="text-sm text-neutral-500">SKU: ICS-024</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-success-600">387 sold</div>
                                    <div class="text-sm text-neutral-500">R 658,790</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 48px; height: 48px; background: var(--warning-100); color: var(--warning-600); border-radius: var(--radius-lg); font-size: 1.25rem;">
                            🏗️
                        </div>
                        <div class="flex-1">
                            <div class="justify-between d-flex align-center">
                                <div>
                                    <div class="font-semibold text-neutral-900">Heavy Duty Mounting Kit</div>
                                    <div class="text-sm text-neutral-500">SKU: HDM-156</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-warning-600">289 sold</div>
                                    <div class="text-sm text-neutral-500">R 445,230</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap-4 d-flex align-center">
                        <div class="justify-center d-flex align-center" style="width: 48px; height: 48px; background: var(--neutral-200); color: var(--neutral-600); border-radius: var(--radius-lg); font-size: 1.25rem;">
                            ⚡
                        </div>
                        <div class="flex-1">
                            <div class="justify-between d-flex align-center">
                                <div>
                                    <div class="font-semibold text-neutral-900">Power Supply Module</div>
                                    <div class="text-sm text-neutral-500">SKU: PSM-089</div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-neutral-600">256 sold</div>
                                    <div class="text-sm text-neutral-500">R 378,940</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Order Status Distribution --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Order Status Overview</h3>
                <button class="btn btn-secondary btn-sm" onclick="manageOrders()">⚙️ Manage</button>
            </div>
            <div class="card-body">
                {{-- Order Status Chart --}}
                <div class="mb-6">
                    <div class="chart-container" style="height: 200px; background: linear-gradient(135deg, var(--neutral-50), var(--neutral-100)); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; position: relative;">
                        {{-- Donut Chart Simulation --}}
                        <div style="width: 120px; height: 120px; border-radius: 50%; border: 30px solid var(--neutral-200); border-top-color: var(--brand-600); border-right-color: var(--success-600); border-bottom-color: var(--warning-600); border-left-color: var(--danger-600); position: relative;">
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-center; font-weight: bold; color: var(--neutral-700);">
                                847
                                <div style="font-size: 12px; font-weight: normal;">Orders</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Status Legend --}}
                <div class="space-y-3">
                    <div class="justify-between d-flex align-center">
                        <div class="gap-2 d-flex align-center">
                            <div style="width: 12px; height: 12px; background: var(--brand-600); border-radius: 50%;"></div>
                            <span class="text-sm">Processing</span>
                        </div>
                        <div class="text-sm font-semibold">347 (41%)</div>
                    </div>
                    <div class="justify-between d-flex align-center">
                        <div class="gap-2 d-flex align-center">
                            <div style="width: 12px; height: 12px; background: var(--success-600); border-radius: 50%;"></div>
                            <span class="text-sm">Completed</span>
                        </div>
                        <div class="text-sm font-semibold">289 (34%)</div>
                    </div>
                    <div class="justify-between d-flex align-center">
                        <div class="gap-2 d-flex align-center">
                            <div style="width: 12px; height: 12px; background: var(--warning-600); border-radius: 50%;"></div>
                            <span class="text-sm">Pending</span>
                        </div>
                        <div class="text-sm font-semibold">156 (18%)</div>
                    </div>
                    <div class="justify-between d-flex align-center">
                        <div class="gap-2 d-flex align-center">
                            <div style="width: 12px; height: 12px; background: var(--danger-600); border-radius: 50%;"></div>
                            <span class="text-sm">Overdue</span>
                        </div>
                        <div class="text-sm font-semibold">55 (7%)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions Panel --}}
    <div class="card">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Quick Actions</h3>
            <span class="text-sm text-neutral-500">Common tasks and shortcuts</span>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <button class="justify-start gap-3 p-4 btn btn-primary d-flex align-center" onclick="createOrder()">
                    <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.2); border-radius: var(--radius-lg);">
                        📋
                    </div>
                    <div class="text-left">
                        <div class="font-semibold">New Order</div>
                        <div class="text-xs opacity-75">Create sales order</div>
                    </div>
                </button>
                <button class="justify-start gap-3 p-4 btn btn-success d-flex align-center" onclick="addCustomer()">
                    <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.2); border-radius: var(--radius-lg);">
                        👤
                    </div>
                    <div class="text-left">
                        <div class="font-semibold">Add Customer</div>
                        <div class="text-xs opacity-75">Register new customer</div>
                    </div>
                </button>
                <button class="justify-start gap-3 p-4 btn btn-warning d-flex align-center" onclick="manageInventory()">
                    <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.2); border-radius: var(--radius-lg);">
                        📦
                    </div>
                    <div class="text-left">
                        <div class="font-semibold">Update Stock</div>
                        <div class="text-xs opacity-75">Manage inventory</div>
                    </div>
                </button>
                <button class="justify-start gap-3 p-4 btn btn-secondary d-flex align-center" onclick="generateReport()">
                    <div class="justify-center d-flex align-center" style="width: 40px; height: 40px; background: var(--neutral-100); border-radius: var(--radius-lg); color: var(--neutral-600);">
                        📊
                    </div>
                    <div class="text-left">
                        <div class="font-semibold">Generate Report</div>
                        <div class="text-xs opacity-75">Business analytics</div>
                    </div>
                </button>
            </div>
        </div>
    </div>

    {{-- Alerts & Notifications --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">System Alerts</h3>
                <span class="badge badge-danger">3 Critical</span>
            </div>
            <div class="card-body">
                <div class="space-y-3">
                    <div class="alert alert-danger">
                        <div class="alert-icon">🚨</div>
                        <div class="alert-content">
                            <div class="alert-title">Low Stock Alert</div>
                            <div class="alert-message">5 products are critically low on stock</div>
                        </div>
                        <button class="btn btn-ghost btn-sm" onclick="viewLowStock()">View</button>
                    </div>
                    <div class="alert alert-warning">
                        <div class="alert-icon">⚠️</div>
                        <div class="alert-content">
                            <div class="alert-title">Overdue Orders</div>
                            <div class="alert-message">12 orders are past their delivery date</div>
                        </div>
                        <button class="btn btn-ghost btn-sm" onclick="viewOverdue()">Review</button>
                    </div>
                    <div class="alert alert-primary">
                        <div class="alert-icon">💰</div>
                        <div class="alert-content">
                            <div class="alert-title">Payment Received</div>
                            <div class="alert-message">R 125,000 payment from TechCorp Solutions</div>
                        </div>
                        <button class="btn btn-ghost btn-sm" onclick="viewPayment()">Details</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Financial Summary</h3>
                <button class="btn btn-secondary btn-sm" onclick="viewFinancials()">📈 Full Report</button>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 text-center rounded-lg bg-success-50">
                        <div class="text-2xl font-bold text-success-600">R 2.4M</div>
                        <div class="text-sm text-success-700">Revenue (MTD)</div>
                        <div class="mt-1 text-xs text-success-600">+15.3% ↗️</div>
                    </div>
                    <div class="p-4 text-center rounded-lg bg-brand-50">
                        <div class="text-2xl font-bold text-brand-600">R 1.8M</div>
                        <div class="text-sm text-brand-700">Expenses (MTD)</div>
                        <div class="mt-1 text-xs text-brand-600">+8.7% ↗️</div>
                    </div>
                    <div class="p-4 text-center rounded-lg bg-warning-50">
                        <div class="text-2xl font-bold text-warning-600">R 890K</div>
                        <div class="text-sm text-warning-700">Outstanding</div>
                        <div class="mt-1 text-xs text-warning-600">-12.1% ↘️</div>
                    </div>
                    <div class="p-4 text-center rounded-lg bg-neutral-100">
                        <div class="text-2xl font-bold text-neutral-600">R 3.2M</div>
                        <div class="text-sm text-neutral-700">Assets Value</div>
                        <div class="mt-1 text-xs text-neutral-600">+2.4% ↗️</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('head')
<style>
/* Dashboard specific styles */
.widget-stat-progress {
    height: 4px;
    background: var(--neutral-200);
    border-radius: var(--radius-full);
    margin-top: var(--space-2);
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: var(--brand-600);
    border-radius: var(--radius-full);
    transition: width var(--transition-slow);
}

.chart-container {
    position: relative;
    width: 100%;
}

.activity-list {
    max-height: 400px;
    overflow-y: auto;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    border-radius: var(--radius-lg);
    transition: background var(--transition-fast);
    margin-bottom: var(--space-2);
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
    font-size: 14px;
}

.activity-content {
    flex: 1;
    min-width: 0;
}

.activity-title {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
    line-height: 1.2;
}

.activity-meta {
    font-size: var(--text-xs);
    color: var(--neutral-500);
    margin-top: 2px;
}

/* Widget actions */
.widget-stat-actions {
    display: flex;
    gap: var(--space-1);
}

.widget-activity-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--space-4) var(--space-6);
    border-bottom: 1px solid var(--neutral-200);
}

.widget-activity-title {
    font-size: var(--text-lg);
    font-weight: 600;
    color: var(--neutral-900);
}

.widget-activity-body {
    padding: var(--space-4);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .widget-grid-4 {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .activity-item {
        padding: var(--space-2);
    }
    
    .activity-icon {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .widget-grid-4 {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Dashboard interaction functions
function refreshDashboard() {
    if (window.ManuCore) {
        ManuCore.showLoading('Refreshing Dashboard...', 'Updating all metrics and data');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('Dashboard refreshed successfully!', 'success');
            
            // Simulate updating some values
            updateMetrics();
        }, 2500);
    }
}

function updateMetrics() {
    // Simulate real-time metric updates
    const metrics = document.querySelectorAll('.widget-stat-value');
    metrics.forEach(metric => {
        metric.style.transition = 'all 0.5s ease';
        metric.style.transform = 'scale(1.05)';
        setTimeout(() => {
            metric.style.transform = 'scale(1)';
        }, 300);
    });
}

function exportReport() {
    if (window.ManuCore) {
        ManuCore.showToast('Generating comprehensive report...', 'info');
    }
}

function drillDownRevenue() {
    if (window.Swal) {
        Swal.fire({
            title: 'Revenue Breakdown',
            html: `
                <div style="text-align: left;">
                    <h4>Monthly Revenue: R 2.4M</h4>
                    <div style="margin: 20px 0;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Product Sales:</span>
                            <strong>R 1.8M (75%)</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Service Revenue:</span>
                            <strong>R 450K (19%)</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Consulting:</span>
                            <strong>R 120K (5%)</strong>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Other:</span>
                            <strong>R 30K (1%)</strong>
                        </div>
                    </div>
                    <div style="background: #f0f9ff; padding: 15px; border-radius: 8px; border-left: 4px solid var(--brand-600);">
                        <strong>Growth:</strong> +15.3% from last month
                    </div>
                </div>
            `,
            width: '500px',
            confirmButtonColor: 'var(--brand-600)'
        });
    }
}

function viewOrders() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening order management...', 'info');
    }
}

function viewCustomers() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening customer directory...', 'info');
    }
}

function manageInventory() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening inventory management...', 'info');
    }
}

function changeChartPeriod(period) {
    // Update active button
    document.querySelectorAll('.widget-chart-actions .btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
    
    if (window.ManuCore) {
        ManuCore.showToast(`Switched to ${period} view`, 'info');
    }
}

function viewAllActivity() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening full activity log...', 'info');
    }
}

function viewProductReport() {
    if (window.Swal) {
        Swal.fire({
            title: 'Product Performance Report',
            html: `
                <div style="text-align: left;">
                    <div style="margin-bottom: 20px;">
                        <h4>Top 10 Products This Month</h4>
                        <p style="font-size: 14px; color: #666;">Ranked by revenue generated</p>
                    </div>
                    <div style="background: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 12px;">
                        1. Premium Widget Assembly    R 892,340<br>
                        2. Industrial Connector Set   R 658,790<br>
                        3. Heavy Duty Mounting Kit    R 445,230<br>
                        4. Power Supply Module        R 378,940<br>
                        5. Control Panel Interface    R 298,560<br>
                        6. Safety Coupling System     R 234,120<br>
                        7. Precision Alignment Tool   R 189,870<br>
                        8. Thermal Management Unit    R 156,450<br>
                        9. Digital Display Module     R 134,200<br>
                        10. Backup Power Controller   R 98,730
                    </div>
                </div>
            `,
            width: '600px',
            confirmButtonColor: 'var(--brand-600)'
        });
    }
}

function manageOrders() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening order management system...', 'info');
    }
}

// Quick Actions
function createOrder() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening new order form...', 'info');
    }
}

function addCustomer() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening customer registration...', 'info');
    }
}

function generateReport() {
    if (window.Swal) {
        Swal.fire({
            title: 'Generate Report',
            html: `
                <div style="margin: 20px 0;">
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Report Type:</label>
                    <select id="report-type" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 15px;">
                        <option value="sales">Sales Report</option>
                        <option value="inventory">Inventory Report</option>
                        <option value="financial">Financial Summary</option>
                        <option value="customer">Customer Analysis</option>
                    </select>
                    <label style="display: block; margin-bottom: 10px; font-weight: bold;">Time Period:</label>
                    <select id="report-period" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px;">
                        <option value="thismonth">This Month</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="thisquarter">This Quarter</option>
                        <option value="thisyear">This Year</option>
                    </select>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: 'var(--brand-600)',
            confirmButtonText: 'Generate Report'
        }).then((result) => {
            if (result.isConfirmed) {
                if (window.ManuCore) {
                    ManuCore.showToast('Report generation started...', 'success');
                }
            }
        });
    }
}

// Alert Actions
function viewLowStock() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening low stock report...', 'warning');
    }
}

function viewOverdue() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening overdue orders...', 'warning');
    }
}

function viewPayment() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening payment details...', 'info');
    }
}

function viewFinancials() {
    if (window.ManuCore) {
        ManuCore.showToast('Opening financial dashboard...', 'info');
    }
}

// Auto-refresh simulation
let autoRefreshInterval;

function startAutoRefresh() {
    autoRefreshInterval = setInterval(() => {
        // Simulate small metric updates
        const changeElements = document.querySelectorAll('.widget-stat-change');
        changeElements.forEach(elem => {
            if (Math.random() > 0.7) { // 30% chance of update
                elem.style.animation = 'pulse 1s ease-in-out';
                setTimeout(() => {
                    elem.style.animation = '';
                }, 1000);
            }
        });
    }, 30000); // Every 30 seconds
}

function stopAutoRefresh() {
    if (autoRefreshInterval) {
        clearInterval(autoRefreshInterval);
    }
}

// Initialize dashboard
document.addEventListener('DOMContentLoaded', function() {
    console.log('📈 Dashboard Template loaded');
    
    // Start auto-refresh
    startAutoRefresh();
    
    // Stop auto-refresh when page is hidden
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            stopAutoRefresh();
        } else {
            startAutoRefresh();
        }
    });
    
    // Initialize tooltips and interactive elements
    if (window.ManuCore) {
        ManuCore.initTooltips();
    }
});

// Cleanup on page unload
window.addEventListener('beforeunload', () => {
    stopAutoRefresh();
});
</script>
@endpush