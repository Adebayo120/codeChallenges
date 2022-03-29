<?php

// --- Directions
// Print out the n-th entry in the fibonacci series.
// The fibonacci series is an ordering of numbers where
// each number is the sum of the preceeding two.
// For example, the sequence
//  [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
// forms the first ten entries of the fibonacci series.
// Example:
//   fib(4) === 3

/**
 * fib
 *
 * @param integer $n
 * @return integer
 */
function fib ( int $n )
{
    $result = [ 0, 1 ];

    for ( $i = 2; $i <= $n ; $i++ ) 
    { 
        $result[] = ( $result[ $i - 1 ] ) + ( $result[ $i - 2 ] );
    }

    return $result[ $n ];
}

/**
 * fib
 *
 * @param integer $n
 * @return integer
 */
// function fib ( int $n )
// {
//     if ( $n < 2 )
//     {
//         return $n;
//     }

//     return fib( $n - 1 ) + fib( $n - 2 );
// }

/**
 * fib
 *
 * @param integer $n
 * @param array $cached
 * @return integer
 */
// function fib ( int $n, $cached = [] )
// {
//     if ( $n < 2 )
//     {
//         return $n;
//     }

//     if ( isset( $cached[ $n ] ) )
//     {
//         return $cached[ $n ];
//     }

//     $result = fib( $n - 1, $cached ) + fib( $n - 2, $cached );

//     $cached[ $n ] = $result;

//     return $result;
// }

echo fib( 15 );