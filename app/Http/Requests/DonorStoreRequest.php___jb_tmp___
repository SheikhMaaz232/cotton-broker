<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonorStoreRequest extends FormRequest
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
            'name' => 'required:max70',
            'email' => 'required|max:40',
            'contact_number' => 'required:max:40',
            'focal_person' => 'required:max:70'
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
            'name.required' => 'Please select the name!',
            'email.required' => 'Please enter the valid email!',
            'contact_number.required' => 'Please enter the contact number!',
            'focal_person.required' => 'Please enter the focal person name!',
        ];
    }
}
