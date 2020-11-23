<?php

namespace BlazeCMS\Web\Mail\Request;

use BlazeCMS\Http\Request;


class SiteVisitRequest extends Request
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
            'telephone1' => 'required|max:200',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
