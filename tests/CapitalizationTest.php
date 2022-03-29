<?php

require_once 'Excercises/Capitalization.php';

class CapitalizationTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testIfCapitalizationFunctionCapitalizesTheFirstLetterOfEveryWordInASentence()
    {
        $this->assertEquals( capitalization( 'hi there, how is it going?' ), 'Hi There, How Is It Going?' );
    }

    /**@test */
    public function testIfCapitalizationMethodCapitalizesTheFirstLetter ()
    {
        $this->assertEquals( capitalization( 'i love breakfast at bill miller bbq' ), 'I Love Breakfast At Bill Miller Bbq' );
    }
}