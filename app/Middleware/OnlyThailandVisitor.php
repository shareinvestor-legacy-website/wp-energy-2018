<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 9/20/2018
 * Time: 4:49 PM
 */

namespace BlazeCMS\Middleware;



use BlazeCMS\Supports\HttpClient;
use Closure;


class OnlyThailandVisitor
{


    public function handle($request, Closure $next)
    {

        $enabled = config('app.only_thailand_visitor');

        if($enabled)
        {
            $result = HttpClient::get('http://ip2c.org/'.$request->ip(),3, false);

            if(isset($result))
            {
                $country = explode(';', $result)[3];

                if ($country == "Reserved") {
                    //private ip, allow to access
                    return $next($request);

                } else if($country != 'Thailand')
                {
                    return response("You are from $country and not allowed to visit this page.", 401);
                }
            }

        }

        return $next($request);


    }
}
