@extends('layouts.panel')

@section('title', 'Add Branch')
@section('header', 'Create Branch')

@section('content')
    @include('settings.partials._errors')
    @include('settings.partials._flash')

    <form method="POST" action="{{ route('settings.branches.store') }}" class="space-y-6 erp-card">
        @csrf

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="erp-label">Company *</label>
                <select name="company_id" class="erp-input" required>
                    <option value="">Select company…</option>
                    @foreach($companies as $c)
                        <option value="{{ $c->id }}" @selected(old('company_id') == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Branch Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="erp-input" required>
            </div>

            <div>
                <label class="erp-label">Type</label>
                <select name="type" class="erp-input">
                    <option value="">—</option>
                    @foreach(['head_office'=>'Head Office','branch'=>'Branch','warehouse'=>'Warehouse','sales_office'=>'Sales Office'] as $k=>$v)
                        <option value="{{ $k }}" @selected(old('type')===$k)>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Manager</label>
                <select name="manager_id" class="erp-input">
                    <option value="">—</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" @selected(old('manager_id')==$u->id)>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="erp-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="erp-input">
            </div>

            <div>
                <label class="erp-label">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="erp-input">
            </div>

            <div class="grid gap-6 md:col-span-2 md:grid-cols-2">
                <div>
                    <label class="erp-label">Address Line 1</label>
                    <input type="text" name="address_line_1" value="{{ old('address_line_1') }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Address Line 2</label>
                    <input type="text" name="address_line_2" value="{{ old('address_line_2') }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">State/Province</label>
                    <input type="text" name="state_province" value="{{ old('state_province') }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Postal Code</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="erp-input">
                </div>
                <div>
                    <label class="erp-label">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="erp-input">
                </div>
            </div>

            <div>
                <label class="erp-label">Timezone</label>
                <input type="text" name="timezone" value="{{ old('timezone', 'Africa/Johannesburg') }}" class="erp-input">
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true)) class="erp-checkbox">
                    <span>Active</span>
                </label>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_head_office" value="1" @checked(old('is_head_office')) class="erp-checkbox">
                    <span>Head Office</span>
                </label>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="holds_inventory" value="1" @checked(old('holds_inventory')) class="erp-checkbox">
                    <span>Holds Inventory</span>
                </label>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="can_sell" value="1" @checked(old('can_sell', true)) class="erp-checkbox">
                    <span>Can Sell</span>
                </label>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="can_purchase" value="1" @checked(old('can_purchase', true)) class="erp-checkbox">
                    <span>Can Purchase</span>
                </label>
            </div>

            <div class="md:col-span-2">
                <label class="erp-label">Invoice Prefix</label>
                <input type="text" name="invoice_prefix" value="{{ old('invoice_prefix') }}" class="erp-input" placeholder="e.g. PTA">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('settings.branches.index') }}" class="erp-btn-secondary">Cancel</a>
            <button class="erp-btn-primary" type="submit">Create Branch</button>
        </div>
    </form>
@endsection
