<?php

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\DateTimeConvertable;
use BlazeCMS\Supports\Model\Taggable;
use BlazeCMS\Supports\Model\Translatable;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Post extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Taggable;
    use Sluggable;
    use DateTimeConvertable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\PostPresenter';


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['slug']
            ]
        ];
    }


    protected $auditExclude = ['created_at', 'updated_at'];

    public $translationModel = 'BlazeCMS\Models\Translations\PostTranslation';


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
    protected $with = ['translations', 'tags', 'categories'];


    //if slug is not existed, use title to generate slug
    public function getSlugAttribute($value)
    {
        if (empty($value)) {
            return $this->title;
        } else {
            return $value;
        }
    }


    public function setPeriodFromAttribute($value)
    {
        $this->attributes['period_from'] = $this->convertDateToSystemTimezone($value);
    }


    public function getPeriodFromAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function setPeriodToAttribute($value)
    {
        $this->attributes['period_to'] = $this->convertDateToSystemTimezone($value);
    }


    public function getPeriodToAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $this->convertDateToSystemTimezone($value);
    }


    public function getDateAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('order')->withTimestamps();
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


    public function url()
    {

        $external_url = $this->external_url;

        if (isset($external_url) && $external_url !== '') {

            if (starts_with($external_url, 'http')) {
                return $external_url;
            }
            return localized_url($external_url);
        }

        return null;
    }


    //scope
    public function scopePublic($query, $ignorePeriod = false)
    {
        $query->where('status', 'public');

        if (!$ignorePeriod) {

            $query->where(function ($query) {
                $query->where(function ($query) {
                    $query->whereNull('period_from')->whereNull('period_to');
                })->orWhere(function ($query) {
                    $now = Carbon::now();
                    $query->where('period_from', '<=', $now)->where('period_to', '>=', $now);
                });
            });
        }

        return $query;
    }

    public function scopeSticky($query)
    {
        return $query->where('sticky', true);
    }

    public function scopeCategoryPaths($query, ...$paths)
    {
        return $query->whereHas('categories', function ($query) use ($paths) {
            $query->whereIn('path', $paths);
        });
    }


    public function scopeCategoryIDs($query, ...$ids)
    {
        return $query->whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        });
    }

    public function scopeOrderByLatest($query)
    {
        return $query->orderBy('date', 'desc')->orderBy('id', 'desc');
    }


    public static function getYears(...$categories)
    {

        if ($categories == array_filter($categories, 'is_numeric'))
            $dates = static::categoryIDs(...$categories)->public()->select('date')->get();
        else
            $dates = static::categoryPaths(...$categories)->public()->select('date')->get();

        $keys = $dates->map(function ($item, $key) {
            return intl_date($item->date, 'yyyy', 'en');
        });

        $years = $dates->map(function ($item, $key) {
            return intl_date($item->date, 'yyyy');
        });

        $years = collect($keys->combine($years)->unique())->sort()->reverse();

        return $years;
    }


    public function previous($category = null)
    {

        if (!isset($category)) {
            $category = static::categories()->first()->path;
        }

        $posts = static::categoryPaths($category)->where('id', '<>', $this->attributes['id'])->public();


        return $posts->where('date', '<=', $this->attributes['date'])->orderBy('date', 'desc')->orderBy('id', 'desc')->first();

    }


    public function next($category = null)
    {

        if (!isset($category)) {
            $category = static::categories()->first()->path;
        }
        $posts = static::categoryPaths($category)->where('id', '<>', $this->attributes['id'])->public();

        return $posts->where('date', '>=', $this->attributes['date'])->orderBy('date', 'asc')->orderBy('id', 'asc')->first();
    }


    //find best match category
    public function category(...$excepts)
    {

        $categories = $this->categories;
        if (isset($excepts)) {
            return $categories->first(function ($value, $key) use ($excepts) {
                return !in_array($value->path, $excepts);
            });
        }
        return $categories->first();
    }

}
