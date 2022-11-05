<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required|string|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => trans('content.required'),
            'content.string' => trans('content.string'),
            'content.min' => trans('content.min'),
            'content.max' => trans('content.max'),
        ];
    }
}
