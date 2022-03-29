<?php

// --- Directions
// Given an integer, return an integer that is the reverse
// ordering of numbers.
// --- Examples
//   reverseInt(15) === 51
//   reverseInt(981) === 189
//   reverseInt(500) === 5
//   reverseInt(-15) === -51
//   reverseInt(-90) === -9

/**
 * reverseint
 *
 * @param [type] $n
 * @return int
 */
function reverseint ( $n )
{
    $string = (string)$n;

    $reversed = implode( array_reverse( str_split( $string ) ) );

    $nStatus = $n > 0 ? 1 : -1;

    return (int)$reversed * $nStatus;
}

echo reverseint( -3000 );