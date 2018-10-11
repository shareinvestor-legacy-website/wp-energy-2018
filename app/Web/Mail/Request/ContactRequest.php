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
            'name' => 'required',
            'organization' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'department' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'messages' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
