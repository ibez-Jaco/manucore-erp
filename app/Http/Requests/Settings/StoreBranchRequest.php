<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // guarded by route middleware already
    }

    public function rules(): array
    {
        $types = ['head_office','branch','warehouse','sales_office'];

        return [
            'company_id' => ['required','integer','exists:companies,id'],
            'name'       => ['required','string','max:255'],
            'code'       => ['nullable','string','max:20', Rule::unique('branches','code')->where(fn($q) => $q->where('company_id', $this->input('company_id')))],
            'type'       => ['nullable', Rule::in($types)],

            'email'      => ['nullable','email','max:255'],
            'phone'      => ['nullable','string','max:50'],
            'mobile'     => ['nullable','string','max:50'],
            'fax'        => ['nullable','string','max:50'],

            'address_line_1'  => ['nullable','string','max:255'],
            'address_line_2'  => ['nullable','string','max:255'],
            'city'            => ['nullable','string','max:120'],
            'state_province'  => ['nullable','string','max:120'],
            'postal_code'     => ['nullable','string','max:30'],
            'country'         => ['nullable','string','max:120'],

            'latitude'        => ['nullable','numeric','between:-90,90'],
            'longitude'       => ['nullable','numeric','between:-180,180'],

            'manager_id'      => ['nullable','integer','exists:users,id'],
            'timezone'        => ['nullable','timezone'],

            'use_company_banking' => ['sometimes','boolean'],
            'bank_name'           => ['nullable','string','max:120'],
            'bank_branch'         => ['nullable','string','max:120'],
            'bank_branch_code'    => ['nullable','string','max:30'],
            'bank_account_name'   => ['nullable','string','max:120'],
            'bank_account_number' => ['nullable','string','max:50'],
            'bank_account_type'   => ['nullable','string','max:50'],

            'is_active'      => ['sometimes','boolean'],
            'is_head_office' => ['sometimes','boolean'],
            'can_sell'       => ['sometimes','boolean'],
            'can_purchase'   => ['sometimes','boolean'],
            'holds_inventory'=> ['sometimes','boolean'],

            'invoice_prefix'     => ['nullable','string','max:10'],
            'quote_prefix'       => ['nullable','string','max:10'],
            'order_prefix'       => ['nullable','string','max:10'],
            'credit_note_prefix' => ['nullable','string','max:10'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'is_active'        => (bool)$this->boolean('is_active'),
            'is_head_office'   => (bool)$this->boolean('is_head_office'),
            'can_sell'         => (bool)$this->boolean('can_sell'),
            'can_purchase'     => (bool)$this->boolean('can_purchase'),
            'holds_inventory'  => (bool)$this->boolean('holds_inventory'),
            'use_company_banking' => (bool)$this->boolean('use_company_banking'),
        ]);
    }
}
