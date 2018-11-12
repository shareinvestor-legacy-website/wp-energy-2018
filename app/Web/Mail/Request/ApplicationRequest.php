<?php

namespace BlazeCMS\Web\Mail\Request;

use BlazeCMS\Http\Request;


class ApplicationRequest extends Request
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
            'position' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'nationality' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'picture' => 'max:3000',
            'resume' => 'max:3000',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
