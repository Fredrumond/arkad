<?php

namespace App\Services;

use Goutte\Client;
Use App\Components\StatusInvest;
Use App\Components\Util;

class StatusInvestService {

    CONST URL = "https://statusinvest.com.br/";

    public static function getInfos($active,$type){

        $typeAction = self::setTypeFilter($type);
        
        $client = new Client();
        $crawler = $client->request('GET', self::URL . $typeAction .  $active);

        $statusInvest = new StatusInvest();

        foreach ($crawler as $key => $domElement) {
            $statusInvest->setName($domElement->nodeValue,$typeAction);
        }

        foreach ($crawler->filter('.top-info .info') as $key => $domElement) {
            $element = Util::removeSpaceCaracter($domElement->nodeValue);
            $statusInvest->setElement($element);
           
            if($key == 0){
                $currentPrice = $statusInvest->currentPrice();
                $currentCariation = $statusInvest->currentVariation();
            }

            if($key == 1){
                $minPriceLastWeekends = $statusInvest->minPriceLastWeekends();
                $minPriceMonth = $statusInvest->minPriceMonth();
            }

            if($key == 2){
                $maxPriceLastWeekends = $statusInvest->maxPriceLastWeekends();
                $maxPriceMonth = $statusInvest->maxPriceMonth();
            }

            if($key == 3){
                $dividendYield = $statusInvest->dividendYield();
            }
        }

        $activeInfos = [
            "name" => $statusInvest->getName(),
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