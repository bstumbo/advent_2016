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
     *
     * Bots that take values to "outboxes" are recognized with negative integers
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
                    
                    if (strpos($value, ('output ' . $low)) !== false) {
                        $low = $low * -1;
                    }
                    
                     if (strpos($value, ('output ' . $high)) !== false) {
                        $high = $high * -1;
                    }
                    
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
        ksort($botdirlookup);
        
        return $botdirlookup;
        
    }
    
    
    /*
     * Creates array of where values start
     */
    
    function buildBotProcessArray($valdir) {
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
    
    /*
     *  Builds $values array to keep track of what values make it to outboxes
     */
    
    function buildValuesArray($valdir) {
        $values = [];
        
        foreach ($valdir as $val) {
            $values[] = $val[1];
        }
        
        return $values;
    }
    
    
    /*
     * Compare values to determine which is high and which is low
     *
     * Returns array with $high at [0] and $low at [1]
     */
    
    function compareValues($values) {
        if ($values[0] > $values[1]){
                $high = $values[0];
                $low = $values[1];
            } else {
                $high = $values[1];
                $low = $values[0];
            }
            
        $highlow = array($high, $low);    
    
    return $highlow;
    
    }
    
    /*
     * Remove values from the value array
     */
    
    function removeValueFromArray ($value, array $valuesarray) {
        $key = array_search($value, $valuesarray);
        unset($valuesarray[$key]);
        
        return $valuesarray;
    }
    
  /*  Figure out which bot currently has two values
        Obtain those two values from array
        Compare two values to figure out which is high and which is low
        Look up instructions by bot number
        Update processarray with updated numbers
        Record movement in a separate array
        If value goes to outbox, remove it from values array
        Repeat this process until $valuesarray is empty */

    
    function buildProcessTracking($processarray, $botdirlookup, $valuesarray, $srchval1, $srchval2) {
    
    $recordsteps = [];
    
    while (in_array($srchval1, $valuesarray) && in_array($srchval1, $valuesarray)) {
    //for($k = 0; $k < 200; $k++){    
            
            $processlength = count(array_values($processarray));
        
         
         for ($i = 0; $i < $processlength; $i++) {
            if (count(array_values($processarray[$i])) >= 2) {
                $key = array_keys($processarray, $processarray[$i]);
                $value = $processarray[$i];
                
                $recordsteps[] = array($key, $value);
          
         
         /*
          * Get high and low values sorted
         */
         $highlow = $this->compareValues($value);
         
         $lowvalue = $highlow[1];
         $highvalue = $highlow[0];
         
         /* Lookup bot diections in the $botdirlookup array with
          * key value of $key.  $key = bot #
          */
         
        $instrct = $botdirlookup[$key[0]];
         
         /*
          * Assign low and high bot #'s
          */
         
         $lowbot = $instrct[0];
         $highbot = $instrct[1];
         
         // $test[] = array($lowbot, $highbot);
         /*
          * If $lowbot is a negative number, remove it from the $valuesarray;
          * Otherwise, move it to the appropriate bot in the $processarray;
          */
         
         
         if (abs($lowbot) != $lowbot) {
           $valuesarray = $this->removeValueFromArray($lowvalue, $valuesarray);
         } else {
            
            $processarray[$lowbot][] = $lowvalue;
         
         }
         
         /*
          * If $highbot is a negative number, remove it from the $valuesarray;
          * Otherwise, move it to the appropriate bot in the $processarray;
          */
         
         if (abs($highbot) != $highbot) {
          $valuesarray = $this->removeValueFromArray($highbot, $valuesarray);
         } else {
            
            $processarray[$highbot][] = $highvalue;
         
         }
         
         /*
          * Remove old values from $processarray
          */
         
         $processarray[$key[0]] = array();
         
           }
         } 
         
         }
     
     return $recordsteps;
           
    }
    
    /*
     * Query the $recordedsteps array to determine
     * which bot meets search terms
     */
    
    function queryRecordedArray($recordedsteps, $srchval1, $srchval2) {
        
        foreach($recordedsteps as $key => $value) {
            if ($value[1] == array($srchval1, $srchval2) || $value[1] == array($srchval2, $srchval1)) {
            $answer = $value[0];
            }    
        }
        
        return $answer;  
    }
    
    
    
    
    
    function searchBots($input, array $search) {
        $srchval1 = $search[0];
        $srchval2 = $search[1];
        $separated = $this->iterateStringToArray($input);
        $instrctarray = $this->separateBotValues($separated);
        $botdir = $instrctarray[0];
        $valdir = $instrctarray[1];
        $botdirlookup = $this->buildBotDirectionsArray($botdir);
        $valuesarray = $this->buildValuesArray($valdir);
        $process = $this->buildBotProcessArray($valdir);
        $recordedsteps = $this->buildProcessTracking($process, $botdirlookup, $valuesarray, $srchval1, $srchval2);
        $answer = $this->queryRecordedArray($recordedsteps, $srchval1, $srchval2);
        
        return $answer;
    }
    
    
}