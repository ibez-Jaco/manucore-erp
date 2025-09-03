<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            // Physical
            'address_line_1'  => ['nullable','string','max:255'],
            'address_line_2'  => ['nullable','string','max:255'],
            'city'            => ['nullable','string','max:255'],
            'state_province'  => ['nullable','string','max:255'],
            'postal_code'     => ['nullable','string','max:255'],
            'country'         => ['nullable','string','max:255'],

            // Postal
            'use_postal_address'    => ['nullable','boolean'],
            'postal_address_line_1' => ['nullable','string','max:255'],
            'postal_address_line_2' => ['nullable','string','max:255'],
            'postal_city'           => ['nullable','string','max:255'],
            'postal_state_province' => ['nullable','string','max:255'],
            'postal_postal_code'    => ['nullable','string','max:255'],
            'postal_country'        => ['nullable','string','max:255'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'use_postal_address' => (bool) $this->boolean('use_postal_address'),
        ]);
    }
}
