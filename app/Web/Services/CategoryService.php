<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:04
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Category;

class CategoryService
{


    public function find($id)
    {
        return Category::find($id);
    }


    public function get(...$paths)
    {

        return Category::paths(...$paths)->public()->get();
    }

}