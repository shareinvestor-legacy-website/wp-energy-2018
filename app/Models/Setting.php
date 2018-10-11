<?php

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Setting extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Auditable;

    protected $auditExclude = ['created_at', 'updated_at'];


    public static function set($key, $value = '')
    {
        $setting = Setting::where('key', $key)->first();
        if (isset($setting)) {
            $setting->value = $value;
        } else {
            $setting = new Setting();
            $setting->key = $key;
            $setting->value = $value;
        }

        $setting->save();
    }


    //single request cache
    private static $cache;

    public static function get($key)
    {
        if (!isset(static::$cache)) {
            static::$cache = static::all();
        }
        try {
            return static::$cache->where('key', $key)->first()->value;
        } catch (\Exception $e) {
            return '';
        }
    }
}
