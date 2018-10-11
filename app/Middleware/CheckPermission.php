<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/2/2016
 * Time: 17:34
 */

namespace BlazeCMS\Middleware;


use Auth;
use Closure;

class CheckPermission
{

    public function handle($request, Closure $next, ...$permissions)
    {

        if (Auth::check() ) {

            foreach($permissions as $permission) {
                if (!Auth::user()->canAny($permission)) {
                    if (\Request::is('admin/elfinder/*')) {
                        //use for popup excluding menu
                        abort(401);
                    } else {
                        abort(403);
                    }

                }
            }
        }
        return $next($request);

    }

}