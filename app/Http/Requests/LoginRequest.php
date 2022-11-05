<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public $validator = null;
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
            'email' => ['required', 'email', 'max:320'],
            'password' => ['required', 'string', 'min:6', 'max:20'],
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => trans('email.required'),
            'email.email' => trans('email.email'),
            'email.max' => trans('email.max'),
            'password.required' => trans('password.required'),
            'password.string' => trans('password.string'),
            'password.min' => trans('password.min'),
            'password.max' => trans('password.max'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
