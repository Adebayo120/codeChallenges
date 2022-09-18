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
    // start at the beginning of list
    for ( $i = 0; $i < count( $arr ); $i++ ) 
    { 
        // make a pass along list
        for ( $j = 0 ; $j < ( count( $arr ) - $i - 1 ) ; $j++ ) 
        { 
            // compare adjacent element
            if ( $arr[ $j ] > $arr[ $j + 1 ] )
            {
                // swap
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

/**
 * mergeSort
 *
 * @param array $arr
 * @return array
 */
function mergeSort ( array $arr )
{
    $arrCount = count( $arr );
    if ( $arrCount === 1 )
    {
        return $arr;
    }

    $center = floor( $arrCount / 2 );

    $left = array_slice( $arr, 0, $center );

    $right = array_slice( $arr, $center );

    return merge( mergeSort( $left ), mergeSort( $right ) );
}

/**
 * merge
 *
 * @param array $left
 * @param array $right
 * @return array
 */
function merge ( array $left, array $right )
{
    $result = [];

    while ( count( $left ) && count( $right ) )
    {
        if ( $left[ 0 ] < $right[ 0 ] )
        {
            $result[] = array_shift( $left );
        }
        else
        {
            $result[] = array_shift( $right );
        }
    }

    return [ 
        ...$result,
        ...$left,
        ...$right
    ];
}