<?php

require_once 'Excercises/reverseint.php';

class ReverseIntTest extends \PHPUnit\Framework\TestCase
{

    /**@test */
    public function testIfReverseIntHandles0AsAnInput ()
    {
        $this->assertEquals( reverseint( 0 ), 0 );
    }

    /**@test */
    public function testIfReverseIntFlipAPositiveNumber ()
    {
        $this->assertEquals( reverseint( 5 ), 5 );

        $this->assertEquals( reverseint( 15 ), 51 );

        $this->assertEquals( reverseint( 90 ), 9 );

        $this->assertEquals( reverseint( 2359 ), 9532 );
    }

    /**@test */
    public function testIfReverseIntFlipANegativeNumber ()
    {
        $this->assertEquals( reverseint( -5 ), -5 );

        $this->assertEquals( reverseint( -15 ), -51 );

        $this->assertEquals( reverseint( -90 ), -9 );

        $this->assertEquals( reverseint( -2359 ), -9532 );
    }
}