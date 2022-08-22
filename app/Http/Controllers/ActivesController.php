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
    public function index(Request $request,$type)
    {
        $searchQuerey = $request->query('codes');

        if($type == 'funds'){
            $config = [
                "codes" => [
                    "fundos" => explode(',',$searchQuerey)
                ]
            ];
        }

        if($type == 'actions'){
            $config = [
                "codes" => [
                    "acoes" => explode(',',$searchQuerey)
                ]
            ];
        }

        $service = new ArkadCrawlerService($config);
        return $service->search();
    }
}
