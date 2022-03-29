<?php

require_once 'Excercises/palindromes.php';

class PalindromesTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testPalindromeFunctionUsingTruthyStrings()
    {
        $this->assertTrue( palindromes('aba') );

        $this->assertTrue( palindromes('1000000001') );

        $this->assertTrue( palindromes('pennep') );
    }

    /**@test */
    public function testPalindromeFunctionUsingFalsyStrings()
    {
        $this->assertFalse( palindromes(' aba') );

        $this->assertFalse( palindromes('aba ') );

        $this->assertFalse( palindromes('greetings') );

        $this->assertFalse( palindromes('Fish hsif') );
    }
}