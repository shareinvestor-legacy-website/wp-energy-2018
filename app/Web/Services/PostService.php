<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/22/2016
 * Time: 18:04
 */

namespace BlazeCMS\Web\Services;


use BlazeCMS\Models\Category;
use BlazeCMS\Models\Post;
use Illuminate\Http\Request;


class PostService
{


    public function find($id)
    {
        return Post::find($id);
    }


    public function get(...$categories)
    {
        return Post::categoryPaths(...$categories)->public()->orderByLatest()->get();
    }


    public function getSticky($limit = 0, ...$categories)
    {
        $posts = Post::categoryPaths(...$categories)->public()->sticky()->orderByLatest();

        if (isset($limit) && $limit > 0)
            return $posts->take($limit)->get();

        return $posts->get();
    }


    public function getLatest($limit = 0, ...$categories)
    {

        $posts = Post::categoryPaths(...$categories)->public()->orderByLatest();
        if (isset($limit) && $limit > 0)
            return $posts->take($limit)->get();

        return $posts->get();
    }


    //get posts having at least one gallery
    public function getPostWithGallery(...$categories)
    {
        return Post::categoryPaths(...$categories)->has('galleries')->public()->orderByLatest()->get();
    }


    public function getCoerciveOrder($category)
    {

        return Category::paths($category)->first()->posts()->public()->orderBy('pivot_order')->get();
    }


    public function getYears(...$categories)
    {
        return Post::getYears(...$categories);
    }


    public function queryByYear($year = null, ...$categoryPaths)
    {

        $posts = Post::categoryPaths(...$categoryPaths)->public();


        if (!empty($year)) {
            $posts->whereYear('date', '=', $year);
        }

        $posts->orderByLatest();


        return $posts->paginate(12);
    }


}