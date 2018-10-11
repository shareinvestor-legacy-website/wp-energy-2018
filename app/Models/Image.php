<?php

namespace BlazeCMS\Models;



use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;

use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Image extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\ImagePresenter';

    protected $auditExclude = ['created_at', 'updated_at'];



    public $translationModel = 'BlazeCMS\Models\Translations\ImageTranslation';

    public $translatedAttributes = ['caption'];

    //eager load translation
    protected $with = ['translations'];




    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }
}
