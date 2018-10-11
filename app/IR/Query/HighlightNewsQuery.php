<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:56 PM
 */

namespace BlazeCMS\IR\Query;


class HighlightNewsQuery extends QueryBuilder
{


    public function url()
    {
        return 'newsrooms/highlights.html';
    }

    public function cacheMinutes()
    {
        return 60;
    }
}