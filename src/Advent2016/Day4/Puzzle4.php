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
    
    public function checkNum($merged) {
        $key_array = array_keys($merged); 
        $last_key = end($key_array);
        foreach ($merged as $key => $n){
           if ($key == $last_key) {
            break;
            } else { 
                $next_n = next($merged);
                 if ($n > $next_n) {
                       $truth = 2;
                 } else {
                   $truth = 3;
                   break;
              }
            } 
        }
        
        return $truth;
    }
    
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
        $trueroom = 0;
        
        foreach ($columns as $i) {
            $counted = [];
            $encrypt = $i[0];
            $id = $i[1];
            $checksum = substr($i[2], 1, -1); 
            $split = str_split($checksum);
            
            foreach ($split as $e) {
                $counted[] = substr_count($encrypt, $e);
            }
            
            $merged = array_combine($split, $counted);
            $keys = array_keys($merged);
            
            foreach ($merged as $l => $n) {
               $next_n = next($merged);
               $next_l = next($keys);
               $alpha = array($l, $next_n);
               
               if ($n > $next_n) {
                    $truth = 2;
               } elseif ($n = $next_n && sort($alpha) == $alpha) {
                $truth = 2;
               } else {
                $truth = 3;
                break;
               }       
            }
         if ($truth == 2) {
            $trueroom++;
         } 
        }
        return $trueroom;   
    }
}         