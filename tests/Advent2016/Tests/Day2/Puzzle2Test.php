<?php

namespace Advent2016\Tests\Day2;

use Advent2016\Day2\Puzzle2;

class Puzzle12Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day2\\Puzzle2', new Puzzle2());
    }
    
    public function testOne()
    {
        $input = 'ULL
RRDDD
LURDL
UUUUD';

        $puzzle = new Puzzle2();
        
        $numbers = $puzzle->FindRoom($input);
        
        print_r($numbers);
    
    }

}