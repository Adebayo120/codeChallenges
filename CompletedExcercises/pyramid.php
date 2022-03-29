<?php

// --- Directions
// Write a function that accepts a positive number N.
// The function should return a pyramid shape
// with N levels using the # character.  Make sure the
// pyramid has spaces on both the left *and* right hand sides
// --- Examples
//   pyramid(1)
//       '#'
//   pyramid(2)
//       ' # '
//       '###'
//   pyramid(3)
//       '  #  '
//       ' ### '
//       '#####'

/**
 * pyramid
 *
 * @param integer $n
 * @return void
 */
// function pyramid ( int $n )
// {
//     $maxColumn = $n * 2 - 1;

//     $midpoint = round( $maxColumn / 2 );

//     for ( $row = 0; $row < $n ; $row++ ) 
//     { 
//         $level = '';
//         for ( $column = 1; $column <= $maxColumn; $column++ ) 
//         { 
//             if ( $midpoint + $row >= $column &&  $midpoint - $row <= $column )
//             {
//                 $level .= '#';
//             }
//             else
//             {
//                 $level .= '-';
//             }
//         }
//         echo $level;
//         echo "<br>";
//     }
// }

/**
 * pyramid
 *
 * @param integer $n
 * @return void
 */
function pyramid ( $n, $row = 0, $level = '' )
{
    if ( $row == $n )
    {
        return;
    }
    
    $columnsCount = strlen( $level ) + 1; 

    $maxColumns = $n * 2 - 1;

    $midpoint = round( $maxColumns / 2 );

    if ( strlen( $level ) == $maxColumns )
    {
        echo $level;
        echo "<br>";
        return pyramid( $n, $row + 1 );
    }

    if ( $midpoint + $row >= $columnsCount && $midpoint - $row <= $columnsCount )
    {
        $level .= '#';
    }
    else
    {
        $level .= '-';
    }

    pyramid( $n, $row, $level );
}

pyramid( 3 );