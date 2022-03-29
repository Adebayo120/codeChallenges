<?php

require_once 'Excercises/vowels.php';

class VowelsTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testIfVowelsFuntionReturnsTheNumberOfVowelsUsedInAString ()
    {
        $this->assertEquals( vowels( 'aeiou' ), 5 );

        $this->assertEquals( vowels( 'abcdefghijklmnopqrstuvwxyz' ), 5 );

        $this->assertEquals( vowels( 'bcdfghjkl' ), 0 );
    }
}