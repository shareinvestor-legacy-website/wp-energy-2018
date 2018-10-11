<?php

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\DateTimeConvertable;

use BlazeCMS\Supports\Model\Translatable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Gallery extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Taggable;
    use DateTimeConvertable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\GalleryPresenter';

    protected $auditExclude = ['created_at', 'updated_at'];

    public $translationModel = 'BlazeCMS\Models\Translations\GalleryTranslation';

    //eager load translation
    protected $with = ['translations'];

    public $translatedAttributes = ['name', 'description'];

    // protected $fillable = ['code', 'value'];


    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $this->convertDateToSystemTimezone($value, false);
    }


    public function getDateAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function posts()
    {
        return $this->morphedByMany(Post::class, 'galleryable');
    }


    public function pages()
    {
        return $this->morphedByMany(Page::class, 'galleryable');
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function delete()
    {
        $this->detag();

        parent::delete();
    }


    //scope
    public function scopePublic($query)
    {
        return $query->where('status', 'public');
    }
}
