<?php

namespace Advent2016\Tests\Day2;

use Advent2016\Day2\Puzzle22;

class Day2part2Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day2\\Puzzle22', new Puzzle22());
    }
    
   public function testGetNumberBySequence()
    {
        $puzzle = new Puzzle22();
        
        // From previous origin
        $this->assertSame(5, $puzzle->getNumberBySequence('ULL'));
        $this->assertSame('D', $puzzle->getNumberBySequence('RRDDD', [0,0]));
        $this->assertSame('B', $puzzle->getNumberBySequence('LURDL', [2,-2]));
        $this->assertSame(3, $puzzle->getNumberBySequence('UUUUD', [2,-1]));
    } 
}
