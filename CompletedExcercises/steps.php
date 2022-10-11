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

// function steps (int $heightOfSteps)
// {
//     for ( $level = 1; $level <= $heightOfSteps; $level++ ) 
//     { 
//         $step = '';
//         for ( $column = 1; $column <= $heightOfSteps; $column++ ) 
//         { 
//             if ( $column <= $level )
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

function steps(int $heightOfSteps, $level = 0, $step = '' )
{
    if ( $heightOfSteps == $level )
    {
        return;
    }

    if ( strlen( $step ) == $heightOfSteps )
    {
        echo $step;
        return steps( $heightOfSteps, $level + 1 );
    }

    if ( strlen( $step ) <= $level )
    {
        $step .= '#';
    }
    else
    {
        $step .= '.';
    }

    steps( $heightOfSteps, $level, $step );
}

steps(3);