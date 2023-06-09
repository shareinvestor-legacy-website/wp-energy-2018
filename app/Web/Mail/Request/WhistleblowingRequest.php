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
            'email' => 'required|email|max:200',
            'department' => 'required',
            'subject' => 'required|max:1000',
            'detail' => 'required|max:10000',
            'address' => 'max:10000',
            'file' => 'max:2000|mimes:jpeg,jpg,png,doc,docx,pdf',
            'privacyStatement' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
