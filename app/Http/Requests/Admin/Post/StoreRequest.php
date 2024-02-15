<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'This field should be filled',
            'title.string' => 'This field should be string',
            'content.string' => 'This field should be string',
            'content.required' => 'This field should be filled',
            'preview_image.required' => 'This field should be filled',
            'preview_image.file' => 'This field should be file type',
            'main_image.required' => 'This field should be filled',
            'main_image.file' => 'This field should be file type',
            'category_id.required' => 'This field should be filled',
            'category_id.integer' => 'Id category should be integer',
            'category_id.exists' => 'Id category should be in database',
            'tag_ids.array' => 'Array of data should be given'

        ];
    }
}
