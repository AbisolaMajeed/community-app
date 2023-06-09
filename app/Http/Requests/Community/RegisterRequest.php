<?php

namespace App\Http\Requests\Community;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'  => 'required|unique:communities,name',
            'first_name'    => 'required',
            'last_name'    => 'required',
            'email'    => 'required|unique:community_admins,email',
            'phone_number'  => 'required'
        ];
    }
}
