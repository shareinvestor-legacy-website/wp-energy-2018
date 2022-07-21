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
            'fullname' => 'required|max:200',
            'birthdate' => 'required',
            'nationality' => 'required|max:200',
            'email' => 'required|email|max:200',
            'mobile' => 'required|max:20',
            'address' => 'required|max:10000',
            'picture' => 'max:2000|mimes:jpeg,jpg,png',
            'resume' => 'max:2000|mimes:doc,docx,pdf',
            'privacyStatement' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
