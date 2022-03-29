<?php

require_once 'Excercises/fib.php';

class FibTest extends \PHPUnit\Framework\TestCase 
{
    /**@test */
    public function testIfFibFunctionReturnsCorrectValue ()
    {
        $this->assertEquals( fib( 1 ), 1 );
        
        $this->assertEquals( fib( 2 ), 1 );

        $this->assertEquals( fib( 3 ), 2 );

        $this->assertEquals( fib( 4 ), 3 );

        $this->assertEquals( fib( 39 ), 63245986 );
    }
}