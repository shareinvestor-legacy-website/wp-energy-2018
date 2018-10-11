<?php

namespace BlazeCMS\Models;

use Baum\Node;
use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Nestedable;
use BlazeCMS\Supports\Model\DateTimeConvertable;
use BlazeCMS\Supports\Model\Taggable;
use BlazeCMS\Supports\Model\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Page extends Node  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Nestedable;
    use Sluggable;
    use Taggable;
    use DateTimeConvertable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\PagePresenter';


    protected $auditExclude = ['created_at', 'updated_at'];

    public $translationModel = 'BlazeCMS\Models\Translations\PageTranslation';

    public $translatedAttributes = [
        'title',
        'alternate_title',
        'excerpt',
        'body',
        'image',
        'external_url',
        'external_url_target',
        'file',
        'custom_css',
        'custom_js',
    ];

    //eager load
    protected $with = ['translations', 'tags'];

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
            return $this->title;
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
        foreach ($this->getDescendantsAndSelf() as $page) {

            $page->path = $page->path('slug');
            $page->display_path = $page->path('title', ' -> ' );
            $page->save();
        }
    }


    public static function populatePaths()
    {
        foreach (Page::all() as $page) {
            $page->path = $page->path('slug');
            $page->display_path = $page->path('title', ' -> ' );
            $page->save();
        }

    }


    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $this->convertDateToSystemTimezone($value);
    }


    public function getDateAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function delete()
    {
        $this->detag();

        parent::delete();
    }


    public function galleries()
    {
        return $this->morphToMany(Gallery::class, 'galleryable');
    }

    //scope
    public function scopePublic($query)
    {
        return $query->where('status', 'public');
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

        return localized_url($this->path);
    }


    public function banner()
    {
        $image = $this->image;
        if (isset($image) && $image !== '')
            return $image;
        else {
            $parent = $this->parent()->first();
            if (isset($parent)) {
                return Page::find($parent->id)->banner();
            }


        }
        return null;
    }

    public function description()
    {
        $desc = $this->excerpt;
        if (isset($desc) && $desc !== '')
            return $desc;
        else {
            $parent = $this->parent()->first();
            if (isset($parent)) {
                return Page::find($parent->id)->description();
            }

        }
        return null;
    }


    public function breadcrumbs()
    {
        return $this->getAncestorsAndSelf();
    }


    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
