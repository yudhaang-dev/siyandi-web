<?php

namespace App\Http\Requests\Panel\PostType;

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
            'slug' => 'required|string|unique:post_types,slug,' . $this->post_type->slug . ',slug',
            'name' => 'required|string',
            'meta.media' => 'required|in:none,image',
            'meta.category' => 'required|boolean'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug' => str($this->name)->slug()->toString(),
            'meta.category' => filter_var($this->meta['category'] ?? false, FILTER_VALIDATE_BOOLEAN)
        ]);
    }
}
