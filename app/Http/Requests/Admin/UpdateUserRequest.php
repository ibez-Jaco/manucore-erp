<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = (int) ($this->route('user')?->id ?? 0);

        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','lowercase','email','max:255', Rule::unique('users','email')->ignore($userId)],
            'password' => ['nullable','string','min:8','confirmed'],
            'is_active' => ['sometimes','boolean'],
            'roles' => ['sometimes','array'],
            'roles.*' => ['string', Rule::exists('roles','name')],
        ];
    }
}
