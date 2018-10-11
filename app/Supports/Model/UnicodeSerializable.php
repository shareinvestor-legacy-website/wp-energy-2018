<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/11/2016
 * Time: 18:37
 */

namespace BlazeCMS\Supports\Model;


trait UnicodeSerializable
{

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}