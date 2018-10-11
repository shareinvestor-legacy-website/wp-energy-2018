<?php

namespace BlazeCMS\Models;




use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Department extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\DepartmentPresenter';


    protected $auditExclude = ['created_at', 'updated_at'];

    public $translatedAttributes = ['name','remark'];
    public $translationModel = 'BlazeCMS\Models\Translations\DepartmentTranslation';

    //eager load translation
    protected $with = ['translations'];

    // protected $fillable = ['code', 'value'];


    public function positions()
    {
        return $this->hasMany(Position::class);
    }

}
