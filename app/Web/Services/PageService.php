<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:04
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Page;

class PageService
{


    public function getPublicRoots()
    {
        return Page::roots()->public()->get();
    }



    public function get(...$paths)
    {
        if (is_array($paths)) {
            $paths = implode('/', array_filter($paths, 'strlen'));
        }

        return Page::where('path', strtolower($paths))->public()->first();
    }




}