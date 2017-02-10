<?php

namespace Advent2016\Day6;

class Puzzle6

{
    public function repeatCode($input) {
        $chunkarray = [];
        $columnarray = [];
        $answer = [];
        $inputarray = explode(PHP_EOL, $input); //explode $input into array
    
        foreach ($inputarray as $key => $value){ //split each line into new array and remove blanks
            $split = str_split($value);
            $filtered = array_filter($split, function ($value1) {return $value1 !== '';});
            $chunkarray[] = $filtered;
        }
        
        $counter = 0;
        while ($counter < 8) { //Create another array from columns of previous array
            $column = array_column($chunkarray, $counter);
            $columnarray[] = $column;
            $counter++; //Add 1 to counter
        }
        
        foreach ($columnarray as $column) { //Count values in final array and add highest number to answer array
            $count = array_count_values($column);
            asort($count);
            end($count);
            $answer[] = key($count);
        }
        
        return $answer ;
    }
    
    public function repeatCode2($input) {
        $chunkarray = [];
        $columnarray = [];
        $answer = [];
        $inputarray = explode(PHP_EOL, $input); //explode $input into array
    
        foreach ($inputarray as $key => $value){ //split each line into new array and remove blanks
            $split = str_split($value);
            $filtered = array_filter($split, function ($value1) {return $value1 !== '';});
            $chunkarray[] = $filtered;
        }
        
        $counter = 0;
        while ($counter < 8) { //Create another array from columns of previous array
            $column = array_column($chunkarray, $counter);
            $columnarray[] = $column;
            $counter++; //Add 1 to counter
        }
        
        foreach ($columnarray as $column) { //Count values in final array and add highest number to answer array
            $count = array_count_values($column);
            arsort($count);
            end($count);
            $answer[] = key($count);
        }
        
        return $answer ;
    }

}