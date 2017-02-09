<?php

namespace Advent2016\Day4;

class Puzzle4

{
    /*
     * Change input into three column array
     * First remove -, [, ], characters
     * preg_split condensed string into separated alpha and numeric
     * array_chunk into groups of three
     * [0] = encrypted name
     * [1] = section ID
     * [2] = checksum
     * 
     */
    
    public function inputToArray($input) {
        $finalarray = [];
        $removed = str_replace("-", "", $input);
        $nospace = explode("\n", $removed);
        $nospace = array_filter(array_map('trim', $nospace));
        foreach ($nospace as $i) {
            $result = preg_split('/(?<=\D)(?=\d)|\d+\K/', $i);
            $finalarray[] = $result;     
        }
        return $finalarray;
    }
    
    /*
     * Check to see if are listed in decending order
     * If yes, return 2.  If no, return 3.  If equal, return 1
     * Returns array indicating whether numbers are in order
     * and whether any of them are equal
     */
    
    public function checkNum($merged, $encryptfinal) {
        $key_array = array_keys($merged); 
        $last_key = end($key_array);
        $equal = [];
        $fakemerged = $merged;
        
        if (reset($merged) == 0) {
            $truth = 3;
        } else {
        
        foreach ($merged as $key => $n){
                 $next_n = next($merged);
                 if ($next_n === NULL){
                    break;
                 } elseif ($n > $next_n) {
                       $truth = 2;
                 }  elseif ($n == $next_n && $next_n !== NULL){
                    $truth = 2;
                    $next_key = key($merged);  //This is a problem. Causing alpha check problems later on
                    current($merged);
                    $equal[] = array($key, $next_key);
                 } else {
                   $truth = 3;
                   break;
              }
        }
        
        }
        
        return array($truth, $equal);
    }
    
    /**
     * If any numbers are equal, checkAlpha() checks to see
     * if letters are in alpha order.
     * Yes returns 2.  No return 3.
     */
    
    public function checkAplha($keys){
        $check = [];
        $original = $keys;
        sort($keys);
        foreach ($keys as $sorted) {
            $check[] = $sorted;
        }
        
        if ($check === $original) {
            $truth = 2;
        } else {
            $truth = 3;
        }
        return $truth;
    }
    
    
    public function checkSum($input) {
        $columns = $this->inputToArray($input);
        $trueroom = [];
        
        foreach ($columns as $i) {
            $counted = [];
            $encrypt = $i[0];
            $id = $i[1];
            $checksum = substr($i[2], 1, -1); 
            $split = str_split($checksum);
            
            $encryptarray = str_split($encrypt);
            $encryptcount = array_count_values($encryptarray);
            arsort($encryptcount);
            ksort($encryptcount);
            $encryptfinal = array_slice($encryptcount,0);
             
            foreach ($split as $e) {
                $counted[] = substr_count($encrypt, $e);
            }
            
            
            $merged = array_combine($split, $counted);
            $keys = array_keys($merged);
            
            if (max($encryptfinal) <=  max($merged)) {
            
            $numtest = $this->checkNum($merged, $encryptfinal);  
            
            if ($numtest[0] == 2 && $numtest[1] === array())  {
                $trueroom[] = $id;
            } elseif ($numtest[1] !== array()) {
                foreach ($numtest[1] as $alpha){
                    $alphatest = $this->checkAplha($alpha);
                    if ($alphatest == 2){
                        $keytest = 2;
                    } else {
                        $keytest = 3;
                        break;
                    }
                }
              if ($keytest == 2) {
                $trueroom[] = $id ; // Add $id to $trueroom array to be added later
              }
            }
            }
        }
        $answer = array_sum($trueroom);
        return  $answer;   
    }
}         