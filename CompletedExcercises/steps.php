<?php

// --- Directions
// Write a function that accepts a positive number N.
// The function should return a step shape
// with N levels using the # character.  Make sure the
// step has spaces on the right hand side!
// --- Examples
//   steps(2)
//       '# '
//       '##'
//   steps(3)
//       '#  '
//       '## '
//       '###'
//   steps(4)
//       '#   '
//       '##  '
//       '### '
//       '####'

// function steps (int $n)
// {
//     for ( $row = 1; $row <= $n; $row++ ) 
//     { 
//         $step = '';
//         for ( $column = 1; $column <= $n; $column++ ) 
//         { 
//             if ( $column <= $row )
//             {
//                 $step .= '#';
//             }
//             else
//             {
//                 $step .= ' ';
//             }
//         }
//         echo( $step );
//     }
// }

function steps (int $n, $row = 0, $step = '' )
{
    if ( $n == $row )
    {
        return;
    }

    if ( strlen( $step ) == $n )
    {
        echo $step;
        return steps( $n, $row + 1 );
    }

    if ( strlen( $step ) <= $row )
    {
        $step .= '#';
    }
    else
    {
        $step .= '.';
    }

    steps( $n, $row, $step );
}

steps (3);