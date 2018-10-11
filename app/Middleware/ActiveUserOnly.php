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

class ActiveUserOnly
{

    public function handle($request, Closure $next)
    {

        if (Auth::check() && !Auth::user()->is_active) {
            //inactive user force to log out
            Auth::logout();

            flash_error('The account is currently disabled.');

            return redirect(url(config('user.redirect.unauthenticated')));


        } else if (Auth::guest() &&  $request->has('email')) {
            //for resetting password
            try {
                if (!Auth::attempt(['email' => $request->email, 'is_active' => 1], false, false)) {

                    flash_error('The account is currently disabled.');
                    return redirect(url(config('user.redirect.unauthenticated')));
                }
            } catch (\Exception $e) {
                //if account is active, fail to check password ok
            }

        }

        return $next($request);
    }

}