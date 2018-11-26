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
            'fullname' => 'required',
            'birthdate' => 'required',
            'nationality' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'picture' => 'max:3000|mimes:jpeg,jpg,png',
            'resume' => 'max:3000|mimes:jpeg,jpg,png,doc,docx,pdf',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
