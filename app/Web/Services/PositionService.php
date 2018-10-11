<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:05
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Position;

class PositionService
{

    public function find($id)
    {
        return Position::find($id);
    }


    public function get()
    {
        return Position::public()->orderByLatest()->get();
    }


}