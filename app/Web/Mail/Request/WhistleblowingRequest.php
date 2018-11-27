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
            'fullname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'detail' => 'required',
            'address' => 'max:5000',
            'file' => 'max:2000|mimes:jpeg,jpg,png,doc,docx,pdf',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
