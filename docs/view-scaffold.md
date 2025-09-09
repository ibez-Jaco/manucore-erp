{{-- resources/views/_reference/view-blueprint.blade.php
     Blueprint / Starter for new views in ManuCore ERP
     ---------------------------------------------------------------------
     HOW TO USE
     1) Duplicate this file alongside your target view and rename appropriately.
     2) Replace SECTION: markers and labels with your feature’s names.
     3) Swap dummy rows with real data (or keep until back-end is ready).
     4) Keep icons to the safe set already in your app (used below).
     5) Keep JS helpers; they’re theme/dark-mode/accent safe.
--}}

@extends('layouts.panel')

{{-- ===== PAGE METADATA ===== --}}
@section('title', 'Blueprint — ManuCore ERP')
@section('header', 'SECTION: Page Title')
@section('subheader', 'Short description of what this page does')

{{-- (Optional) Page actions --}}
@section('page-actions')
<button class="btn btn-secondary" data-soon="Export">
<x-lucide-download class="w-4 h-4 mr-2" /> Export
</button>
<button class="btn btn-primary" data-modal-open="blueprint-edit-modal" data-mode="create">
<x-lucide-plus class="w-4 h-4 mr-2" /> New Record
</button>
@endsection

@section('content')

<div class="space-y-6 view-blueprint">

    {{-- ===== OVERVIEW STATS ===== --}}
    <div class="widget-grid widget-grid-4">
        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-clipboard-list class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">128</div>
            <div class="widget-stat-label">Total Records</div>
            <div class="widget-stat-change positive">+12 this month</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--success-100); color: var(--success-700);">
                    <x-lucide-badge-check class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">94</div>
            <div class="widget-stat-label">Active</div>
            <div class="widget-stat-change positive">+4 this week</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--warning-100); color: var(--warning-700);">
                    <x-lucide-alert-triangle class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">6</div>
            <div class="widget-stat-label">Needs Attention</div>
            <div class="widget-stat-change negative">-1 today</div>
        </div>

        <div class="widget-stat">
            <div class="widget-stat-header">
                <div class="widget-stat-icon" style="background: var(--danger-100); color: var(--danger-700);">
                    <x-lucide-bar-chart-3 class="w-4 h-4" />
                </div>
            </div>
            <div class="widget-stat-value">72%</div>
            <div class="widget-stat-label">SLA Met</div>
            <div class="widget-stat-change positive">+5%</div>
        </div>
    </div>

    {{-- ===== OPTIONAL: TABS (Keep if page needs multiple groupings) ===== --}}
    <div class="card">
        <div class="card-body">
            <div class="nav-tabs">
                <a href="#" class="nav-tab active" data-tab-target="tab-all">All</a>
                <a href="#" class="nav-tab" data-tab-target="tab-active">Active</a>
                <a href="#" class="nav-tab" data-tab-target="tab-archive">Archive</a>
            </div>

            {{-- ===== TAB: ALL ===== --}}
            <div id="tab-all" class="tab-panel" style="display:block;">
                <div class="data-table-container">

                    {{-- Toolbar --}}
                    <div class="data-table-header">
                        <h3 class="data-table-title">SECTION: Records</h3>
                        <div class="data-table-actions">
                            {{-- Search --}}
                            <div class="data-table-search">
                                <x-lucide-search class="w-4 h-4 mr-2 text-neutral-400" />
                                <input type="text" class="form-input form-input-sm"
                                       placeholder="Search records…"
                                       id="bp-search" data-table-search="bp-table">
                            </div>

                            {{-- Filter chips (toggleable) --}}
                            <div class="filter-chips" id="bp-chips">
                                <div class="filter-chip active" data-filter="all">
                                    All
                                    <span class="filter-chip-remove">×</span>
                                </div>
                                <div class="filter-chip" data-filter="active">Active</div>
                                <div class="filter-chip" data-filter="pending">Pending</div>
                                <div class="filter-chip" data-filter="archived">Archived</div>
                            </div>

                            {{-- View toggles --}}
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm" id="bp-view-table" data-tooltip="Table view">
                                    <x-lucide-table class="w-4 h-4" />
                                </button>
                                <button class="btn btn-secondary btn-sm" id="bp-view-cards" data-tooltip="Card view">
                                    <x-lucide-layout-grid class="w-4 h-4" />
                                </button>
                            </div>

                            {{-- Extra action --}}
                            <button class="btn btn-secondary btn-sm" data-soon="Bulk Export">
                                <x-lucide-download class="w-4 h-4 mr-2" /> Export
                            </button>
                        </div>
                    </div>

                    {{-- Bulk actions --}}
                    <div id="bp-bulk" class="bulk-actions-bar">
                        <div class="justify-between d-flex align-center">
                            <span class="selection-count">0 selected</span>
                            <div class="gap-2 d-flex">
                                <button class="btn btn-secondary btn-sm" id="bp-bulk-activate">
                                    <x-lucide-badge-check class="w-4 h-4 mr-1" /> Activate
                                </button>
                                <button class="btn btn-secondary btn-sm" id="bp-bulk-duplicate">
                                    <x-lucide-copy class="w-4 h-4 mr-1" /> Duplicate
                                </button>
                                <button class="btn btn-danger btn-sm" id="bp-bulk-delete">
                                    <x-lucide-trash-2 class="w-4 h-4 mr-1" /> Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Table view --}}
                    <div id="bp-table-wrap">
                        <table class="data-table" id="bp-table" data-selectable="true">
                            <thead>
                                <tr>
                                    <th class="table-select-column">
                                        <input type="checkbox" class="select-all">
                                    </th>
                                    <th class="sortable">Name</th>
                                    <th class="sortable">Type</th>
                                    <th class="sortable">Status</th>
                                    <th class="sortable">Updated</th>
                                    <th class="table-actions-column">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $rows = [
                                        ['id'=>1,'name'=>'Alpha Co.','type'=>'Customer','status'=>'active','updated'=>'2024-09-08'],
                                        ['id'=>2,'name'=>'Beta Branch','type'=>'Branch','status'=>'pending','updated'=>'2024-09-07'],
                                        ['id'=>3,'name'=>'Gamma LTD','type'=>'Supplier','status'=>'archived','updated'=>'2024-08-30'],
                                        ['id'=>4,'name'=>'Delta Ops','type'=>'Department','status'=>'active','updated'=>'2024-09-09'],
                                    ];
                                @endphp
                                @foreach($rows as $r)
                                <tr data-id="{{ $r['id'] }}" data-status="{{ $r['status'] }}">
                                    <td class="table-select-cell"><input type="checkbox" class="select-row" value="{{ $r['id'] }}"></td>
                                    <td>
                                        <div class="bp-entity">
                                            <div class="bp-dot {{ $r['status'] }}"></div>
                                            <div class="bp-entity-name">{{ $r['name'] }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $r['type'] }}</td>
                                    <td>
                                        @php
                                            $badge = [
                                                'active'   => 'badge-success',
                                                'pending'  => 'badge-warning',
                                                'archived' => 'badge-neutral',
                                            ][$r['status']] ?? 'badge-neutral';
                                        @endphp
                                        <span class="badge {{ $badge }}">{{ ucfirst($r['status']) }}</span>
                                    </td>
                                    <td class="text-muted">{{ $r['updated'] }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="table-action-btn" data-tooltip="Preview"
                                                onclick="bpPreview({{ $r['id'] }})">
                                                <x-lucide-eye class="w-4 h-4" />
                                            </button>
                                            <button class="table-action-btn" data-tooltip="Edit"
                                                data-modal-open="blueprint-edit-modal" data-mode="edit" data-id="{{ $r['id'] }}">
                                                <x-lucide-edit-3 class="w-4 h-4" />
                                            </button>
                                            <button class="table-action-btn" data-tooltip="Delete"
                                                onclick="bpDelete({{ $r['id'] }})">
                                                <x-lucide-trash-2 class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination (dummy) --}}
                        <div class="table-pagination">
                            <div class="table-pagination-info">
                                <span class="text-small text-muted">Showing <strong>1–4</strong> of <strong>128</strong></span>
                            </div>
                            <div class="table-pagination-controls">
                                <button class="btn btn-secondary btn-sm" disabled>Previous</button>
                                <button class="btn btn-secondary btn-sm active">1</button>
                                <button class="btn btn-secondary btn-sm">2</button>
                                <button class="btn btn-secondary btn-sm">Next</button>
                            </div>
                        </div>
                    </div>

                    {{-- Card view (off by default) --}}
                    <div id="bp-card-grid" class="bp-card-grid" style="display:none;">
                        @foreach($rows as $r)
                        <div class="bp-card">
                            <div class="bp-card-hd">
                                <div class="bp-dot {{ $r['status'] }}"></div>
                                <div class="bp-card-title">{{ $r['name'] }}</div>
                                <div class="bp-card-menu">
                                    <button class="btn btn-ghost btn-sm" onclick="bpPreview({{ $r['id'] }})">
                                        <x-lucide-eye class="w-4 h-4" />
                                    </button>
                                    <button class="btn btn-ghost btn-sm" data-modal-open="blueprint-edit-modal" data-mode="edit" data-id="{{ $r['id'] }}">
                                        <x-lucide-edit-3 class="w-4 h-4" />
                                    </button>
                                </div>
                            </div>
                            <div class="bp-card-bd">
                                <div class="row"><x-lucide-file-text class="w-4 h-4" /><span>Type: {{ $r['type'] }}</span></div>
                                <div class="row"><x-lucide-activity class="w-4 h-4" /><span>Updated {{ $r['updated'] }}</span></div>
                            </div>
                            <div class="bp-card-ft">
                                <span class="badge {{ $badge }}">{{ ucfirst($r['status']) }}</span>
                                <button class="btn btn-secondary btn-sm" onclick="bpPreview({{ $r['id'] }})">Open</button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- ===== TAB: ACTIVE (empty state example) ===== --}}
            <div id="tab-active" class="tab-panel" style="display:none;">
                <div class="empty-state-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">✅</div>
                        <div class="empty-state-title">Active Records</div>
                        <div class="empty-state-description">Use filters on the “All” tab or import data to get started.</div>
                        <div class="empty-state-action">
                            <button class="btn btn-primary" data-soon="Import">Import</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== TAB: ARCHIVE ===== --}}
            <div id="tab-archive" class="tab-panel" style="display:none;">
                <div class="empty-state-container">
                    <div class="empty-state">
                        <div class="empty-state-icon">🗂️</div>
                        <div class="empty-state-title">Archive</div>
                        <div class="empty-state-description">Archived records appear here for historical reference.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ===== SIDE PANEL / SECONDARY CONTENT (optional) ===== --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="widget-chart">
            <div class="widget-chart-header">
                <div>
                    <h3 class="widget-chart-title">Performance</h3>
                    <p class="text-muted text-small">Last 30 days</p>
                </div>
                <div class="widget-chart-actions">
                    <button class="btn btn-secondary btn-sm" data-soon="Analytics">
                        <x-lucide-bar-chart-3 class="w-4 h-4 mr-2" /> Full Report
                    </button>
                </div>
            </div>
            <div class="widget-chart-body">
                <div class="bp-chart">📈 Chart Placeholder</div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="mb-4 data-table-title">Guidance</h3>
                <ul class="ml-6 leading-7 list-disc text-neutral-700">
                    <li>Keep actions in the header for global tasks; row actions for record-level tasks.</li>
                    <li>Prefer SweetAlert toasts for feedback and confirm modals for destructive actions.</li>
                    <li>All styles should respect theme variables and dark mode overrides.</li>
                </ul>
            </div>
        </div>
    </div>

</div>

{{-- ===== MODALS ===== --}}
{{-- Create / Edit --}}

<div class="modal-backdrop" id="blueprint-edit-modal">
    <div class="modal modal-lg">
        <div class="modal-header">
            <h3 class="modal-title" id="bp-edit-title">Create Record</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <form id="bp-form">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" class="form-input" name="name" required placeholder="Acme Inc.">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type *</label>
                        <select class="form-select" name="type" required>
                            <option value="">Select</option>
                            <option>Customer</option>
                            <option>Supplier</option>
                            <option>Department</option>
                            <option>Branch</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option>active</option>
                            <option>pending</option>
                            <option>archived</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Reference</label>
                        <input type="text" class="form-input" name="ref" placeholder="AUTO-12345">
                        <div class="form-help">Auto-generated if left empty</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Notes</label>
                    <textarea class="form-textarea" rows="4" name="notes" placeholder="Optional notes…"></textarea>
                </div>

                <input type="hidden" name="id" value="">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Cancel</button>
            <button class="btn btn-primary" id="bp-save">
                <x-lucide-save class="w-4 h-4 mr-2" /> Save
            </button>
        </div>
    </div>

</div>

{{-- Preview --}}

<div class="modal-backdrop" id="blueprint-preview-modal">
    <div class="modal modal-xl">
        <div class="modal-header">
            <h3 class="modal-title">Preview</h3>
            <button class="btn btn-ghost btn-sm" data-modal-close>×</button>
        </div>
        <div class="modal-body">
            <div id="bp-preview" class="bp-preview"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-modal-close>Close</button>
            <button class="btn btn-primary" id="bp-send-test">
                <x-lucide-mail class="w-4 h-4 mr-2" /> Send Test
            </button>
        </div>
    </div>
</div>
@endsection

@push('head')

<style>
/* ===== Scoped additions for the blueprint (theme + dark-safe) ===== */
.view-blueprint .bp-chart{
    width:100%;min-height:220px;border-radius:var(--radius-lg);
    background:linear-gradient(45deg,var(--brand-100),var(--brand-200));
    color:var(--brand-700);display:flex;align-items:center;justify-content:center;font-weight:600
}
[data-theme="dark"] .view-blueprint .bp-chart{background:linear-gradient(45deg,var(--brand-950),var(--brand-800));color:var(--brand-300)}

.view-blueprint .bp-entity{display:flex;align-items:center;gap:10px}
.view-blueprint .bp-dot{width:10px;height:10px;border-radius:9999px;background:var(--neutral-300)}
.view-blueprint .bp-dot.active{background:var(--success-600)}
.view-blueprint .bp-dot.pending{background:var(--warning-600)}
.view-blueprint .bp-dot.archived{background:var(--neutral-500)}
.view-blueprint .bp-entity-name{font-weight:500;color:var(--neutral-900)}
[data-theme="dark"] .view-blueprint .bp-entity-name{color:var(--neutral-50)}

.view-blueprint .bp-card-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:var(--space-4)}
.view-blueprint .bp-card{border:1px solid var(--neutral-200);border-radius:var(--radius-xl);background:var(--neutral-0);box-shadow:var(--shadow-sm)}
[data-theme="dark"] .view-blueprint .bp-card{background:var(--neutral-900);border-color:var(--neutral-700)}
.bp-card-hd{display:flex;align-items:center;gap:8px;padding:var(--space-4);border-bottom:1px solid var(--neutral-200)}
[data-theme="dark"] .bp-card-hd{border-bottom-color:var(--neutral-700)}
.bp-card-title{font-weight:600;color:var(--neutral-900);flex:1}
[data-theme="dark"] .bp-card-title{color:var(--neutral-50)}
.bp-card-bd{padding:var(--space-4);display:grid;gap:8px}
.bp-card-bd .row{display:flex;align-items:center;gap:8px;color:var(--neutral-700);font-size:var(--text-sm)}
[data-theme="dark"] .bp-card-bd .row{color:var(--neutral-300)}
.bp-card-ft{display:flex;justify-content:space-between;align-items:center;padding:var(--space-3) var(--space-4);background:var(--neutral-50);border-top:1px solid var(--neutral-200)}
[data-theme="dark"] .bp-card-ft{background:var(--neutral-900);border-top-color:var(--neutral-700)}

.view-blueprint .bp-preview{background:var(--neutral-50);border-radius:var(--radius-lg);padding:var(--space-4);min-height:260px}
[data-theme="dark"] .view-blueprint .bp-preview{background:var(--neutral-200)}
</style>

@endpush

@push('scripts')

<script>
/* ===== JS wiring for blueprint (ManuCore + SweetAlert) ===== */
document.addEventListener('DOMContentLoaded', () => {
    // Initialize core helpers if available
    if (window.ManuCore) {
        ManuCore.initTabs();
        ManuCore.initDataTables();
        ManuCore.initTooltips();
    }

    const brand = getComputedStyle(document.documentElement).getPropertyValue('--brand-600').trim() || '#2171B5';
    const toast = (title, type='info') => {
        if (window.Swal) Swal.fire({ icon:type, title, timer:1300, showConfirmButton:false, toast:true, position:'top-end' });
        else if (window.ManuCore?.showToast) ManuCore.showToast(title, type);
    };
    const soon = (title, text='This feature is coming soon.') =>
        (window.Swal ? Swal.fire({icon:'info', title, text, confirmButtonColor: brand}) : alert(`${title}\n\n${text}`));

    // Wire all [data-soon]
    document.querySelectorAll('[data-soon]')?.forEach(el => el.addEventListener('click', e => {
        e.preventDefault(); soon(el.getAttribute('data-soon') || 'Coming Soon');
    }));

    // View toggle
    const tableWrap = document.getElementById('bp-table-wrap');
    const cardGrid  = document.getElementById('bp-card-grid');
    document.getElementById('bp-view-table')?.addEventListener('click', ()=>{ tableWrap.style.display='block'; cardGrid.style.display='none'; });
    document.getElementById('bp-view-cards')?.addEventListener('click', ()=>{ tableWrap.style.display='none';  cardGrid.style.display='grid'; });

    // Search (fallback if DataTables not active)
    const searchInput = document.getElementById('bp-search');
    searchInput?.addEventListener('input', () => {
        const q = searchInput.value.toLowerCase();
        document.querySelectorAll('#bp-table tbody tr').forEach(tr => {
            tr.style.display = tr.innerText.toLowerCase().includes(q) ? '' : 'none';
        });
    });

    // Filter chips
    document.getElementById('bp-chips')?.addEventListener('click', (e) => {
        const chip = e.target.closest('.filter-chip'); if (!chip) return;
        document.querySelectorAll('#bp-chips .filter-chip').forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
        const f = chip.getAttribute('data-filter');
        document.querySelectorAll('#bp-table tbody tr').forEach(tr => {
            const st = tr.getAttribute('data-status');
            tr.style.display =
                (f==='all') ? '' :
                (f===st)   ? '' : 'none';
        });
    });

    // Bulk selection
    document.addEventListener('change', (e) => {
        if (!e.target.closest('#bp-table')) return;
        if (e.target.matches('.select-all')) {
            const on = e.target.checked;
            document.querySelectorAll('#bp-table .select-row').forEach(cb => {
                cb.checked = on;
                cb.closest('tr').classList.toggle('selected', on);
            });
        }
        if (e.target.matches('.select-row')) {
            e.target.closest('tr').classList.toggle('selected', e.target.checked);
            const all = document.querySelectorAll('#bp-table .select-row');
            const sel = document.querySelectorAll('#bp-table .select-row:checked');
            const allBox = document.querySelector('#bp-table .select-all');
            if (allBox) {
                allBox.checked = all.length === sel.length;
                allBox.indeterminate = sel.length>0 && sel.length<all.length;
            }
        }
        updateBulk();
    });

    function updateBulk(){
        const sel = document.querySelectorAll('#bp-table .select-row:checked').length;
        const bar = document.getElementById('bp-bulk');
        if (!bar) return;
        bar.style.display = sel>0 ? 'block' : 'none';
        const label = bar.querySelector('.selection-count');
        if (label) label.textContent = `${sel} selected`;
    }

    // Bulk actions (fake)
    document.getElementById('bp-bulk-activate')?.addEventListener('click', ()=> soon('Bulk Activate'));
    document.getElementById('bp-bulk-duplicate')?.addEventListener('click', ()=> soon('Bulk Duplicate'));
    document.getElementById('bp-bulk-delete')?.addEventListener('click', ()=>{
        ManuCore.confirmDelete('Delete selected records?', 'This cannot be undone.').then(r=>{
            if (r.isConfirmed) {
                document.querySelectorAll('#bp-table .select-row:checked').forEach(cb => cb.closest('tr').remove());
                updateBulk(); toast('Deleted selected records','success');
            }
        });
    });

    // Row actions (global)
    window.bpPreview = (id) => {
        const html = `
            <div style="font-family: system-ui, -apple-system, Segoe UI, Roboto; max-width: 720px; margin: 0 auto;">
                <h2 style="color: var(--brand-700); margin: 0 0 12px;">Preview for #${id}</h2>
                <p style="color: var(--neutral-800)">This is a sample preview block.</p>
            </div>
        `;
        document.getElementById('bp-preview').innerHTML = html;
        ManuCore.openModal('blueprint-preview-modal');
    };
    window.bpDelete = (id) => {
        ManuCore.confirmDelete('Delete record?', 'This cannot be undone.').then(r=>{
            if (r.isConfirmed) {
                document.querySelector(`tr[data-id="${id}"]`)?.remove();
                updateBulk(); toast('Record deleted','success');
            }
        });
    };

    // Create/Edit modal setup
    document.querySelectorAll('[data-modal-open="blueprint-edit-modal"]').forEach(btn=>{
        btn.addEventListener('click', ()=>{
            const mode = btn.getAttribute('data-mode') || 'create';
            const id   = btn.getAttribute('data-id') || '';
            const title = document.getElementById('bp-edit-title');
            const form  = document.getElementById('bp-form');
            title.textContent = mode === 'edit' ? 'Edit Record' : 'Create Record';
            form.reset(); form.id.value = id;
            if (mode === 'edit') {
                form.name.value   = 'Alpha Co.';
                form.type.value   = 'Customer';
                form.status.value = 'active';
                form.ref.value    = 'AUTO-12345';
                form.notes.value  = 'Demo record prefill.';
            }
        });
    });
    document.getElementById('bp-save')?.addEventListener('click', ()=>{
        const form = document.getElementById('bp-form');
        if (!form.reportValidity()) return;
        ManuCore.showLoading('Saving…','Please wait');
        setTimeout(()=>{ Swal.close(); ManuCore.closeModal('blueprint-edit-modal'); toast('Saved','success'); }, 800);
    });

    // Preview send test (fake)
    document.getElementById('bp-send-test')?.addEventListener('click', ()=>{
        Swal.fire({
            title:'Send Test',
            input:'email',
            inputLabel:'Recipient',
            showCancelButton:true,
            confirmButtonText:'Send',
            confirmButtonColor: brand,
            inputValidator:(v)=>!v && 'Please enter an email'
        }).then(r=>{ if (r.isConfirmed) toast(`Sent to ${r.value}`,'success'); });
    });

    // Theme feedback (no accent noise; leave to your global listeners)
    window.addEventListener('theme-changed', ()=>{
        const theme = document.documentElement.getAttribute('data-theme') || 'light';
        toast(theme === 'dark' ? 'Dark mode enabled' : 'Light mode enabled','success');
    });
});
</script>

@endpush
Tiny checklist to keep in the file (optional)

Route exists and is protected (auth, verified, and correct role)

Sidebar item points to this route and highlights when active

Header icon mapping updated (if you use route→icon mapping)

Stats cards reflect real counts

Search hooked to DataTables or fallback filter present

Filter chips mapped to real statuses

Row actions call real endpoints (replace dummy JS)

Modals submit to real controller actions (add forms/methods/CSRF)

SweetAlert confirmations for destructive actions

Works in light & dark modes and with accent changes

No unsupported <x-lucide-\*> icons used

If you want, we can also spin this out into a Blade component (e.g., <x-blueprint.table ... />) later so new screens are literally copy-less.
