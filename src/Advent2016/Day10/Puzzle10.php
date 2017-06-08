<?php

namespace Advent2016\Day10;

class Puzzle10
{
    
    
    /**
     * Iterate over string input and transform to array
     *
     *
     * Returns array containing two arrays, $botinstruction and
     */
    
    function iterateStringToArray($input) {
        $single =  explode("\n", $input);
        
        return $single;
    }
    
    /*
     * Iterate over newly formed array from iterateStringToArray()
     * and separate bot instructions ($botinstruction) for value instructions ($valueinstruction)
     * 
     * $botinstruction contians following values:
     * $botinstruction[$index][0] = Bot #
     * $botinstruction[$index][1] = Low number direction
     * $botinstruction[$index][2] = High number direction
     */
    
    function separateBotValues($separatedarray) {
        $botinstruction = [];
        $valueinstruction = [];
        
        foreach ($separatedarray as $index => $value) {
            $explodefirst = explode(' ', trim($value));
            $firstword = $explodefirst[0];
            
            switch ($firstword) {
                case 'bot':
                    preg_match_all('!\d+!', $value, $botnums);
                    $bot = $botnums[0][0];
                    $low = $botnums[0][1];
                    $high = $botnums[0][2];
                    $botinstruction[] = array($bot, $low, $high);
                    break;
                case 'value':
                    preg_match_all('!\d+!', $value, $valnums);
                    $bot = $valnums[0][1];
                    $value = $valnums[0][0];
                    $valueinstruction[] = array($bot, $value);
                    break;
            }
        }
        
         return array($botinstruction, $valueinstruction);
    }
    
    /*
     * Iterates over $botdir array and returns array ($botdirlookup)
     *
     * $botdirections index => Bot #
     * $botdirection[0]  => low directions
     * $botdirection[1]  => high directions
     */
    
    
    function buildBotDirectionsArray($botdir) {
        
        $index = [];
        $vals = [];

        foreach ($botdir as $dir){
            $botnumindex = $dir[0];
            $low = $dir[1];
            $high = $dir[2];
            $values = array($low, $high);
            $index[] = $botnumindex;
            $vals[]= $values;
        }
        
        $botdirlookup = array_combine($index, $vals);
        
        return $botdirlookup;
        
    }
    
    
    /*
     * Creates array of where values start
     */
    
    function buildBotProcessArray($botdirlookup, $valdir) {
        $empty =[];
        $botarray = array_fill(0,300, $empty);
        
        foreach ($valdir as $values) {
            $bot = $values[0];
            $value = $values[1];
            $array = array($botarray[$bot]);
            $botarray[$bot][] =  $value;
            
        }
        
        return $botarray;
        
    }
    
    function searchBots($input) {
        $separated = $this->iterateStringToArray($input);
        $instrctarray = $this->separateBotValues($separated);
        $botdir = $instrctarray[0];
        $valdir = $instrctarray[1];
        $botdirlookup = $this->buildBotDirectionsArray($botdir);
        $test = $this->buildBotProcessArray($botdirlookup, $valdir);
        
        return $test;
    }
    
    
}