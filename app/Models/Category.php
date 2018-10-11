<?php

namespace BlazeCMS\Models;

use Baum\Node;

use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Nestedable;
use BlazeCMS\Supports\Model\Translatable;

use Cviebrock\EloquentSluggable\Sluggable;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Category extends Node  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Nestedable;
    use Sluggable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\CategoryPresenter';

    protected $auditExclude  = ['created_at', 'updated_at'];
    public $translatedAttributes = ['name', 'image','excerpt', 'body'];
    public $translationModel = 'BlazeCMS\Models\Translations\CategoryTranslation';
    //eager load translation
    protected $with = ['translations'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['slug']
            ]
        ];
    }


    //if slug is not existed, use name to generate slug
    public function getSlugAttribute($value)
    {
        if (empty($value)) {
            return $this->name;
        } else {
            return $value;
        }
    }

    public function scopeWithUniqueSlugConstraints(Builder $query, Model $model, $attribute, $config, $slug)
    {
        return $query->where('parent_id', $model->parent_id);
    }

    public function populatePath()
    {
        foreach ($this->getDescendantsAndSelf() as $category) {

            $category->path = $category->path('slug');
            $category->display_path = $category->path('name', ' -> ' );
            $category->save();
        }
    }


    public static function populatePaths()
    {
        foreach (Category::all() as $category) {
            $category->path = $category->path('slug');
            $category->display_path = $category->path('name', ' -> ' );
            $category->save();
        }

    }


    public function posts()
    {
        return $this->belongsToMany(Post::class)->withPivot('order')->withTimestamps();
    }




    public function banner()
    {
        $image = $this->image;
        if (isset($image) && $image !== '')
            return $image;
        else {
            $parent = $this->parent()->first();
            if (isset($parent)) {
                return Category::find($parent->id)->banner();
            }


        }
        return null;
    }

    //scope
    public function scopePublic($query)
    {
        return $query->where('status', 'public');
    }


    public function scopePaths($query, ...$paths) {

        return $query->whereIn('path', $paths);
    }


}
