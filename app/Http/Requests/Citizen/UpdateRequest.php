<?php

namespace App\Http\Requests\Citizen;

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
            'photo'             => 'nullable|image',
            'name'              => 'required|string|min:3|max:125',
            'nik'               => 'required|string|min:16|max:16|unique:citizens,nik,' . auth()->user()->id , ',id',
            'place_of_birth'    => 'required|string',
            'date_of_birth'     => 'required|date',
            'sex'               => 'required|in:Male,Female',
            'address'           => 'required|string|max:255',
            'religion'          => 'required|in:' . implode(',',config('select_option.religion')),
            'marital_status'    => 'required|in:' . implode(',',config('select_option.marital_status')),
            'job_status'        => 'required|string',
            'education'         => 'required|in:' . implode(',',config('select_option.education')),
            'citizenship'       => 'required|in:' . implode(',',config('select_option.citizenship')),
            'village_code'      => 'required|exists:villages,code',
            'username'          => 'required|string|min:6|max:32|unique:citizens,username,' . auth()->user()->id , ',id',
            'email'             => 'required|email|max:125|unique:citizens,email,' . auth()->user()->id , ',id',
            'skills'            => 'nullable|array'
        ];
    }
}
