<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'phone' => 'required|digits:10|numeric',
            'address' => 'required|string|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => trans('phone.required'),
            'phone.digits' => trans('phone.digits'),
            'phone.numeric' => trans('phone.numeric'),
            'address.required' => trans('address.required'),
            'address.string' => trans('address.string'),
            'address.min' => trans('address.min'),
            'address.max' => trans('address.max'),
        ];
    }
}
