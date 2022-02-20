<?php

namespace App\Components;

class StatusInvest {
    public static function getCurrentPrice($value){
        return Util::removeSpaceCaracter(explode("R$",explode("arrow",$value)[0])[1]);
    }

    public static function getCurrentVariation($value){
        return  self::getLastVariation(explode("arrow",$value)[1]);
    }

    public static function getLastVariation($value){
        $lastVariation = explode(" ",$value);

        if(str_contains($lastVariation[0],"_upward")){
            $variation =  explode("_upward",$lastVariation[0])[1];
        }

        if(str_contains($lastVariation[0],"_downward")){
            $variation =  explode("_downward",$lastVariation[0])[1];
        }

        return Util::removeSpaceCaracter($variation);
    }

    public static function getMinPriceLastWeekends($value){
        return Util::removeSpaceCaracter(explode("R$",explode("Min",$value)[1])[1]);
    }

    public static function getMinPriceMonth($value){
        return Util::removeSpaceCaracter(explode("R$",explode("Min",$value)[2])[1]);
    }

    public static function getMaxPriceLastWeekends($value){
        return Util::removeSpaceCaracter(explode("R$",explode("Máx",$value)[1])[1]);
    }

    public static function getMaxPriceMonth($value){
        return Util::removeSpaceCaracter(explode("R$",explode("Máx",$value)[2])[1]);
    }

    public static function getDividendYield($value){
        $dividendYieldExplode = explode("DATA COM",$value)[1];
        $dividendYield = Util::removeSpaceCaracter(explode(".",$dividendYieldExplode)[2]);

        return [
            "percent" => explode("%",$dividendYield)[0],
            "value" => explode("R$",$dividendYield)[1]
        ];
    }

    public static function getActiveName($value,$type){
        $explodeParameter = $type == 'acoes' ? "ON" : ":";
        return Util::removeSpaceCaracter(explode($explodeParameter,$value)[0]);
    }
}