<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:05
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Department;


class DepartmentService
{
    public function find($id)
    {
        return Department::find($id);
    }


    public function get()
    {

        return Department::all()->sortBy('name');
    }


}