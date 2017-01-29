<?php

namespace Advent2016\Tests\Day4;

use Advent2016\Day4\Puzzle4;

class Day4Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day4\\Puzzle4', new Puzzle4());
    }
    
    /* public function testPuzzle4() {
        $input = 'aaaaa-bbb-z-y-x-123[abxyz]
        a-b-c-d-e-f-g-h-987[abcde]
        not-a-real-room-404[oarel]
        totally-real-room-200[decoy]';
        
        $puzzle = new Puzzle4();
        
        $result = $puzzle->checkSum($input);
        
        print_r($result);
        } */
    
    public function testcheckSum() {
        $input = 'not-a-real-room-404[oarel]
';

//ugjjgkanw-wyy-kzahhafy-736[clxvm] Good test
        $puzzle = new Puzzle4();
        $result = $puzzle->checkSum($input);
        
        print_r($result);
    }
}
 