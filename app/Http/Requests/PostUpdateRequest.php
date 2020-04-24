<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required',
            Rule::unique('posts')->ignore($this->route('post')->id)],
            'excerpt' => 'required|min:10|max:180',
            'status' => 'required',
            'body' => 'required|min:10|max:1000',
        ];
    }
}
