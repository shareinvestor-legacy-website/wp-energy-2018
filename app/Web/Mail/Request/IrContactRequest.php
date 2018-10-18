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

            'fullname' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'telephone' => 'required',
            'company' => 'required',
            'detail' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
