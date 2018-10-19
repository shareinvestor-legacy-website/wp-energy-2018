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
            'file' => 'mimes:pdf,doc,docx|max:3000',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'address' => 'required',
            'detail' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
