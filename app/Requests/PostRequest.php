<?php

namespace BlazeCMS\Requests;

use BlazeCMS\Http\Request;

class PostRequest extends Request
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
            'title' => 'required',
            'status' => 'required',
            'category_ids' => 'required',
            'period_from' => 'required_with:period_to',
            'period_to' => 'required_with:period_from'
        ];
    }
}
