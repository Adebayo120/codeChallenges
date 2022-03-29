<?php

require_once 'Excercises/chunk.php';

class ChunkTest extends \PHPUnit\Framework\TestCase 
{
    /**@test */
    public function testIfChunkFunctionDividesAnArrayOfElementsWithChunkSize ()
    {
        $arr = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
        
        $this->assertEquals( chunk( $arr, 2 ), [ [ 1, 2 ], [ 3, 4 ], [ 5, 6 ], [ 7, 8 ], [ 9, 10 ] ] );

        $arr = [ 1, 2, 3 ];
        
        $this->assertEquals( chunk( $arr, 1 ), [ [ 1 ], [ 2 ], [ 3 ] ] );

        $arr = [ 1, 2, 3, 4, 5 ];
        
        $this->assertEquals( chunk( $arr, 3 ), [ [ 1, 2, 3 ], [ 4, 5 ] ] );

        $arr = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ];
        
        $this->assertEquals( chunk( $arr, 5 ), [ [ 1, 2, 3, 4, 5 ], [ 6, 7, 8, 9, 10 ], [ 11, 12, 13 ] ] );
    }
}