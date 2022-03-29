<?php

require_once 'tree.php';

/**
 * levelWidth
 *
 * @param Node $root
 * @return void
 */
function levelWidth ( Node $root )
{
    $stoper = 's';

    $arr = [ $root, $stoper ];

    $width = [ 0 ];

    while ( count( $arr ) > 1 ) 
    {
        $node = array_shift( $arr );

        if ( $node === $stoper )
        {
            $width[] = 0;

            $arr[] = $stoper;
        }
        else
        {
            $width[ count( $width ) - 1 ] += 1;
            
            foreach ( $node->children as $index => $child ) 
            {
                $arr[] = $child;
            }
        }
    }
}