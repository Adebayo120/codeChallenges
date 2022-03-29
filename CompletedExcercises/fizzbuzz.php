<?php

// --- Directions
// Write a program that returns the numbers
// from 1 to n. But for multiples of three print
// “fizz” instead of the number and for the multiples
// of five print “buzz”. For numbers which are multiples
// of both three and five print “fizzbuzz”.
// --- Example
//   fizzBuzz(5);
//   1
//   2
//   fizz
//   4
//   buzz

/**
 * fizzbuzz
 *
 * @param integer $n
 * @return void
 */
function fizzbuzz ( int $n )
{
    for ( $i=1; $i <= $n ; $i++ ) 
    { 
        if( ( $i % 3 == 0 ) && ( $i % 5 == 0 ) )
        {
            echo ( "fizzbuzz \t" );
        }
        elseif ( $i % 3 == 0 )
        {
            echo ( "fizz \t" );
        }
        elseif ( $i % 5 == 0 )
        {
            echo ( "buzz \t" );
        }
        else
        {
            echo $i . "\t" ;
        }
    }
}

fizzbuzz( 15 );