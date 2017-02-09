<?php

namespace Advent2016\Day5;

class Puzzle5

{
    public function hashInput($input) {
        $password = [];
        $counter = 0;
        
        $combined1 = $input . $counter;
        
        while (count($password) < 8)  { //while array has less than 8 values, do the below
            $combined = $input . $counter; //combine input $string and $counter
            $test = md5($combined); // md5 the combined string
            $zeros = "00000";
            $sub = substr($test,0,5); // substring the first 5 characters of $test
            if (strcmp($zeros, $sub) == 0) { //if first 5 characters are zeros, add 6th character to password
                $password[] = substr($test,5,1);
            }
            
            $counter++; //+1 to counter
        }
        
        return $password;
    }
    

    
}