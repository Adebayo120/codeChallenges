<?php

// --- Directions
// Given a string, return the character that is most
// commonly used in the string.
// --- Examples
// maxChar("abcccccccd") === "c"
// maxChar("apple 1231111") === "1"

/**
 * maxChar
 *
 * @param string $str
 * @return string
 */
function maxChar ( string $str )
{
    $stringInArray = str_split( $str );

    $charMap = [];

    $max = 0;

    $maxChar = '';

    foreach ( $stringInArray as $key => $char ) 
    {
        $charMap[ $char ] = isset( $charMap[ $char ] ) ? $charMap[ $char ] + 1 : 1;
    }

    foreach ( $charMap as $char => $charCount ) 
    {
        if ( $charCount > $max )
        {
            $max = $charCount;
            $maxChar = $char;
        }
    }

    return $maxChar;
}

echo maxChar( 'Alljahkkjkjkj' );