<?php

namespace BlazeCMS\Requests;

use BlazeCMS\Http\Request;

class UserProfileRequest extends Request
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
            'email' => 'required|email|max:255|unique:users,email,' .$this->id,
            'password' => 'confirmed|min:6',
        ];
    }
}
