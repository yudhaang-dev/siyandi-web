<?php

namespace App\Http\Requests\Panel\District;

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
            'city_code' => 'required|exists:cities,code', 
            'code' => 'required|numeric|unique:districts,code,' . $this->district->id . ',id', 
            'name' => 'required|string'
        ];
    }
}
