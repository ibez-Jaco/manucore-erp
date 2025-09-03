<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Route group already has auth + verified + role; still return true here.
        return true;
    }

    public function rules(): array
    {
        return [
            // Basic
            'name'                 => ['required','string','max:255'],
            'legal_name'           => ['nullable','string','max:255'],
            'registration_number'  => ['nullable','string','max:255'],

            // Contact
            'email'   => ['nullable','email','max:255'],
            'phone'   => ['nullable','string','max:255'],
            'mobile'  => ['nullable','string','max:255'],
            'website' => ['nullable','url','max:255'],

            // Physical address
            'address_line_1'   => ['nullable','string','max:255'],
            'address_line_2'   => ['nullable','string','max:255'],
            'city'             => ['nullable','string','max:255'],
            'state_province'   => ['nullable','string','max:255'],
            'postal_code'      => ['nullable','string','max:255'],
            'country'          => ['nullable','string','max:255'],

            // Postal toggle + address
            'use_postal_address'     => ['nullable','boolean'],
            'postal_address_line_1'  => ['nullable','string','max:255'],
            'postal_address_line_2'  => ['nullable','string','max:255'],
            'postal_city'            => ['nullable','string','max:255'],
            'postal_state_province'  => ['nullable','string','max:255'],
            'postal_postal_code'     => ['nullable','string','max:255'],
            'postal_country'         => ['nullable','string','max:255'],

            // Banking
            'bank_name'           => ['nullable','string','max:255'],
            'bank_branch'         => ['nullable','string','max:255'],
            'bank_branch_code'    => ['nullable','string','max:255'],
            'bank_account_name'   => ['nullable','string','max:255'],
            'bank_account_number' => ['nullable','string','max:255'],
            'bank_account_type'   => ['nullable', Rule::in(['Current','Cheque','Savings','Transmission'])],
            'bank_swift_code'     => ['nullable','string','max:255'],
            'bank_iban'           => ['nullable','string','max:255'],
            'bank_reference'      => ['nullable','string','max:500'],

            // Financial & VAT
            'currency_code'       => ['required','string','size:3'],
            'currency_symbol'     => ['required','string','max:10'],
            'is_vat_registered'   => ['nullable','boolean'],
            'vat_number'          => ['nullable','string','max:255'],
            'vat_rate'            => ['required','numeric','min:0','max:100'],
            'vat_type'            => ['required', Rule::in(['inclusive','exclusive'])],
            'financial_year_end'  => ['nullable','string','max:255'],

            // System
            'timezone'    => ['required','timezone'],
            'date_format' => ['required','string','max:20'],
            'time_format' => ['required','string','max:20'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'use_postal_address' => (bool) $this->boolean('use_postal_address'),
            'is_vat_registered'  => (bool) $this->boolean('is_vat_registered'),
        ]);
    }
}
