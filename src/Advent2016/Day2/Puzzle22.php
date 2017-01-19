<?php

namespace Advent2016\Day2;

class Puzzle22

{
    /* Defines weird keypad and coordinates used in story problem */
    
static $weirdkeypad = [
        1 => [2,2],
        2 => [1,1],
        3 => [2,1],
        4 => [3,1],
        5 => [0,0],
        6 => [1,0],
        7 => [2,0],
        8 => [3,0],
        9 => [4,0],
        "A" => [1,-1],
        "B" => [2, -1],
        "C" => [3, -1],
        "D" => [2, -2]
    ];

    /** out of bounds on key pad
     * @var array
    */


     /**
     * Convert U/L/R/D's into [X,Y] steps to get there.
     *
     * @param string $input ULRD's
     * @return array(X,Y)[]
     */
    public function getNavigation($input)
    {
        $instructions = str_split($input);
        $navigation = [];
        foreach ($instructions as $i) {
            switch ($i) {
                case 'U':
                    $navigation[] = [0,1];
                    break;
                case 'L':
                    $navigation[] = [-1,0];
                    break;
                case 'R':
                    $navigation[] = [1,0];
                    break;
                case 'D':
                    $navigation[] = [0,-1];
                    break;
            }
        }
        return $navigation;
    }
    /**
     * Given list of +/- [X,Y] coordinates, and a starting coordinate, derive a
     * list of visited [X,Y] coordinates. Output includes origin.
     *
     * Input: [ [0,1], [0,1], [1,0], [1,0], [-1,0] ]
     * Output: [ [0,0], [0,1], [0,2], [1,2], [2,2], [1,2] ]
     *
     * @param array $navigation
     * @param array(X,Y) $origin X,Y coordinate to start from
     * @return array(X,Y)[]
     */
    public function compactHistory(array $navigation, array $origin)
    {
        $history = [
            $origin,
        ];
        $visited = array_reduce($navigation, function (array $allHistory, array $step) {
            list($x, $y) = $step;
            $last = end($allHistory);
            $newX = $last[0] + $x;
            $newY = $last[1] + $y;
    /** Allowed keys in array
     * @var array
    */
            $allowedkey = [
       [2,2],
       [1,1],
       [2,1],
       [3,1],
       [0,0],
       [1,0],
       [2,0],
       [3,0],
       [4,0],
       [1,-1],
       [2,-1],
       [3,-1],
       [2,-2]
    ];
        
            $test = array($newX, $newY);
            if (in_array($test, $allowedkey)) {
             $allHistory[] = [$newX, $newY];
            }
            
            return $allHistory;
        }, $history);
        return $visited;
    }
    /**
     * Given list of visited X,Y coordinates within the keypad, return the
     * X,Y coordinates of the last visited coordinate.
     *
     * @param array(X,Y)[] $filteredHistory
     * @return array(X,Y) Coordinate of keypad where last visited
     */
    public function getLastKeypadCoordinate(array $filteredHistory)
    {
        return array_pop($filteredHistory);
    }
    /**
     * Given an X,Y coordinate, find the cooresponding keypad number.
     *
     * @param array(X,Y) $coordinate
     * @return int
     */
    public function getKeypadNumber(array $coordinate)
    {
        return array_search($coordinate, self::$weirdkeypad);
    }
    /**
     * Given a keypad number, find its [X,Y] coordinate.
     *
     * @param int $number
     * @return int
     */
    public function getKeypadCoordinate($number)
    {
        return self::$weirdkeypad[$number];
    }
    /**
     * Given list of Up-Right-Down-Left directions, find the resulting keypad.
     * Optionally accepts an origin [X,Y] coordinate to start navigating from.
     *
     * @param string[]   $sequence URDL's
     * @param array(X,Y) $origin
     * @return int
     */
    public function getNumberBySequence($sequence, array $origin = [0,0])
    {
        $navigation = $this->getNavigation($sequence);
        $history = $this->compactHistory($navigation, $origin);
        $coordinate = $this->getLastKeypadCoordinate($history);
        return $this->getKeypadNumber($coordinate);
    }

}