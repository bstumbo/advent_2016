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
     
    
    $input = '(6x1)(1x3)ABC(2x3)(1x3)A(1x5)BC';

    
    $puzzle = new Puzzle9();
    $result = $puzzle->decompressedLength($input);
    
     print_r($result);
    }


}