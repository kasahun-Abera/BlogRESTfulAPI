<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:categories,slug,' . optional($this->category)->id,
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
            return [
                'name.required' => 'Name is required!',
                'description.required' => 'Descritpion is required!',
                'slug.required' => 'Slug is required and Must be Unique!',
                'slug.unique:categories' => 'Slug Must be Unique!'
            ];
    }
}
