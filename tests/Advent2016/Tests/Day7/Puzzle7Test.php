<?php

namespace Advent2016\Tests\Day;

use Advent2016\Day7\Puzzle7;

class Day6Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day7\\Puzzle7', new Puzzle7());
    }
    
    public function testInputArray() {
    $input = 'abcd[bddb]xyyx';
    $puzzle = new Puzzle7();
    $result = $puzzle->checkABBA($input);
        
         print_r($result);
    }
    
}