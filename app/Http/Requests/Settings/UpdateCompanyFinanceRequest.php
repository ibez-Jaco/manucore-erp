<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyFinanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            // Banking
            'bank_name'            => ['nullable','string','max:255'],
            'bank_branch'          => ['nullable','string','max:255'],
            'bank_branch_code'     => ['nullable','string','max:255'],
            'bank_account_name'    => ['nullable','string','max:255'],
            'bank_account_number'  => ['nullable','string','max:255','regex:/^[0-9\-\s]+$/'],
            'bank_account_type'    => ['nullable', Rule::in(['Current','Cheque','Savings','Transmission'])],

            // VAT / Tax
            'vat_number'        => ['nullable','string','max:255'],
            'default_tax_rate'  => ['nullable','numeric','between:0,100','regex:/^\d{1,3}(\.\d{1,2})?$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'bank_account_number.regex' => 'Account number may only contain digits, spaces, and dashes.',
            'bank_account_type.in'      => 'Account type must be one of: Current, Cheque, Savings, Transmission.',
            'default_tax_rate.numeric'  => 'Default tax rate must be a number.',
            'default_tax_rate.between'  => 'Default tax rate must be between 0 and 100.',
            'default_tax_rate.regex'    => 'Default tax rate can have up to 2 decimals.',
        ];
    }
}
