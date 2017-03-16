<?php

namespace Advent2016\Tests\Day;

use Advent2016\Day8\Puzzle8;

class Day8Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day8\\Puzzle8', new Puzzle8());
    }
    
    public function testcheckInput() {
    
    $input = array(0 => array(1,2,0,0,0), 1 => array(1,2,0,0,0), 2 => array(0,0,0,0,0));
    $x = 2;
    $y = 1;
    $puzzle = new Puzzle8();
    $result = $puzzle->matrixColumn($x, $y, $input);

        
          print_r($result);
    }
    

    
    
}