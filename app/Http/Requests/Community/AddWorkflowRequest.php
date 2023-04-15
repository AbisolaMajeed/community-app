<?php

namespace App\Http\Requests\Community;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkflowRequest extends FormRequest
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
            'community_country_id' => 'required|exists:community_countries,id',
            'name' => 'required|unique:community_workflows,name'
        ];
    }

    public function messages()
    {
        return [
            'community_country_id.required' => 'Country is required',
            'community_country_id.exists' => 'Country not found in community',
            'name.required' => 'Workflow name is required'
        ];
    }
}
