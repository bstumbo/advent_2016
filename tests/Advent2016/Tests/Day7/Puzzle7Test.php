<?php

namespace Advent2016\Tests\Day;

use Advent2016\Day7\Puzzle7;

class Day7Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day7\\Puzzle7', new Puzzle7());
    }
    
    public function testcheckABBA() {
    $input = 'xdsqxnovprgovwzkus[fmadbfsbqwzzrzrgdg]aeqornszgvbizdm';
    $puzzle = new Puzzle7();
    $result = $puzzle->checkABBA($input);
        
         print_r($result);
    }
    

    
    
}