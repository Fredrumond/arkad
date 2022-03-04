<?php

namespace App\Components;

class Util {

    public static function removeSpaceCaracter($value,$separator = null){
        if($separator == null){
            return str_replace("\n","",$value);
        }
        
        return str_replace($separator,"",$value);
    }

}