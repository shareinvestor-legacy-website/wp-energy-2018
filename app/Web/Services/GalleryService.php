<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:05
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Gallery;

class GalleryService
{

    public function find($id)
    {
        return Gallery::find($id);
    }


    public function getByTags($tags)
    {
        return Gallery::withAllTags($tags)->public()->get();
    }


}