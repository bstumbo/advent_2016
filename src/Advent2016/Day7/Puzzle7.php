<?php

namespace Advent2016\Day7;

class Puzzle7
{
    public function inputToArray($input) {
       $finalarray = [];
        $nospace = explode("\n", $input);
        foreach ($nospace as $i) {
            $result = preg_split('/\[|\]/', $i);
            $finalarray[] = $result;     
        }
        return $finalarray;
    }
    
    public function checkABBA($input){
        $ipnum = 0;
        $check = $this->inputToArray($input);
        foreach ($check as $i){
            $inside = $i[1];
            preg_match("/(..)(..)/", $inside, $abba);
            if ($abba[1] !== strrev($abba[2])){
                $ipnum++;
            }
            
        }
       
        return $ipnum++;
    }
    

}