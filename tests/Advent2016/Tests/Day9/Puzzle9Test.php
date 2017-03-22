<?php

namespace Advent2016\Tests\Day9;

use Advent2016\Day8\Puzzle9;

class Day8Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day9\\Puzzle9', new Puzzle9());
    }


}