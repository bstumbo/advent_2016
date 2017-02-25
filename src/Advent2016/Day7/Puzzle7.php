<?php

namespace Advent2016\Day7;

class Puzzle7
{
    public function inputToArray($input) { //Transform input into readable array
       $finalarray = [];
        $nospace = explode("\n", $input);
        foreach ($nospace as $i) {
            $result = preg_split('/\[|\]/', $i); //Split string where brackets occur
            $finalarray[] = $result;     
        }
        return $finalarray;
    }
    
    public function checkInner($checks) { //Check to see if characters inside brackets in input are ABBA
            $true = 1;
            $couple = [];
            /* $newodd = [];
            foreach ($checks as $odds) {
                $newodds[] = str_split($odds);
            }
            
            $merged = array_merge(...$newodds); */
            
            foreach ($checks as $first) {//Foreach string in array
             $string = str_split($first); //Split string into another array for each character
            foreach ($string as $firsts){ //Compare each character to the next character
              $next = next($string);
              $couple[] = $firsts.$next; //Build results into new array 
            }
        
        foreach ($couple as $pair) {  //In new array, check to see if any sets of character meet ABBA
            $reverse = strrev($pair); 
            if (in_array($reverse, $couple)){
                $found = array_search($reverse, $couple);
                $key = array_search($pair, $couple);
                if ($found - $key == 2) {
                    $true = 0; //If sets match ABBA, $true = 1
                    break;
                        }
                    }
                }
                
                unset($couple); //Unset $couple array for next iteration
            }
              
        return $true; // If not ABBA, return $true as 1
    }
    
    public function checkOuter($checks){ //Check to see if characters outside brackets meet ABBA standards
        $true = 0;
        $couple = [];
            /*$neweven = [];
            foreach ($checks as $evens) {
                $neweven[] = str_split($evens);
            }
            
            $merged = array_merge(...$neweven); */
            
        foreach ($checks as $first) {//Foreach string in array
             $string = str_split($first); //Split string into another array for each character
            foreach ($string as $firsts){ //Compare each character to the next character
              $next = next($string);
              $couple[] = $firsts.$next; //Build results into new array 
            }
        foreach ($couple as $pair) {  //In new array, check to see if any sets of character meet ABBA
            $reverse = strrev($pair);
            if (in_array($reverse, $couple)){
                $found = array_search($reverse, $couple);
                $key = array_search($pair, $couple);
                if ($found - $key == 2) {
                    $true = 1; //If sets match ABBA, $true = 1
                    break;
                }
            }
          }
          unset($couple);
        }
        

        return $true;
    }
    
    public function checkABBA($input){ // After checks, count number of IP address that match ABBA
        $ipnum = 0;
        $check = $this->inputToArray($input);
        
        foreach ($check as $data) {
             $odd = [];
             $even = [];
            foreach ($data as $k => $v) { //Split bracketed characters to $odd array, outside characters to $even
            if ($k % 2 == 0) {
                $even[] = $v;
            } else {
                $odd[] = $v;
            }
        }
        $inner = $this->checkInner($odd);
        if ($inner == 1) {
          $outer = $this->checkOuter($even);
          if ($outer == 1) {
            $ipnum++;
          }
        }
        }
        
        return $ipnum;
    }

}