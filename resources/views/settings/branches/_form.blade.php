@csrf
<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    @isset($showCompany) 
    <div>
        <label class="erp-label">Company</label>
        <select name="company_id" class="erp-input" required>
            @foreach($companies as $c)
                <option value="{{ $c->id }}" @selected(old('company_id', $branch->company_id ?? '') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('company_id') <p class="erp-error">{{ $message }}</p> @enderror
    </div>
    @endisset

    <div>
        <label class="erp-label">Branch Name</label>
        <input type="text" name="name" value="{{ old('name', $branch->name ?? '') }}" class="erp-input" required>
        @error('name') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="erp-label">Type</label>
        <select name="type" class="erp-input" required>
            @foreach(['head_office'=>'Head Office','branch'=>'Branch','warehouse'=>'Warehouse','sales_office'=>'Sales Office','service_center'=>'Service Center'] as $val=>$label)
                <option value="{{ $val }}" @selected(old('type', $branch->type ?? '') == $val)>{{ $label }}</option>
            @endforeach
        </select>
        @error('type') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="erp-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}" class="erp-input">
        @error('email') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="erp-label">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}" class="erp-input">
        @error('phone') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="erp-label">Mobile</label>
        <input type="text" name="mobile" value="{{ old('mobile', $branch->mobile ?? '') }}" class="erp-input">
        @error('mobile') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-1 gap-6 md:col-span-2 md:grid-cols-2">
        <div>
            <label class="erp-label">Address Line 1</label>
            <input type="text" name="address_line_1" value="{{ old('address_line_1', $branch->address_line_1 ?? '') }}" class="erp-input">
        </div>
        <div>
            <label class="erp-label">Address Line 2</label>
            <input type="text" name="address_line_2" value="{{ old('address_line_2', $branch->address_line_2 ?? '') }}" class="erp-input">
        </div>
        <div>
            <label class="erp-label">City</label>
            <input type="text" name="city" value="{{ old('city', $branch->city ?? '') }}" class="erp-input">
        </div>
        <div>
            <label class="erp-label">State/Province</label>
            <input type="text" name="state_province" value="{{ old('state_province', $branch->state_province ?? '') }}" class="erp-input">
        </div>
        <div>
            <label class="erp-label">Postal Code</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $branch->postal_code ?? '') }}" class="erp-input">
        </div>
        <div>
            <label class="erp-label">Country</label>
            <input type="text" name="country" value="{{ old('country', $branch->country ?? '') }}" class="erp-input">
        </div>
    </div>

    <div>
        <label class="erp-label">Manager</label>
        <select name="manager_id" class="erp-input">
            <option value="">-- None --</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}" @selected(old('manager_id', $branch->manager_id ?? '') == $u->id)>{{ $u->name }}</option>
            @endforeach
        </select>
        @error('manager_id') <p class="erp-error">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-3 md:grid-cols-3">
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $branch->is_active ?? true))> <span>Active</span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="is_head_office" value="1" @checked(old('is_head_office', $branch->is_head_office ?? false))> <span>Head Office</span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="can_sell" value="1" @checked(old('can_sell', $branch->can_sell ?? false))> <span>Can Sell</span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="can_purchase" value="1" @checked(old('can_purchase', $branch->can_purchase ?? false))> <span>Can Purchase</span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="holds_inventory" value="1" @checked(old('holds_inventory', $branch->holds_inventory ?? false))> <span>Holds Inventory</span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" name="use_company_banking" value="1" @checked(old('use_company_banking', $branch->use_company_banking ?? true))> <span>Use Company Banking</span></label>
    </div>
</div>
