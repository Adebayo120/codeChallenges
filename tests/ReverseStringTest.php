<?php

require_once 'Excercises/reversestring.php';

class ReverseStringTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testIfReversestringReversesAString ()
    {
        $this->assertEquals( reversestring( 'abcd' ), 'dcba' );

        $this->assertEquals( reversestring( '  abcd' ), 'dcba  ' );
    }
}