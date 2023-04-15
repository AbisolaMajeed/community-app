<?php

namespace App\Http\Requests\Community;

use Illuminate\Foundation\Http\FormRequest;

class AddWorkflowEntryRequest extends FormRequest
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
            'community_workflow_id' => 'required|exists:community_workflows,id',
            'name'  => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'community_workflow_id.required'    => 'Community workflow is required',
            'community_workflow_id.exists'  => 'Community workflow not found'
        ];
    }
}
