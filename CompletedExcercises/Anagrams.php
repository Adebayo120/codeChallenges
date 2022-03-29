<?php

// --- Directions
// Check to see if two provided strings are anagrams of eachother.
// One string is an anagram of another if it uses the same characters
// in the same quantity. Only consider characters, not spaces
// or punctuation.  Consider capital letters to be the same as lower case
// --- Examples
//   anagrams('rail safety', 'fairy tales') --> True
//   anagrams('RAIL! SAFETY!', 'fairy tales') --> True
//   anagrams('Hi there', 'Bye there') --> False

/**
 * anagrams
 *
 * @param [type] $stringA
 * @param [type] $stringB
 * @return bool
 */
function anagrams ( $stringA, $stringB )
{
    return cleanUp( $stringA ) == cleanUp( $stringB );
}

/**
 * cleanUp
 *
 * @param [type] $string
 * @return string
 */
function cleanUp ( $string )
{
    $string = preg_replace( '/[^A-Za-z0-9\-]/', '', strtolower( $string ) );

    $stringInArrayForm = str_split( $string );

    sort( $stringInArrayForm );

    return implode( '', $stringInArrayForm );
}

echo anagrams( 'adam you abi', 'you abi adam' );