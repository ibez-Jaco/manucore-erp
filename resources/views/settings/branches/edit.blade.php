{{-- resources/views/settings/branches/edit.blade.php --}}
@extends('layouts.panel')

@section('title', 'Edit Branch')
@section('header', 'Edit Branch: ' . $branch->name)

@section('content')
    @include('settings.partials._errors')
    @include('settings.partials._flash')

    {{-- UPDATE FORM (separate form; no nested forms below) --}}
    <form method="POST" action="{{ route('settings.branches.update', $branch) }}" class="mb-6 space-y-6 erp-card">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="erp-label">Company *</label>
                <select name="company_id" class="erp-input" required>
                    @foreach($companies as $c)
                        <option value="{{ $c->id }}" @selected(old('company_id', $branch->company_id)==$c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Branch Name *</label>
                <input type="text" name="name" value="{{ old('name', $branch->name) }}" class="erp-input" required>
            </div>

            <div>
                <label class="erp-label">Type</label>
                <select name="type" class="erp-input">
                    <option value="">—</option>
                    @foreach(['head_office'=>'Head Office','branch'=>'Branch','warehouse'=>'Warehouse','sales_office'=>'Sales Office'] as $k=>$v)
                        <option value="{{ $k }}" @selected(old('type', $branch->type)===$k)>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Manager</label>
                <select name="manager_id" class="erp-input">
                    <option value="">—</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" @selected(old('manager_id', $branch->manager_id)==$u->id)>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $branch->email) }}" class="erp-input">
            </div>

            <div>
                <label class="erp-label">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $branch->phone) }}" class="erp-input">
            </div>

            <div class="grid gap-6 md:col-span-2 md:grid-cols-2">
                <div>
                    <label class="erp-label">Address Line 1</label>
                    <input type="text" name="address_line_1" value="{{ old('address_line_1', $branch->address_line_1) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Address Line 2</label>
                    <input type="text" name="address_line_2" value="{{ old('address_line_2', $branch->address_line_2) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">City</label>
                    <input type="text" name="city" value="{{ old('city', $branch->city) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">State/Province</label>
                    <input type="text" name="state_province" value="{{ old('state_province', $branch->state_province) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Postal Code</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $branch->postal_code) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Country</label>
                    <input type="text" name="country" value="{{ old('country', $branch->country) }}" class="erp-input">
                </div>
            </div>

            <div>
                <label class="erp-label">Timezone</label>
                <input type="text" name="timezone" value="{{ old('timezone', $branch->timezone) }}" class="erp-input" placeholder="Africa/Johannesburg">
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                {{-- hidden 0 + checkbox 1 to ensure unchecked = 0 --}}
                <input type="hidden" name="is_active" value="0">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $branch->is_active)) class="erp-checkbox">
                    <span>Active</span>
                </label>

                <input type="hidden" name="is_head_office" value="0">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_head_office" value="1" @checked(old('is_head_office', $branch->is_head_office)) class="erp-checkbox">
                    <span>Head Office</span>
                </label>

                <input type="hidden" name="holds_inventory" value="0">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="holds_inventory" value="1" @checked(old('holds_inventory', $branch->holds_inventory)) class="erp-checkbox">
                    <span>Holds Inventory</span>
                </label>

                <input type="hidden" name="can_sell" value="0">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="can_sell" value="1" @checked(old('can_sell', $branch->can_sell)) class="erp-checkbox">
                    <span>Can Sell</span>
                </label>

                <input type="hidden" name="can_purchase" value="0">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="can_purchase" value="1" @checked(old('can_purchase', $branch->can_purchase)) class="erp-checkbox">
                    <span>Can Purchase</span>
                </label>
            </div>

            <div class="grid gap-6 md:col-span-2 md:grid-cols-4">
                <div>
                    <label class="erp-label">Invoice Prefix</label>
                    <input type="text" name="invoice_prefix" value="{{ old('invoice_prefix', $branch->invoice_prefix) }}" class="erp-input" placeholder="e.g. PTA">
                </div>
                <div>
                    <label class="erp-label">Quote Prefix</label>
                    <input type="text" name="quote_prefix" value="{{ old('quote_prefix', $branch->quote_prefix) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Order Prefix</label>
                    <input type="text" name="order_prefix" value="{{ old('order_prefix', $branch->order_prefix) }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Credit Note Prefix</label>
                    <input type="text" name="credit_note_prefix" value="{{ old('credit_note_prefix', $branch->credit_note_prefix) }}" class="erp-input">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('settings.branches.index') }}" class="erp-btn-secondary">Cancel</a>
            <button class="erp-btn-primary" type="submit">Save Changes</button>
        </div>
    </form>

    {{-- DELETE FORM (separate; NOT inside the update form) --}}
    <div class="mb-6 erp-card">
        <form action="{{ route('settings.branches.destroy', $branch) }}" method="POST" class="js-delete" onsubmit="return false;">
            @csrf
            @method('DELETE')
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="erp-header">Danger zone</h3>
                    <p class="text-sm text-gray-600">Move this branch to the bin (soft delete). You can restore it from the bin.</p>
                </div>
                <button type="submit" class="erp-btn-danger">Delete</button>
            </div>
        </form>
    </div>

    {{-- Operating hours --}}
    <div class="space-y-4 erp-card">
        <h3 class="erp-header">Operating Hours</h3>
        <form method="POST" action="{{ route('settings.branches.hours.update', $branch) }}" class="space-y-3">
            @csrf
            @method('PUT')
            @php
                $days  = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
                $hours = $branch->operating_hours ?? [];
            @endphp
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach($days as $day)
                    @php
                        $d = $hours[$day] ?? ['is_open'=>false,'open'=>'','close'=>''];
                    @endphp
                    <div class="p-3 border rounded-md">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-medium capitalize">{{ $day }}</div>
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" name="{{ $day }}_is_open" value="1" @checked(old($day.'_is_open', $d['is_open'])) class="erp-checkbox">
                                <span class="text-sm">Open</span>
                            </label>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="time" name="{{ $day }}_open"  value="{{ old($day.'_open',  $d['open'])  }}" class="erp-input" placeholder="Open">
                            <input type="time" name="{{ $day }}_close" value="{{ old($day.'_close', $d['close']) }}" class="erp-input" placeholder="Close">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end">
                <button class="erp-btn-primary" type="submit">Save Hours</button>
            </div>
        </form>
    </div>

    <script>
        // SweetAlert2 confirm for delete (fallback to native confirm)
        const delForm = document.querySelector('form.js-delete');
        if (delForm) {
            delForm.addEventListener('submit', (e) => {
                e.preventDefault();
                if (!window.Swal) { if (confirm('Delete this branch?')) delForm.submit(); return; }
                Swal.fire({
                    title: 'Delete branch?',
                    text: 'The branch will be moved to the bin (soft delete).',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                }).then(res => { if (res.isConfirmed) delForm.submit(); });
            });
        }
    </script>
@endsection
