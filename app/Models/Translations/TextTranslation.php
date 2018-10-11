<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/20/2016
 * Time: 11:07 PM
 */

namespace BlazeCMS\Models\Translations;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class TextTranslation extends Model  implements AuditableContract
{
    use UnicodeSerializable;
    use Auditable;

    protected $auditExclude = ['created_at', 'updated_at'];

    //public $timestamps = false;

   // protected $fillable = ['value'];


}