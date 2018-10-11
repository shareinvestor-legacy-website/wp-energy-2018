<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/2/2016
 * Time: 17:34
 */

namespace BlazeCMS\Middleware;


use Cache;
use Closure;
use ResponseCache;

class CacheClear
{

    public function handle($request, Closure $next)
    {

        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch') || $request->isMethod('delete')) {

            Cache::flush();
        }

        return $next($request);
    }

}