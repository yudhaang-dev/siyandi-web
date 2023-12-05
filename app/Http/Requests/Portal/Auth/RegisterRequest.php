<?php

namespace App\Http\Requests\Portal\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|min:3|max:125',
            'nik'           => 'required|string|min:16|max:16|unique:citizens,nik',
            'username'      => 'required|string|min:6|max:32',
            'email'         => 'required|email|max:125|unique:citizens,email',
            'password'                  => 'required|confirmed',
            'password_confirmation'     => 'required|same:password',
            'captcha'                   => 'required|captcha'
        ];
    }
}
