<?php

namespace App\Http\Requests\User;

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
            'community_id'  => 'required|exists:communities,id',
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'home_address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'date_of_birth' => 'required|date',
            'date_arrived'  => 'required|date',
            'occupation'    => 'required',
            'education' => 'required',
            'workflow_entry_ids'  => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'community_id.required' => 'Community is not found',
            'community_id.exists'   => 'Community does not exist',
            'first_name.required'   => 'First name is required',
            'last_name.required'   => 'Last name is required',
            'home_address.required'   => 'Residential address is required',
            'phone_number.required'   => 'Phone number is required',
            'date_of_birth.required'   => 'Date of birth is required',
            'date_of_birth.date'   => 'Date of birth value must be a date',
            'date_arrived.required'   => 'Arrival date is required',
            'date_arrived.date'   => 'Arrival date value must be a date'
        ];
    }
}
