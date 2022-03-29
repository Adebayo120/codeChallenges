<?php

require_once 'Excercises/Anagrams.php';

class AnagramsTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testAnagram ()
    {
        $this->assertTrue( anagrams('hello', 'llohe') );

        $this->assertTrue( anagrams('Whoa! Hi!', 'Hi! Whoa!') );

        $this->assertFalse( anagrams('One One', 'Two two two') );

        $this->assertFalse( anagrams('One one', 'One one c') );

        $this->assertFalse( anagrams('A tree, a life, a bench', 'A tree, a fence, a yard') );
    }
}