<?php

// --- Directions
// Implement bubbleSort, selectionSort, and mergeSort

/**
 * bubbleSort
 *
 * @param array $arr
 * @return array
 */
function bubbleSort ( array $arr )
{
    for ( $i = 0; $i < count( $arr ); $i++) 
    { 
        for ( $j = 0 ; $j < ( count( $arr ) - $i - 1 ); $j++ ) 
        { 
            if ( $arr[ $j ] > $arr[ $j + 1 ] )
            {
                $lesser = $arr[ $j ];

                $arr[ $j ] = $arr[ $j + 1 ];

                $arr[ $j + 1 ] = $lesser;
            }
        }
    }

    return $arr;
}

/**
 * selectionSort
 *
 * @param array $arr
 * @return array
 */
function selectionSort( array $arr )
{
    for ( $i = 0; $i < count( $arr ); $i++ ) 
    { 
        $indexOfMin = $i;
        for ( $j = $i + 1; $j < count( $arr ); $j++ ) 
        { 
            if ( $arr[ $j ] < $arr[ $indexOfMin ] )
            {
                $indexOfMin = $j;
            }
        }

        if ( $i !== $indexOfMin )
        {
            $lesser = $arr[ $indexOfMin ];

            $arr[ $indexOfMin ] = $arr[ $i ];

            $arr[ $i ] = $lesser;
        }
    }

    return $arr;
}