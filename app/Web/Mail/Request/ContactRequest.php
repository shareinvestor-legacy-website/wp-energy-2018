<?php

namespace BlazeCMS\Web\Mail\Request;

use BlazeCMS\Http\Request;


class ContactRequest extends Request
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
            'fullname' => 'required',
            'email' => 'required|email',
            'address' => 'max:5000',
            'subject' => 'required',
            'question' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
