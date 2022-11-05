<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string|unique:products|min:0|max:255',
            'code' => 'required|string|unique:products|min:1|max:24',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg',
            'description' => 'required|string',
            's' => 'required|numeric|min:0',
            'm' => 'required|numeric|min:0',
            'l' => 'required|numeric|min:0',
            'xl' => 'required|numeric|min:0',
            'xxl' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('name.required'),
            'name.unique' => trans('name.unique'),
            'name.min' => trans('name.unique'),
            'name.max' => trans('name.unique'),
            'code.required' => trans('code.required'),
            'code.unique' => trans('code.unique'),
            'code.min' => trans('code.min'),
            'code.max' => trans('code.max'),
            'category_id.exists' => trans('cat.exists'),
            'price.required' => trans('price.required'),
            'price.min' => trans('price.min'),
            'price.max' => trans('price.max'),
            'description.required' => trans('description.required'),
            's.required' => trans('size.required'),
            's.numeric' => trans('size.numeric'),
            's.min' => trans('size.min'),
            'm.required' => trans('size.required'),
            'm.numeric' => trans('size.numeric'),
            'm.min' => trans('size.min'),
            'l.required' => trans('size.required'),
            'l.numeric' => trans('size.numeric'),
            'l.min' => trans('size.min'),
            'xl.required' => trans('size.required'),
            'xl.numeric' => trans('size.numeric'),
            'xl.min' => trans('size.min'),
            'xxl.required' => trans('size.required'),
            'xxl.numeric' => trans('size.numeric'),
            'xxl.min' => trans('size.min'),
            'images.required' => trans('images.required'),
            'images.*.mimes' => trans('image.mimes'),
        ];
    }
}
