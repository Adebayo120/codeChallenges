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

// Range search using itarative binary search
// function searchRange( array $arr, float $min, float $max ) : array
// {
//     $upperLowerBounds = [];
//     $startIndex = 0;
//     $endIndex = count( $arr ) - 1;

//     while ( $startIndex < $endIndex ) {
//         $midIndex = floor( ( $startIndex + $endIndex ) / 2 );
//         if ( $min <= $arr[$midIndex][ 0 ] ) 
//         {
//             $endIndex = $midIndex;
//         }
//         else 
//         {
//             $startIndex = $midIndex + 1;
//         }
//     }

//    // saving $startIndex in the result array that will be  returned...
//     $upperLowerBounds[0] = $startIndex;
//     $endIndex = count( $arr ) - 1;
//     while ($startIndex < $endIndex) {
//         $midIndex = floor( ($startIndex + $endIndex) / 2 + 1 );
//         if ($max < $arr[$midIndex][ 0 ]) 
//         {
//             $endIndex = $midIndex  -1;
//         }
//         else 
//         {
//             $startIndex = $midIndex;
//         }
//     }
//     $upperLowerBounds[1] = $endIndex;

//     return array_slice( $arr, $upperLowerBounds[0], ($upperLowerBounds[1] - $upperLowerBounds[0]) + 1 );
// }
// print_r( searchRange( [ [ 0.1 ], [ 0.2 ], [ 0.3 ], [ 0.4 ], [ 0.5 ], [ 0.6 ] ], 0.1, 0.3 ) );

echo anagrams( 'adam you abi', 'you abi adam' );

