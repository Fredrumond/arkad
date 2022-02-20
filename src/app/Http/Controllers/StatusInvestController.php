<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Services\StatusInvestService;

class StatusInvestController extends Controller
{
    public function index(){
        // $listAcoes = ["VIVT3","HYPE3","ALUP11","ENBR3","SAPR4","ITSA4","ABEV3","BBSE3","QUAL3"];
        // $listFundos = ["HSML11","VISC11","SDIL11","XPLG11","HFOF11","BPFF11","VINO11","PVBI11","BCRI11","MXRF11"];
        $listAcoes = ["VIVT3"];
        $listFundos = ["HSML11"];

        $fundos = [];
        $acoes = [];

        for ($i=0; $i < sizeof($listAcoes); $i++) { 
            array_push($acoes,StatusInvestService::getInfos($listAcoes[$i],"acoes"));
        }

        for ($i=0; $i < sizeof($listFundos); $i++) { 
            array_push($fundos,StatusInvestService::getInfos($listFundos[$i],"fundos"));
        }

        return array_merge($fundos,$acoes);
    }
}
