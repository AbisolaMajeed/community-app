<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password'  => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'confirm_password.required' => 'Password is required',
            'confirm_password.same' => 'Password does not match'
        ];
    }
}
