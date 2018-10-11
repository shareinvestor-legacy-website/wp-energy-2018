<?php

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\DateTimeConvertable;
use BlazeCMS\Supports\Model\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Position extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use DateTimeConvertable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\PositionPresenter';


    protected $auditExclude = ['created_at', 'updated_at'];

    public $translationModel = 'BlazeCMS\Models\Translations\PositionTranslation';

    public $translatedAttributes = ['title', 'qualification', 'description', 'external_url', 'external_url_target'];

    //eager load translation
    protected $with = ['translations'];

    // protected $fillable = ['code', 'value'];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $this->convertDateToSystemTimezone($value, false);
    }


    public function getDateAttribute($value)
    {
        return $this->convertDateToUserTimezone($value);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    //scope
    public function scopePublic($query)
    {
        return $query->where('status', 'public');
    }

    public function scopeOrderByLatest($query)
    {
        return $query->orderBy('date', 'desc')->orderBy('id', 'desc');
    }


}
