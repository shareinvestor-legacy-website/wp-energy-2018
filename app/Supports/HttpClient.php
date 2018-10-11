<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/24/2016
 * Time: 18:16
 */

namespace BlazeCMS\Supports;


use GuzzleHttp\Client;


//simple http client
class HttpClient
{



    //return json or plain text
    public static function get($url, $maxCacheMinutes = 15, $json = true)
    {
        try {

            $response = cache($url);

            if (isset($response))
                return $response;

            $client = new Client();
            $response = $client->get($url, ['timeout' => 15, 'connect_timeout' => 5]);

            if ($json)
                $response = json_decode($response->getBody());
            else
                $response = $response->getBody()->getContents();

            //random cache minutes between 1 to max minutes
            $minutes = rand(1, $maxCacheMinutes);

            cache([$url => $response], $minutes);

            return $response;

        } catch (\Exception $e) {

            return null;
        }
    }
}