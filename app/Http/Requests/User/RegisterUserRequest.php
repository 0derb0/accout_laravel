<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', 'string'],
            'surname'=>['required', 'string'],
            'email'=>['required', 'string', 'email', 'unique:users'],
            'phone'=>['required', 'string'],
            'password'=>['required', 'string', 'confirmed', 'min:8'],
        ];
    }
}
