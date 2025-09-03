<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplatesRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Middleware already enforces auth/verified/role; keep linter-happy and safe:
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'templates' => ['required', 'array'],
            'templates.*.subject' => ['nullable', 'string', 'max:255'],
            'templates.*.body'    => ['required', 'string'],
            'templates.*.format'  => ['required', 'in:markdown,blade,html'],
        ];
    }
}
