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
 * @param integer $heightOfPyramid
 * @return void
 */
// function pyramid ( int $heightOfPyramid )
// {
//     $maxColumn = $heightOfPyramid * 2 - 1;

//     $midpoint = round( $maxColumn / 2 );

//     for ( $level = 0; $level < $heightOfPyramid ; $level++ ) 
//     { 
//         $result = '';
//         for ( $column = 1; $column <= $maxColumn; $column++ ) 
//         { 
//             if ( $midpoint + $level >= $column &&  $midpoint - $level <= $column )
//             {
//                 $result .= '#';
//             }
//             else
//             {
//                 $result .= '-';
//             }
//         }
//         echo $result;
//         echo "<br>";
//     }
// }

/**
 * pyramid
 *
 * @param integer $heightOfPyramid
 * @return void
 */
function pyramid ( $heightOfPyramid, $level = 0, $result = '' )
{
    if ( $level == $heightOfPyramid )
    {
        return;
    }
    
    $columnsCount = strlen( $result ) + 1; 

    $maxColumns = $heightOfPyramid * 2 - 1;

    $midpoint = round( $maxColumns / 2 );

    if ( strlen( $result ) == $maxColumns )
    {
        echo $result;
        echo "<br>";
        return pyramid( $heightOfPyramid, $level + 1 );
    }
    // if ($level >= 1) {
    //     echo "level {$level} ";
    //     echo "columnsCount {$columnsCount} ";
    //     $max = $midpoint + $level;
    //     echo "max {$max} ";
    //     $min = $midpoint - $level;
    //     echo "min {$min} ";
    // }
    if ( $midpoint + $level >= $columnsCount && $midpoint - $level <= $columnsCount )
    {

        $result .= '#';
    }
    else
    {
        $result .= '-';
    }
    
    // if ($level >= 1) {
    //     echo $result;
    //     echo "<br>";
    // }

    pyramid( $heightOfPyramid, $level, $result );
}

pyramid( 5 );