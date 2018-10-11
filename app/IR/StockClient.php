<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:34 PM
 */

namespace BlazeCMS\IR;


use BlazeCMS\IR\Query\QueryBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class StockClient
{

    private $client;
    private $minCacheMinutes;
    private $maxCacheMinutes;

    public function __construct()
    {
        $baseUrl = config('user.ir.url') . locale() . '/';

        $this->minCacheMinutes = 1;
        $this->maxCacheMinutes = 15;

        $this->client = new Client(
            [
                'base_uri' => $baseUrl,
                'timeout' => config('user.ir.timeout', 15),
                'connect_timeout' => config('user.ir.connectTimeout', 5),
            ]);
    }

    //random timespan to reduce invalidate cache requests at same time
    private function cacheMinutes($minutes)
    {
        $minutes = $minutes ?? $this->maxCacheMinutes;

        return rand($this->minCacheMinutes, $minutes);
    }


    private function cacheKey(QueryBuilder $builder)
    {
        $url = $builder->url();
        $locale = locale();
        $query = $builder->parameters() != null ? http_build_query($builder->parameters()) : 'none';

        return "webservice.$locale.$url.$query";
    }


    public function query(QueryBuilder $builder)
    {
        try {

            $cacheMinutes = $this->cacheMinutes($builder->cacheMinutes());

            $response = cache($this->cacheKey($builder));

            if (isset($response))
                return $response;

            $response = $this->client->get($builder->url(), [
                'query' => $builder->parameters(),
            ]);

            $response = json_decode(sanitize_utf8_string($response->getBody()), false);


            cache([$this->cacheKey($builder) => $response], $cacheMinutes);

            return $response;

        } catch (\Exception $e) {

            return null;
        }

    }
}