<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/14/2016
 * Time: 11:22
 */

namespace BlazeCMS\Models;


use BlazeCMS\Supports\Model\UnicodeSerializable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;



class Role extends  \Spatie\Permission\Models\Role  implements AuditableContract
{
    use UnicodeSerializable;
    use Auditable;

    protected $auditExclude = ['created_at', 'updated_at'];
}