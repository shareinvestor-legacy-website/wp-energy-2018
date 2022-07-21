<?php

namespace BlazeCMS\Web\Mail\Request;

use BlazeCMS\Http\Request;


class IrContactRequest extends Request
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

            'fullname' => 'required|max:200',
            'email' => 'required|email|max:200',
            'telephone' => 'required|max:20',
            'company' => 'required|max:1000',
            'detail' => 'required|max:10000',
            'privacyStatement' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
