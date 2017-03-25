<?php

namespace Advent2016\Tests\Day9;

use Advent2016\Day9\Puzzle9;

class Day8Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day9\\Puzzle9', new Puzzle9());
    }
    
    
    public function testcheckInput() {
     
    $input = '(6x1)(1x3)ABD(2x3)AB';
    
    $puzzle = new Puzzle9();
    $result = $puzzle->extractMarker($input);
    
     print_r($result);
    }


}