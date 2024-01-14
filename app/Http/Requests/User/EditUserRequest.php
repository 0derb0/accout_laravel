<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['nullable', 'string'],
            'surname'=>['nullable', 'string'],
            'email'=>['nullable', 'string', 'email', 'unique:users'],
            'phone'=>['nullable', 'string'],
        ];
    }
}
