<?php 

// --- Directions
// Write a function that returns the number of vowels
// used in a string.  Vowels are the characters 'a', 'e'
// 'i', 'o', and 'u'.
// --- Examples
//   vowels('Hi There!') --> 3
//   vowels('Why do you ask?') --> 4
//   vowels('Why?') --> 0

/**
 * vowels
 *
 * @param string $string
 * @return integer
 */
function vowels ( string $string )
{
    $vowelsCount = 0;

    $vowels = [ 'a', 'e', 'i', 'o', 'u' ];

    foreach ( str_split( strtolower( $string ) ) as $index => $char ) 
    {
       in_array( $char, $vowels ) ? $vowelsCount++ : '';
    }

    return $vowelsCount;
}

/**
 * vowels
 *
 * @param string $string
 * @return integer
 */
// function vowels ( string $string )
// {
//     return preg_match_all( '/[aeiou]/i', $string );
// }

echo vowels( 'jkoidmsun' );