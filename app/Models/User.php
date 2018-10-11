<?php

namespace BlazeCMS\Models;

use BlazeCMS\Supports\Auth\SendMailTrait;
use BlazeCMS\Supports\Model\UnicodeSerializable;
use Exception;
use Illuminate\Foundation\Auth\User as Authenticatable;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements AuditableContract
{
    use SendMailTrait;
    use UnicodeSerializable;
    use HasRoles;
    use Auditable;

    protected $auditExclude = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function canAny(...$permissions) {

        if (isset($permissions) )
        {

            foreach($permissions as $permission) {

                try {
                    if ($this->can($permission)){
                        return true;
                    }
                } catch  (Exception $e) {

                }
            }
        }

        return false;
    }

}
