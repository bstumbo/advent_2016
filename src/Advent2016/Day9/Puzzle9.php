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
            $arrayOriginal[] = preg_replace('/\s+/', '', $line);
            $arraySplit[] = str_split(preg_replace('/\s+/', '',$line));
        }
        
        return array($arrayOriginal, $arraySplit);
    }
    
    /**
     * Separate out markers (XxY) from rest of string in array
     *
     * To be used to count number of characters needed and them multiple them
     */
    
    function separateXY($original) {
        //$string = $original[0];
        preg_match_all('/([\d]+)/', $original, $preg);
        $markarray = array_chunk($preg[0], 2);
            
        return $markarray;
    
    }
    
    /**
    * In each array, get values of $x (first integer) and $y (second integer)
    *
    * Get position of string to be repeated ($repvalue) and repeat it $y times ($insert)
    *
    * Set new value to be inserted into $original array ($updated)
    *
    * 
    */
    
    function createNewString ($markarray, $original, $index){
        
        $repcount = 0;
        $i = 0;
        $buildstring = [];
        $newmark = [];
        
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
                 * Get updated $orginal array string.  Then update the actual array
                 */
                
                $buildstring[] = $insert;
                $newmark[] = "(" . $x . "x" . $y . ")";
                
                $upfinal = substr_replace($original[$index], '', $positionstart, $endposition);
                
                $original = array($upfinal);
                
                            
            }
            
        return array($newmark, $buildstring);
    }
     
    function buildFinalString($finalarray, $original) {
        //$original = $original[0];
        $marks = $finalarray[0];
        $strings = $finalarray[1];
        
        foreach ($marks as $index => $string) {
            $place = strpos($original, $string);
            $xvalue = substr($string, 1, 1);
            $count = strlen($string) + intval($xvalue);
            $original = substr_replace($original, $strings[$index], $place, $count);
        }
        
        return $original;
    }
    
    function extractMarker($input) {
        
            $finalstring = [];
    
            $start = $this->inputArray($input);
            $original = $start[0];
            
            foreach ($original as $index => $string){
                    
                    //Separate XxY to figure out what charaters need to be duplicated
                    
                    $markarray = $this->separateXY($string);
                    
                    //Create new string following XxY guidelines
                    
                    $finalarray = $this->createNewString($markarray, $original, $index);
                    
                    $finalstring[] = $this->buildFinalString($finalarray, $string);    
        
            } 
        
        return $finalstring;
    
    }
    
    function decompressedLength($input) {
        $finalstring = $this->extractMarker($input);
        $answer = [];
        foreach ($finalstring as $final) {
            $strippedfinal = preg_replace('/\s+/', '', $final); 
            $answer[] = strlen($strippedfinal);
        }
        
        $decompressed = array_sum($answer);
        
    
        return $finalstring;
    }


}