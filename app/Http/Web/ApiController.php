<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/24/2016
 * Time: 16:31
 */

namespace BlazeCMS\Http\Web;



use BlazeCMS\Http\Controller;
use BlazeCMS\Supports\HttpClient;
use BlazeCMS\Web\Services\ApiService;


class ApiController extends Controller
{

    private $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function menus()
    {

       $irmenu = HttpClient::get('http://domain.com/menu.json');

        return response()->json($this->apiService->menu($irmenu));
    }

   



}