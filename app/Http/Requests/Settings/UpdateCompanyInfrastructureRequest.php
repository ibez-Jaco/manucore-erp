<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyInfrastructureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasAnyRole(['Admin','SettingsManager']) ?? false;
    }

    public function rules(): array
    {
        return [
            // Mail server
            'mail_mailer'    => ['nullable','string','max:50'], // allow custom; e.g. smtp, postmark, ses, mailgun, sendmail, log, array
            'mail_host'      => ['nullable','string','max:255'],
            'mail_port'      => ['nullable','integer','between:1,65535'],
            'mail_username'  => ['nullable','string','max:255'],
            'mail_password'  => ['nullable','string','max:1024'], // leave blank to keep current
            'mail_encryption'=> ['nullable', Rule::in(['tls','ssl','starttls','none'])],

            // Database
            'db_host'        => ['nullable','string','max:255'],
            'db_port'        => ['nullable','integer','between:1,65535'],
            'db_database'    => ['nullable','string','max:255'],
            'db_username'    => ['nullable','string','max:255'],
            'db_password'    => ['nullable','string','max:1024'], // leave blank to keep current
        ];
    }
}
