<?php

namespace BlazeCMS\Web\Mail\Request;

use BlazeCMS\Http\Request;


class WhistleblowingRequest extends Request
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'detail' => 'required',
            'file' => 'file:1,3000|mimes:pdf,doc,docx',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
