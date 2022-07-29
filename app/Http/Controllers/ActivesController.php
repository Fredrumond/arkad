<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArkadCrawlerService;

/**
 * @OA\Get(
 * path="api/actives",
 * description="Retorna todos os ativos",
 * operationId="authLogin",
 * tags={"Ativos"},
 * @OA\Response(
 *    response=200,
 *    description="Successful operation",

 *   )
 * )
 */

class ActivesController extends Controller
{
    public function index(){
        $config = [
            "codes" => [
                "acoes" => [
                    "itub3"
                ],
                "fundos" => [
                    "hsml11"
                ]
            ]
        ];
        $service = new ArkadCrawlerService($config);
        return $service->search();
    }
}
