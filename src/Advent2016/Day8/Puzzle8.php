<?php

namespace Advent2016\Day8;

class Puzzle8
{
    
    function inputArray ($input) {
        
        $directions = [];
        
        $individual = explode("\n", $input); //Break input into individual lines in array
        foreach ($individual as $line) {
            $first = explode(' ', trim($line));
            $word = $first[0];
            switch ($word) {
               case 'rect':
                preg_match_all('!\d+!', $line, $numbers);
                $x = $numbers[0][0];
                $y = $numbers[0][1];
                $directions[] = array($word, $x, $y);
                break;
               
               case 'rotate':
               $second = $first[1];
               
               if ($second == 'row') {
                preg_match_all('!\d+!', $line, $numbers);
                $x = $numbers[0][0];
                $y = $numbers[0][1];
                $twoword = $word . ' ' . $second;
                $directions[] = array($twoword, $y, $x);
               }
               
               if ($second == 'column') {
                preg_match_all('!\d+!', $line, $numbers);
                $x = $numbers[0][0];
                $y = $numbers[0][1];
                $twoword = $word . ' ' .  $second;
                $directions[] = array($twoword, $x, $y);
               }
               
               break;
             
            }
        }
        
    
        return $directions;
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
        $max = 49;                                       //grid limit || Starts $count over at 0
        $original = $matrix[$y];                        //Keep track of original $matrix values
        for ($row = 0; $row < $x; $row++){              //Move values $x number of times
            $count = 0;
            foreach ($original as $key => $value) {     //Iterate over original array to move values
                $count++;
                if ($count > $max) {
                    $count = 0;
                }
                $matrix[$y][$count] = $value;           //Set the next value in the array
            }
            
            $original = $matrix[$y];                    //Set $original to new $matrix values
        }
        
        return $matrix;
    }
    
        /**
         * Shift values in specified column ($matrix[$x]) a specified number of spaces ($y)
         **/
    
    function matrixColumn ($x, $y, $matrix) {
        $max = 5;                                        //grid limit || Starts $count over at 0
        $original = $matrix;                             //Keep track of original $matrix values
        for ($shift = 0; $shift < $y; $shift++){         //Move values $y number of times   
            $count = 0;
            foreach ($original as $value) {              //Iterate over original array to move values (in columns, not rows)
                $count++;
                 if ($count > $max) {
                    $count = 0;
                }
                $matrix[$count][$x] = $value[$x];       //Set the next value in the *next* array (one row down)
                }
                
            $original = $matrix;                        //Set $original to new $matrix values                                                                     
        }
        
        return $matrix;
            
    }
    
    /**
     * Setup grid $matrix array (50x6)
     *
     * PUt directions into iterable array ($dir)
     *
     * Iterate over new array.  If case 'rect', use matrixRect(); If case 'rotate row', use matrixRow();
     * If case 'rotate column' use matrixColumn();
     *
     * Finally, iterate over the final $matrix array, count the number of "1" values;
     **/
    
    function countPixels($input) {
        $width = 50;
        $height = 6;
        $matrix = array_fill(0, $height, array_fill(0, $width, 0));
        
        $dir = $this->inputArray($input);
        
        foreach ($dir as $first) {
                switch ($first[0]) {
                    case 'rect':
                        $x = $first[1];
                        $y = $first[2];
                        $matrix = $this->matrixRect($x, $y, $matrix);
                        break;
                    case 'rotate row':
                        $x = $first[1];
                        $y = $first[2];
                        $matrix = $this->matrixRow($x, $y, $matrix);
                        break;
                    case 'rotate column':
                        $x = $first[1];
                        $y = $first[2];
                        $matrix = $this->matrixColumn($x, $y, $matrix);
                        break;
                }
        }
        
        $count = 0;
        
        foreach ($matrix as $first){
            foreach ($first as $second){
                if ($second =='1'){
                    $count++;
                }
            }
        }
        
       return $count;
        
    }

}