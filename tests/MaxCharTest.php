<?php

require_once 'Excercises/maxChar.php';


class MaxCharTest extends \PHPUnit\Framework\TestCase 
{
    /**@test */
    public function testTheMostFrequentlyUsedChar ()
    {
        $this->assertEquals( maxChar( 'a' ), 'a' );

        $this->assertEquals( maxChar( 'abcdefghijklmnaaaaa' ), 'a' );
    }

    /**@test */
    public function testIfMaxCharFunctionWorksWithNumbersInString ()
    {
        $this->assertEquals( maxChar( 'ab1c1d1e1f1g1' ), '1' );
    }
}