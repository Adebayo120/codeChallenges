<?php

// --- Directions
// Write a function that accepts an integer N
// and returns a NxN spiral matrix.
// --- Examples
//   matrix(2)
//     [[1, 2],
//     [4, 3]]
//   matrix(3)
//     [[1, 2, 3],
//     [8, 9, 4],
//     [7, 6, 5]]
//  matrix(4)
//     [[1,   2,  3, 4],
//     [12, 13, 14, 5],
//     [11, 16, 15, 6],
//     [10,  9,  8, 7]]

/**
 * matrix
 *
 * @param [type] $n
 * @return array
 */
function matrix ( $n )
{
    $matrixArray = [];

    for ( $i = 0 ; $i < $n ; $i++) { 
        $matrixArray[] = [];
    }

    $counter = 1;

    $startColumn = 0;
    $endColumn = $n - 1;
    $startRow = 0;
    $endRow = $n - 1;

    while ( $startColumn <= $endColumn && $startRow <= $endRow ) 
    {
        // TOP ROW
        for ( $i = $startColumn ; $i <= $endColumn ; $i++ ) 
        { 
            $matrixArray[ $startRow ][ $i ] = $counter;
            $counter++;
        }
        $startRow++;

        // RIGTH COLUMN
        for ( $i = $startRow ; $i <= $endRow ; $i++ ) 
        { 
            $matrixArray[ $i ][ $endColumn ] = $counter;
            $counter++;
        }
        $endColumn--;

        // BOTTOM ROW
        for ( $i = $endColumn; $i >= $startColumn ; $i-- ) 
        { 
            $matrixArray[ $endRow ][ $i ] = $counter;
            $counter++;
        }
        $endRow--;

        // LEFT COLUMN 
        for ( $i = $endRow;  $i >= $startRow;  $i-- ) 
        { 
            $matrixArray[ $i ][ $startColumn ] = $counter;
            $counter++;
        }
        $startColumn++;
    }
    
    return $matrixArray;
}

print_r( matrix( 3 ) );