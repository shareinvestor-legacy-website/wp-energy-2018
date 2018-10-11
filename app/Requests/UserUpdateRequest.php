<?php

namespace BlazeCMS\Requests;

use Auth;
use BlazeCMS\Http\Request;

class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //not allow to update sysadmin
        if ($this->id == 1){
            abort(403);
        }

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
            'username' => 'required|max:255|unique:users,username,' .$this->id,
            'email' => 'required|email|max:255|unique:users,email,' .$this->id,
            'password' => 'confirmed|min:6',
            'role_names' => 'required',
        ];
    }
}
