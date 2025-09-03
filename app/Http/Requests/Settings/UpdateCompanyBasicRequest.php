<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyBasicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            'name'                => ['required','string','max:255'],
            'legal_name'          => ['nullable','string','max:255'],
            'registration_number' => ['nullable','string','max:255'],
        ];
    }
}
