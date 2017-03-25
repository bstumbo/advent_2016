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
            $check = $start[0];   //Keep original array strings in tact; To be used as check later;
            $new = [];
            $finalcount = [];
            
            foreach ($original as $index => $string){
              //  $new[] = preg_split('/\(|\)/', $value); // Separate out markers (XxY) from rest of string in array
             $flag = 0; 
             preg_match_all('/([\d]+)/', $string, $preg);
             $markarray = array_chunk($preg[0], 2);
             
             
            /**
             * In each array, get values of $x (first integer) and $y (second integer)
             *
             * Get position of string to be repeated ($repvalue) and repeate it $y times ($insert)
             *
             * Set new value to be inserted into $original array ($updated)
             *
             * 
             */
            
            $repcount = 0;
            $i = 0;
            
          foreach($markarray as $key => $value){
                  if ($i < $repcount){
                         $i++;
                         continue;
                   } 
    
                $x = $value[0];
                $y = $value[1];
                
                $positionstart = strpos($original[$index], "(");
                $position = strpos($original[$index], ")");
                $reposition = $position + 1;
                $repvalue = substr($original[$index], $reposition, $x);
                $insert = str_repeat($repvalue, $y);
                $endposition = $x + 5;
                
                /**
                 * Figure out if next iteration should be skipped.
                 *
                 * If this mark includes the next mark, that mark should be skipped in the iteration.
                 */
 
                $repcount = substr_count($repvalue, '(');    //Counting the number of "fake" marks in the repeating string
                $i = 0;
                /*
                 * Get updated $orginal array string.  Then up date the actual array
                 */
                $upfinal= substr_replace($original[$index], $insert, $positionstart, $endposition);
                
                $new[] = $insert;
               
   
               // $original[$index] = $upfinal;
            
            } 
            $finalstring = '';
            foreach ($new as $key => $final) {
                $finalstring .= $final;
            }
            
            return $new;
        
      }
    
    }

}