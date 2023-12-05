<?php

namespace App\Http\Requests\Panel\City;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'province_code' => 'required|exists:provinces,code', 
            'code' => 'required|numeric|unique:cities,code,' . $this->city->id . ',id', 
            'name' => 'required|string'
        ];
    }
}
