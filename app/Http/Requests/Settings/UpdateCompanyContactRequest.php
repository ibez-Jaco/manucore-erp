<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            'email'   => ['nullable','email','max:255'],
            'phone'   => ['nullable','string','max:255'],
            'mobile'  => ['nullable','string','max:255'],
            'website' => ['nullable','url','max:255'],
        ];
    }
}
