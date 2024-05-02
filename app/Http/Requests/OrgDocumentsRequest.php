<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrgDocumentsRequest extends FormRequest
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
            'date' => 'required',
            'type' => 'required',
            'department' => 'required',
            'description' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date.required' => 'Please select the date!',
            'type.required' => 'Please select the document type!',
            'department.required' => 'Please select the department!',
            'description.required' => 'Please enter enter description!'
        ];
    }
}
