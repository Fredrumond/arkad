<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArkadCrawlerService;


class FundsController extends Controller
{
    public function index(Request $request)
    {
        $searchQuerey = $request->query('codes');

        $config = [
            "codes" => [
                "fundos" => explode(',',$searchQuerey)
            ]
        ];

        $service = new ArkadCrawlerService($config);
        return $service->search();
    }

    public function show($code)
    {
        $config = [
            "codes" => [
                "fundos" => [$code]
            ]
        ];

        $service = new ArkadCrawlerService($config);
        return $service->search();
    }
}
