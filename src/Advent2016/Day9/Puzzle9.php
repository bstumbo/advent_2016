<?php

namespace Advent2016\Day9;

class Puzzle9
{


    /**
     * Explode $input into array ($individual)
     *
     * Then create two arrays from $individual.  
     * One with each string as a single value in array ($arrayOriginal)
     * The second with the string split into single character value array ($arrayOriginal)
     *
     * All white space is removed from array.
     */
    function inputArray($input) {
        $individual = explode("\n", $input);
        $arraySplit = [];
        $arrayOriginal = [];
        foreach ($individual as $line) {
            $arrayOriginal[] = $line;
            $arraySplit[] = str_split(trim($line));
        }
        
        return array($arrayOriginal, $arraySplit);
    }
    
    /**
     * 
     */
    
    function extractMarker($input) {
    
            $start = $this->inputArray($input);
            $original = $start[0];
            $separate = $start[1];
            $new = [];
            $finalcount = [];
            
            foreach ($original as $value){
                $new[] = preg_split('/\(|\)/', $value);   // Separate out markers (XxY) from rest of string in array
            }
            
            /**
             * In each array, get values of $x (first integer) and $y (second integer)
             *
             * Get position of string to be repeated ($repvalue) and repeate it $y times ($insert)
             *
             * Set new value to be inserted into $original array ($updated)
             *
             * 
             */
            
            foreach($new as $key => $value){             
                $string = $value[1];
                preg_match_all('/([\d]+)/', $string, $nums);
                $x = $nums[0][0];
                $y = $nums[0][1];
                $mark = "(" . $x . "x" . $y .")";
                
                $position = strpos($original[$key], $y);
                if ($x == $y) {                                       // If $x and $y are same value, get actual position of $y by adding 2;
                    $position = $position + 2;
                }
                $reposition = $position + 2;
                $repvalue = substr($original[$key], $reposition, $x);
                $insert = str_repeat($repvalue, $y);
                
                $updated = str_replace($repvalue, $insert, $original[$key]);
                $upfinal= str_replace($mark, "", $updated);
                
                $finalcount[] = $nums;
                
            }
            
            return $finalcount;
        
    }

}