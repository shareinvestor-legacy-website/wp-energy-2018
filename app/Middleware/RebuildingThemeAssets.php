<?php

namespace BlazeCMS\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RebuildingThemeAssets
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (file_exists(public_path('/themes/default/assets/stats.json')) == null) {
            return response('Deploying new version, please wait shortly.');
        }

        return $next($request);
    }
}
