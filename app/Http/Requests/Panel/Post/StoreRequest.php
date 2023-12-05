<?php

namespace App\Http\Requests\Panel\Post;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
        $post_type_slug = $this->post_type->slug ?? null;
        return [
            'slug'              => [
                'required',
                'string',
                Rule::unique('posts', 'slug')->where(function (Builder $query) use ($post_type_slug) {
                    $query->where('type_slug', $post_type_slug);
                })
            ],
            'title'             => 'required|string',
            'status'            => 'required|boolean',
            'published_at'      => 'required|date_format:Y-m-d H:i',
            'content'           => 'nullable',
            'image'             => 'nullable|file',
            'category_id'       => 'nullable|exists:post_categories,id'
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'slug'          => str($this->title)->slug()->toString(),
            'status'        => filter_var($this->status ?? false, FILTER_VALIDATE_BOOLEAN)
        ]);
    }
}
