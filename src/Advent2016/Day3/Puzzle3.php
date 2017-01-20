<?php

namespace Advent2016\Day3;

class Puzzle3

{
    /**
     * Explode string into array
     * Filter array to excluded blank spaces
     * Group number in chunks of 3
     */
    public function TransformInput ($input) {
        $inputarray = [];
        $inputarray = explode(" ", $input);
        $filtered = array_filter($inputarray, function ($value) {return $value !== '';}); 
        $chunked = array_chunk($filtered, 3);
        
         return $chunked;
    
        }
        
        /**
         * For each group of three check to see if additiona of any two sides is less than third side
         * Count all triangles that have appropriate side measurements and return answer
         */
    
    public function TrueTriangle($input) {
        
        $chunked = $this->TransformInput($input);
        $triangles = 0;
        $nope = 0;
    
        foreach ($chunked as $i) {
            $a = $i[0];
            $b = $i[1];
            $c = $i[2];
           
           if ( $a + $b <= $c || $a + $c <= $b ||  $b + $c <= $a) {
                    ++$nope;
           } else {
            
            ++$triangles;
        
           }
        }
         return $triangles;
    }
    
}