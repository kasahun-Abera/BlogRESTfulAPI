<?php

namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
            return [
                'title.required' => 'Title is required!',
                'body.required' => 'Image is required!'
            ];
    }
}
