<?php

namespace Advent2016\Day1;

class Puzzle1
{

    public function getBlocksAway($input)
    {
        $directions = ['N', 'E', 'S', 'W'];

        $currentDir = 0;
        $coordinatesNorth = 0;
        $coordinatesEast = 0;
        $coordinatesEastLast = 0;
        $coordinatesNorthLast = 0;
 
        $locations = [];

        foreach (explode(', ', $input) as $coordinate) {
            $dir = substr($coordinate, 0, 1);
            $length = intval(substr($coordinate, 1));

            if ($dir == 'R') {
                $currentDir++;
                $currentDir = $currentDir % 4;
            } else {
                if ($currentDir == 0)
                    $currentDir = 3;
                else
                    $currentDir--;
            }

            switch ($directions[$currentDir]) {
                case 'N':
                    $coordinatesNorth += $length;
                    $trigger = 3;
                    break;
                case 'E':
                    $coordinatesEast += $length;
                    $trigger = 5;
                    break;
                case 'S':
                    $coordinatesNorth -= $length;
                    $trigger = 3;
                    break;
                case 'W':
                    $coordinatesEast -= $length;
                    $trigger = 5;
                    break;
            }
            
            //Check to see if moving on X-axis, if true add all X-axis points to array.  Else add all covered Y-axis points to array
            // Then check to see if resulting point is already in array.  If it is, exit loop and get X & Y coordinate
            if ($trigger == 5){
                $X = range($coordinatesEastLast, $coordinatesEast);
                foreach (array_slice($X, 1) as $x){
                    $thisloc = array($x, $coordinatesNorth);
                    if (in_array($thisloc, $locations)) {
                        $coordinatesEast = $x;
                        $coordinatesNorth = $coordinatesNorth;
                        break 2;
                    } else {
                    $locations[] = array($x, $coordinatesNorth);
                    $coordinatesEastLast = $coordinatesEast;
                    }
                }
            } else {
                $Y = range($coordinatesNorthLast, $coordinatesNorth);
                foreach (array_slice($Y, 1) as $y){
                    $thisloc = array($coordinatesEast, $y);
                    
                    if (in_array($thisloc, $locations)) {
                        $coordinatesEast = $coordinatesEast;
                        $coordinatesNorth = $y;
                        break 2;
                    } else{
                    $locations[] = array($coordinatesEast, $y);
                    $coordinatesNorthLast = $coordinatesNorth;
                    }
                }
            } 
        }
     //return $thisloc;
    //  return $locations;
    return abs($coordinatesNorth) + abs($coordinatesEast);
  // $final_array = array($coordinatesEast, $coordinatesNorth);
//   return $final_array;
    }
}
