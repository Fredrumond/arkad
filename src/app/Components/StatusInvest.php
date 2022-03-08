<?php

namespace App\Components;

class StatusInvest {

    private $element;
    private $name;

    public function setElement($element){
        $this->element = $element;
    }

    public function setName($element,$type)
    {
        $value = Util::removeSpaceCaracter($element);
        $explodeParameter = $type == 'acoes' ? "ON" : ":";
        $this->name = explode($explodeParameter,$value)[0];
    }

    public function getName()
    {
        return $this->name;
    }

    public function currentPrice(){ //Valor atualR$48,79 arrow_downward-0,73%
        $removeExtraInformations = explode("arrow",$this->element)[0];
        $extractValue = explode("R$",$removeExtraInformations)[1];

        return Util::removeSpaceCaracter($extractValue," ");
    }

    public function currentVariation(){
        return $this->getLastVariation(explode("arrow",$this->element)[1]);
    }

    private function getLastVariation($value){
        $lastVariation = explode(" ",$value);

        if(str_contains($lastVariation[0],"_upward")){
            $variation =  explode("_upward",$lastVariation[0])[1];
        }

        if(str_contains($lastVariation[0],"_downward")){
            $variation =  explode("_downward",$lastVariation[0])[1];
        }

        return Util::removeSpaceCaracter($variation);
    }

    public function minPriceLastWeekends(){
        return Util::removeSpaceCaracter(explode("R$",explode("Min",$this->element)[1])[1]);
    }

    public function minPriceMonth(){
        return Util::removeSpaceCaracter(explode("R$",explode("Min",$this->element)[2])[1]," ");
    }

    public function maxPriceLastWeekends(){
        return Util::removeSpaceCaracter(explode("R$",explode("Máx",$this->element)[1])[1]);
    }

    public function maxPriceMonth(){
        return Util::removeSpaceCaracter(explode("R$",explode("Máx",$this->element)[2])[1]," ");
    }

    public function dividendYield(){
        
        $dividendYieldExplode = explode("DATA COM",$this->element)[1];
        
        $dividendYield = Util::removeSpaceCaracter(explode(".",$dividendYieldExplode)[2]);
        
        return [
            "percent" => explode("%",$dividendYield)[0],
            "value" => explode("R$",$dividendYield)[1]
        ];
    }

    
}