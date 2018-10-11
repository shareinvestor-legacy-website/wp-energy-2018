<?php

namespace BlazeCMS\Models;

use Baum\Node;

use BlazeCMS\Supports\Model\Taggable;
use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Nestedable;
use BlazeCMS\Supports\Model\Translatable;

use Cviebrock\EloquentSluggable\Sluggable;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Menu extends Node implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Nestedable;
    use Sluggable;
    use Auditable;
    use Taggable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\MenuPresenter';


    protected $auditExclude = ['created_at', 'updated_at'];
    public $translatedAttributes = [
        'name',
        'external_url',
        'external_url_target',
    ];
    public $translationModel = 'BlazeCMS\Models\Translations\MenuTranslation';
    //eager load translation
    protected $with = ['translations', 'page', 'tags'];

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
        foreach ($this->getDescendantsAndSelf() as $menu) {

            $menu->path = $menu->path('slug');
            $menu->display_path = $menu->path('name', ' -> ');
            $menu->save();
        }
    }


    public static function populatePaths()
    {
        foreach (Menu::all() as $menu) {
            $menu->path = $menu->path('slug');
            $menu->display_path = $menu->path('name', ' -> ');
            $menu->save();
        }

    }


    public function page()
    {
        return $this->belongsTo(Page::class);
    }


    public function url()
    {

        $external_url = $this->external_url;

        if (isset($external_url) && $external_url !== '') {

            if (starts_with($external_url, 'http')) {
                return $external_url;
            }
            return localized_url($external_url);
        }


        //$page = Page::find($this->page_id);
        $page = $this->page;

        if (isset($page)) {
            return $page->url();
        }

        return null;
    }


    //scope
    public function scopePublic($query)
    {
        return $query->where('status', 'public');
    }


    public function scopePaths($query, ...$paths)
    {

        return $query->whereIn('path', $paths);
    }



    /**
     * lookup children faster with cache
     */
    public function getChildren($public = false) {

        return Cache::remember("menu.$this->id.$public", 60, function () use ($public) {
            if ($public)
                return $this->children()->public()->get();
            else
                return $this->children()->get();
        });
    }

}
