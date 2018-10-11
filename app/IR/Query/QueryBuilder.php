<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:37 PM
 */

namespace BlazeCMS\IR\Query;


abstract class QueryBuilder
{


    public abstract function url();


    public function parameters()
    {
        return null;
    }


    public function cacheMinutes()
    {
        return 15;
    }

}