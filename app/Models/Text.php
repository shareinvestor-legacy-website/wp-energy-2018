<?php

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use BlazeCMS\Supports\Model\Translatable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Text extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Translatable;
    use Auditable;

    public $translatedAttributes = ['value'];
    public $translationModel = 'BlazeCMS\Models\Translations\TextTranslation';

    protected $auditExclude = ['created_at', 'updated_at'];
    //eager load translation
    protected $with = ['translations'];


    //single request cache
    private static $cache;

    public static function get($name)
    {
        if (!isset(static::$cache)) {
            static::$cache = static::all();
        }
        try {
            return static::$cache->where('name', $name)->first()->value;
        } catch (\Exception $e) {
            return '';
        }
    }

}
