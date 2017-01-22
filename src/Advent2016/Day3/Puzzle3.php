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
         * Transforming string to array for part 2 of question
         * After filtering and chunking, must create new arrays from the three array "columns"
         * Re-chunk columns into groups of three to process data vertically
         */
        
        public function TransformInput2 ($input) {
            $inputarray = [];
            $inputarray = explode(" ", $input);
            $filtered = array_filter($inputarray, function ($value) {return $value !== '';});
            $chunked = array_chunk($filtered, 3);
            $columnone = array_column($chunked, 0);
            $columntwo = array_column($chunked, 1);
            $columnthree = array_column($chunked, 2);
            
            $group1 = array_chunk($columnone, 3);
            $group2 = array_chunk ($columntwo, 3);
            $group3 = array_chunk($columnthree, 3);
            
            $finalarray = array($group1, $group2, $group3);
            
            
            return $finalarray;
        
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
    
    /**
         * Finding true triangles for question part 2
         * Same concept, but have to loop through extra array layer
         */
    public function TrueTriangle2($input) {
        
        $chunked = $this->TransformInput2($input);
        $triangles = 0;
        $nope = 0;
    
    foreach ($chunked as $e){
        $chunk = $e;  
        foreach ($chunk as $i) {
            $a = $i[0];
            $b = $i[1];
            $c = $i[2];
           
           if ( $a + $b <= $c || $a + $c <= $b ||  $b + $c <= $a) {
                    ++$nope;
           } else {
            
            ++$triangles;
        
           }
        }
         
    }
    
    return $triangles;
}
    
}