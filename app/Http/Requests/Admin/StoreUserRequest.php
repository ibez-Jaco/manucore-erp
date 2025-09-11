<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Route group is already Admin-gated; allow here.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','lowercase','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
            'is_active' => ['sometimes','boolean'],
            'roles' => ['sometimes','array'],
            'roles.*' => ['string', Rule::exists('roles','name')],
        ];
    }
}
