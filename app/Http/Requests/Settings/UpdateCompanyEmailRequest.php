<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            'email_from_name'    => ['nullable','string','max:255'],
            'email_from_address' => ['nullable','email','max:255'],
            'email_reply_to'     => ['nullable','email','max:255'],

            'email_signature'    => ['nullable','string'],
            'email_footer'       => ['nullable','string'],
            'invoice_terms'      => ['nullable','string'],
            'quote_terms'        => ['nullable','string'],
        ];
    }
}
