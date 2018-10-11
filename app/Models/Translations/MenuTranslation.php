<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/20/2016
 * Time: 11:07 PM
 */

namespace BlazeCMS\Models\Translations;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Presentable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class MenuTranslation extends Model implements AuditableContract
{
    use UnicodeSerializable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Presenters\MenuPresenter';

    protected $auditExclude = ['created_at', 'updated_at'];

    //public $timestamps = false;

   // protected $fillable = ['value'];

}