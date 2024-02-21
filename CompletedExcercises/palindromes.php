<?php

// --- Directions
// Given a string, return true if the string is a palindrome
// or false if it is not.  Palindromes are strings that
// form the same word if it is reversed. *Do* include spaces
// and punctuation in determining if the string is a palindrome.
// --- Examples:
//   palindrome("abba") === true
//   palindrome("abcdefg") === false

/**
 * reversestring
 *
 * @param string $str
 * @return boolean
 */
function palindromes ( string $str )
{
    $reversed = implode( array_reverse( str_split( $str ) ) );

    return $str === $reversed;
}

function palindromes ( string $str )
{
    $cleanedString = preg_replace("/[^a-zA-Z0-9]/", '', strtolower($str));
    
    return $cleanedString === strrev($cleanedString);
}

echo palindromes( 'php' );
