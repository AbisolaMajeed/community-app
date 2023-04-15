<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'community_id' => 'required|exists:communities,id',
            'email'     => 'required|email:rfc,dns|exists:users,email',
            'password'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'community_id.required' => 'Community not found',
            'community_id.exists' => 'Community does not exist'
        ];
    }
}
