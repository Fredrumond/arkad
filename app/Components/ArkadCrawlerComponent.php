<?php

namespace App\Components;

use App\Services\ArkadCrawlerService;

class ArkadCrawlerComponent
{
    public static function searchActive($type, $code)
    {
        $config = [
            "codes" => [
                $type => $code
            ]
        ];

        $service = new ArkadCrawlerService($config);
        return $service->search();
    }
}