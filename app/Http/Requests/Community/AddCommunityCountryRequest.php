<?php

namespace App\Http\Requests\Community;

use Illuminate\Foundation\Http\FormRequest;

class AddCommunityCountryRequest extends FormRequest
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
            'country_id' => 'required|exists:countries,id'
        ];
    }

    public function messages()
    {
        return [
            'country_id.required' => 'Country is required',
            'country_id.exists' => 'Country does not exist'
        ];
    }
}
