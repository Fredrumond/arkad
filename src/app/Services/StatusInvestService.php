<?php

namespace App\Services;

use Goutte\Client;
Use App\Components\StatusInvest;

class StatusInvestService {

    CONST URL = "https://statusinvest.com.br/";

    public static function getInfos($active,$type){

        $typeAction = self::setTypeFilter($type);
        
        $client = new Client();
        $crawler = $client->request('GET', self::URL . $typeAction .  $active);

        foreach ($crawler as $key => $domElement) {
            $name = StatusInvest::getActiveName($domElement->nodeValue,$typeAction);
        }

        foreach ($crawler->filter('.top-info .info') as $key => $domElement) {
            if($key == 0){
                $currentPrice = StatusInvest::getCurrentPrice($domElement->nodeValue);
                $currentCariation = StatusInvest::getCurrentVariation($domElement->nodeValue);
            }

            if($key == 1){
                $minPriceLastWeekends = StatusInvest::getMinPriceLastWeekends($domElement->nodeValue);
                $minPriceMonth = StatusInvest::getMinPriceMonth($domElement->nodeValue);
            }

            if($key == 2){
                $maxPriceLastWeekends = StatusInvest::getMaxPriceLastWeekends($domElement->nodeValue);
                $maxPriceMonth = StatusInvest::getMaxPriceMonth($domElement->nodeValue);
            }

            if($key == 3){
                $dividendYield = StatusInvest::getDividendYield($domElement->nodeValue);
            }
        }

        $activeInfos = [
            "name" => $name,
            "current" => [
                "price" => $currentPrice,
                "variation" => $currentCariation,
            ],
            "price" => [
                "lastWeeks" => [
                    "min" => $minPriceLastWeekends,
                    "max" => $maxPriceLastWeekends,
                ],
                "month" => [
                    "min" => $minPriceMonth,
                    "max" => $maxPriceMonth,
                ]
                ],
            "dividendYield" => [
                "percent" => $dividendYield["percent"],
                "value" => $dividendYield["value"]
            ]
        ];

        return $activeInfos;

    }

    private static function setTypeFilter($type){
        if($type == 'acoes'){
            return 'acoes/';
        }

        if($type == 'fundos'){
            return 'fundos-imobiliarios/';
        }
    }
}