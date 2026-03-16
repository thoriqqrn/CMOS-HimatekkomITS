<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8),
                function ($attribute, $value, $fail) {
                    if (Hash::check($value, $this->user()->password)) {
                        $fail('Your new password must be different from your current password.');
                    }
                },
            ],
        ];
    }
}
