<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/23/2016
 * Time: 14:30
 */

namespace BlazeCMS\Supports\Model;


trait Taggable
{

    use \Cviebrock\EloquentTaggable\Taggable;


    public function hasTag($tag)
    {
        return $this->tags->pluck('name')->contains($tag);
    }

    public function hasAnyTags(...$tags)
    {
        return $this->tags->pluck('name')->contains(function ($key, $value) use ($tags) {
            return in_array($value, $tags);
        });
    }

    public function hasAllTags(...$tags)
    {
        return collect($tags)->diff($this->tags->pluck('name'))->count() == 0;
    }
}