<?php

namespace BlazeCMS\Models;



use BlazeCMS\Supports\Model\UnicodeSerializable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Contact extends Model  implements AuditableContract
{

    use UnicodeSerializable;
    use Auditable;
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\ContactPresenter';

    protected $auditExclude = ['created_at', 'updated_at'];



    public function emails() {
        $emails = $this->emails;
        if (isset($emails))
            return explode(';', $emails);
        return null;
    }

    public static function get($name)
    {
        return static::where('name', $name)->first();

    }
}
