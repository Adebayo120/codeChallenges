<?php

// --- Directions
// Given a string, return a new string with the reversed
// order of characters
// --- Examples
//   reverse('apple') === 'leppa'
//   reverse('hello') === 'olleh'
//   reverse('Greetings!') === '!sgniteerG'

/**
 * reversestring
 *
 * @param [type] $str
 * @return string
 */
// function reversestring ( string $str )
// {
//     return implode( array_reverse( str_split( $str ) ) );
// }

/**
 * reversestring
 *
 * @param [type] $str
 * @return string
 */
function reversestring ( string $str )
{
    $reversed = '';

    foreach ( str_split( $str )  as $key => $character ) 
    {
        $reversed = $character . $reversed;
    }

    return $reversed;
}

echo reversestring( 'read well' );