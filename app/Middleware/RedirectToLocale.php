<?php

namespace BlazeCMS\Middleware;

use Closure;


class RedirectToLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $locale
     * @return mixed
     */
    public function handle($request, Closure $next, $locale = null)
    {
        //if locale is null and route is no prefix : redirect to default URL
        if($locale == null && !$request->route()->getPrefix()){
            $url = localized_current_url(locale());
            return redirect($url);
        }
        else if (isset($locale) && $locale != locale()) {
            $url = localized_current_url($locale);
            return redirect($url);
        }

        return $next($request);
    }
}
