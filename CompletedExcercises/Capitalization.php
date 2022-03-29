<?php

// --- Directions
// Write a function that accepts a string.  The function should
// capitalize the first letter of each word in the string then
// return the capitalized string.
// --- Examples
//   capitalize('a short sentence') --> 'A Short Sentence'
//   capitalize('a lazy fox') --> 'A Lazy Fox'
//   capitalize('look, it is working!') --> 'Look, It Is Working!'

/**
 * capitalization
 *
 * @param string $string
 * @return string
 */
function capitalization ( string $string )
{
    $capitalized = [];
    
    foreach ( explode( ' ', $string ) as $index => $word ) 
    {
        $capitalized[] = strtoupper( substr( $word, 0, 1 ) ) . substr( $word, 1 );
    }

    return implode( ' ', $capitalized );
}

/**
 * capitalization
 *
 * @param string $string
 * @return string
 */
// function capitalization ( string $string )
// {
//     $capitalized = strtoupper( substr( $string, 0, 1 ) );
    
//     for ( $i = 1; $i < strlen( $string ); $i++) 
//     { 
//         if ( substr( $string, ( $i - 1 ), 1 ) == ' ' )
//         {
//             $capitalized .= strtoupper( substr( $string, $i, 1 ) );
//         }
//         else
//         {
//             $capitalized .= substr( $string, $i, 1 );
//         }
//     }

//     return $capitalized;
// }

echo capitalization( 'do u know him at all' );