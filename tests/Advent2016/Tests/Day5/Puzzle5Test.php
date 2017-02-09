<?php

namespace Advent2016\Tests\Day5;

use Advent2016\Day5\Puzzle5;

class Day5Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day5\\Puzzle5', new Puzzle5());
    }
    
    public function testHash() {
        $input = 'abbhdwsy';
        $puzzle = new Puzzle5();
        $result = $puzzle->hashInput2($input);
        
         print_r($result);
    }
}