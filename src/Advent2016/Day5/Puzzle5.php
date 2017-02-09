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
    
     public function hashInput2($input) {
        $password = [];
        $check = [];
        $counter = 0;
        
        $combined1 = $input . $counter;
        
        while (count($password) < 8)  { //while array has less than 8 values, do the below
            $combined = $input . $counter; //combine input $string and $counter
            $test = md5($combined); // md5 the combined string
            $zeros = "00000";
            $sub = substr($test,0,5); // substring the first 5 characters of $test
            if (strcmp($zeros, $sub) == 0) { //if first 5 characters are zeros, add 6th character to password
                $min = 0;
                $max = 7;
                $position = substr($test,5,1);
                $value = substr($test,6,1);
                if (is_numeric($position) && ($min <= $position) && ($position <= $max)) {
                    if (!in_array($position, $check)){
                        $new = array($position => $value);
                        $password[] = $new;
                        //array_splice($password, intval($position), 0, $value);
                        $check[] = $position;
                    }
                }
            }
            
            $counter++; //+1 to counter
        }
        
        return $password;
    }
    

    
}