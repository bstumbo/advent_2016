<?php

namespace Advent2016\Day8;

class Puzzle8
{
    
    function inputArray ($input) {
        
        /**
         * Coming Soon
         **/
    
        return $input;
    }
    
        /**
         * Set values of $matrix to 1 based on $x, $y input
         *
         * Example: $x=3 and $y=2 will set first 3 values of $matrix[0] and $matrix [1]
         * to a value of 1.
         **/
    
    function matrixRect($x, $y, $matrix) {
        
        for ($col = 0; $col < $y; $col++) {
            $row = 0;
            while ($row < $x){
                $matrix[$col][$row] = 1;
                $row++;
            }
        }
        
        return $matrix;
    }
    
    
        /**
         * Shift values in specified row ($matrix[$y]) a specified number of spaces ($x) 
         **/
    
    function matrixRow($x, $y, $matrix) {
        $max = 4;                                       //grid limit || Starts $count over at 0
        $original = $matrix[$y];                        //Keep track of original $matrix values
        for ($row = 0; $row < $x; $row++){              //Move values $x number of times
            $count = 0;
            foreach ($original as $key => $value) {     //Iterate over original array to move values
                $count++;
                if ($count > $max) {
                    $count = 0;
                }
                $matrix[$y][$count] = $value;
            }
            
            $original = $matrix[$y];                    //Set $original to new $matrix values
        }
        
        return $matrix;
    }
    
    function matrixColumn ($x, $y, $matrix) {
        $max = 2;
        $original = $matrix;
        for ($shift = 0; $shift < $y; $shift++){              
            $count = 0;
            foreach ($original as $key => $value) {     
                $count++;
                if ($count > $max) {
                    $count = 0;
                }
                $matrix[$count][$x] = $value;
            }
            
            $original = $matrix;                    
        }
        
        return $matrix;
        
        
    }
    
    function countPixels($input) {
        
        $width = 50;
        $height = 6;
        $x = 3;
        $y = 2;
        $matrix = array_fill(0, $height, array_fill(0, $width, 0));
        
        $answer = $this->matrixRect($x, $y, $matrix);
        
       return $answer;
        
    }

}