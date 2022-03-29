<?php

// --- Directions
// Given an array and chunk size, divide the array into many subarrays
// where each subarray is of length size
// --- Examples
// chunk([1, 2, 3, 4], 2) --> [[ 1, 2], [3, 4]]
// chunk([1, 2, 3, 4, 5], 2) --> [[ 1, 2], [3, 4], [5]]
// chunk([1, 2, 3, 4, 5, 6, 7, 8], 3) --> [[ 1, 2, 3], [4, 5, 6], [7, 8]]
// chunk([1, 2, 3, 4, 5], 4) --> [[ 1, 2, 3, 4], [5]]
// chunk([1, 2, 3, 4, 5], 10) --> [[ 1, 2, 3, 4, 5]]

/**
 * chunk
 *
 * @param array $array
 * @param integer $size
 * @return array
 */
// function chunk ( array $array, int $size )
// {
//     $chunk = [];
//     $arrayInChunk = [];

//     foreach ( $array as $index => $element ) 
//     {
//         $arrayInChunk[] = $element;
//         $countOfElementsInArrayInChunk = count( $arrayInChunk );
//         if ( ( $countOfElementsInArrayInChunk  == $size ) || ( ( $index + 1 ) == count( $array ) ) )
//         {
//             $chunk[] = $arrayInChunk;
//             $arrayInChunk = [];
//         }
//     }

//     return $chunk;
// }

/**
 * chunk
 *
 * @param array $array
 * @param integer $size
 * @return array
 */
function chunk ( array $array, int $size )
{
    $chunk = [];

    $index = 0; 
    
    while ( $index < count( $array ) ) 
    {
        $chunk[] = array_slice( $array, $index, $size );

        $index += $size;
    }

    return $chunk;
}

/**
 * chunk
 *
 * @param array $array
 * @param integer $size
 * @return array
 */
// function chunk ( array $array, int $size )
// {
//     $chunk = [];

//     foreach ( $array as $index => $element ) 
//     {
//         if ( !count( $chunk ) )
//         {
//             $chunk[] = [ $element ];
//         }
//         elseif ( count( $chunk[ count( $chunk ) - 1 ] ) == $size )
//         {
//             $chunk[] = [ $element ];
//         }
//         else
//         {
//             $last = $chunk[ count( $chunk ) - 1 ];

//             $last[] = $element;

//             $chunk[ count( $chunk ) - 1 ] = $last;
//         }
//     }

//     return $chunk;
// }

print_r( chunk( [ 1, 2, 3, 4, 5, 6, 7, 8 ,9, 10, 11 ], 5 ) );