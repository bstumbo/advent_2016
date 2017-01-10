<?php

namespace Advent2016\Tests\Day1;

use Advent2016\Day1\Puzzle1;

class Puzzle1Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day1\\Puzzle1', new Puzzle1());
    }

    public function testFirstPart()
    {
        $input = 'R2, L3';

        $puzzle = new Puzzle1();
    
     //   $this->assertSame(5, $puzzle->getBlocksAway($input));
    }

   public function testSecondPart()
    {
        $input = 'R2, R2, R2';

        $puzzle = new Puzzle1();

        $this->assertSame(2, $puzzle->getBlocksAway($input));
    }

    public function testThirdPart()
    {
        $input = 'R5, L5, R5, R3';

        $puzzle = new Puzzle1();

        $puzzle->getBlocksAway($input);
        
        $this->assertSame(12, $puzzle->getBlocksAway($input));
    }
    
    

    public function testTheAnswer()
    {
        $input = 'R4, R3, R5, L3, L5, R2, L2, R5, L2, R5, R5, R5, R1, R3, L2, L2, L1, R5, L3, R1, L2, R1, L3, L5, L1, R3, L4, R2, R4, L3, L1, R4, L4, R3, L5, L3, R188, R4, L1, R48, L5, R4, R71, R3, L2, R188, L3, R2, L3, R3, L5, L1, R1, L2, L4, L2, R5, L3, R3, R3, R4, L3, L4, R5, L4, L4, R3, R4, L4, R1, L3, L1, L1, R4, R1, L4, R1, L1, L3, R2, L2, R2, L1, R5, R3, R4, L5, R2, R5, L5, R1, R2, L1, L3, R3, R1, R3, L4, R4, L4, L1, R1, L2, L2, L4, R1, L3, R4, L2, R3, L1, L5, R4, R5, R2, R5, R1, R5, R1, R3, L3, L2, L2, L5, R2, L2, R5, R5, L2, R3, L5, R5, L2, R4, R2, L1, R3, L5, R3, R2, R5, L1, R3, L2, R2, R1';

        $puzzle = new Puzzle1();
        
        $final_loc = $puzzle->getBlocksAway($input);
        
        print_r ($final_loc);

       // $this->assertSame(1, $puzzle->getBlocksAway($input));
    } 
}
