<?php

namespace App\Components;

class Util {

    public static function removeSpaceCaracter($value){
        return str_replace("\n","",$value);
    }

}