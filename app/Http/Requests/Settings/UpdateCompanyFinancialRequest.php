<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyFinancialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            'currency_code'      => ['required','string','size:3'],
            'currency_symbol'    => ['required','string','max:10'],
            'vat_rate'           => ['required','numeric','min:0','max:100'],
            'vat_type'           => ['required', Rule::in(['inclusive','exclusive'])],
            'financial_year_end' => ['nullable','string','max:255'],
            'is_vat_registered'  => ['nullable','boolean'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'is_vat_registered' => (bool) $this->boolean('is_vat_registered'),
        ]);
    }
}
