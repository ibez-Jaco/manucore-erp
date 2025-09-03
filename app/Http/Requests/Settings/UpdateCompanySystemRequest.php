<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanySystemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            'timezone'    => ['required','timezone'],
            'date_format' => ['required','string','max:20'],
            'time_format' => ['required','string','max:20'],
        ];
    }
}
