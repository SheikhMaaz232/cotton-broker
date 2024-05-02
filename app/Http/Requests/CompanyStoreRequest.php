<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required|max:70',
            'contact_number' => 'required|max:70',
            'email' => 'required',
            'focal_person' => 'required',
            'postal_address' => 'required',
            'website' => 'required',
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
            'name.required' => 'Please enter the name!',
            'contact_number.required' => 'Please enter the contact number!',
            'email.required' => 'Please enter the email!',
            'focal_person.required' => 'Please enter the focal person!',
            'postal_address.required' => 'Please enter the postal address!',
            'website.required' => 'Please enter the valid website!',
        ];
    }
}
