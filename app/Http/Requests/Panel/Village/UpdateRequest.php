<?php

namespace App\Http\Requests\Panel\Village;

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
            'district_code' => 'required|exists:districts,code',
            'code' => 'required|numeric|unique:villages,code,' . $this->village->id . ',id', 
            'name' => 'required|string'
        ];
    }
}
