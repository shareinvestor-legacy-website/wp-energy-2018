<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 9:56 PM
 */

namespace BlazeCMS\IR\Query;


class NewsSearchQuery extends QueryBuilder
{

    private $keyword;

    public function __construct($keyword = null)
    {
        $this->keyword = $keyword;
    }


    public function url()
    {
        return 'newsrooms/search.html';
    }


    public function parameters()
    {
        if (isset($this->keyword)) {
            return [
                'search' => $this->keyword,
            ];
        }

        return null;
    }

    public function cacheMinutes()
    {
        return 60;
    }
}