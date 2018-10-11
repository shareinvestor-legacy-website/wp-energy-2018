<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:56 PM
 */

namespace BlazeCMS\IR\Query;


class NewsDetailQuery extends QueryBuilder
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }


    public function url()
    {
        return 'newsrooms/detail.html/id/' . $this->id;
    }


    public function cacheMinutes()
    {
        return 60;
    }
}