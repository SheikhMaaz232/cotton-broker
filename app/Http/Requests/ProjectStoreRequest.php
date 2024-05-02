<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'company_id' => 'required',
            'donor_id' => 'required',
            'name' => 'required',
            'tentative_end_date' => 'required',
            'actual_end_date' => 'required',
            'abbreviation' => 'required',
            'code' => 'required',
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
            'company_id.required' => 'Please select the company!',
            'donor_id.required' => 'Please select the donor!',
            'name.required' => 'Please enter the name!',
            'tentative_end_date.required' => 'Please enter the tentative end date!',
            'actual_end_date.required' => 'Please enter the actual date!',
            'abbreviation.required' => 'Please enter the abbreviation!',
            'code.required' => 'Please enter the project code!',
        ];
    }
}
