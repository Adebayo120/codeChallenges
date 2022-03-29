<?php

require_once 'Excercises/matrix.php';

class MatrixTest extends \PHPUnit\Framework\TestCase 
{
    /**@test */
    public function testIfmatrixFucntionProduces2by2Array ()
    {
        $matrix = matrix( 2 );

        $this->assertCount( 2, $matrix );

        $this->assertEquals( $matrix[ 0 ], [ 1, 2 ] );

        $this->assertEquals( $matrix[ 1 ], [ 4, 3 ] );
    }

    /**@test */
    public function testIfmatrixFucntionProduces3by3Array ()
    {
        $matrix = matrix( 3 );

        $this->assertCount( 3, $matrix );

        $this->assertEquals( $matrix[ 0 ], [ 1, 2, 3 ] );

        $this->assertEquals( $matrix[ 1 ], [ 8, 9 , 4] );

        $this->assertEquals( $matrix[ 2 ], [ 7, 6 , 5] );
    }

    /**@test */
    public function testIfmatrixFucntionProduces4by4Array ()
    {
        $matrix = matrix( 4 );

        $this->assertCount( 4, $matrix );

        $this->assertEquals( $matrix[ 0 ], [ 1, 2, 3, 4 ] );

        $this->assertEquals( $matrix[ 1 ], [ 12, 13 , 14, 5] );

        $this->assertEquals( $matrix[ 2 ], [ 11, 16 , 15, 6] );

        $this->assertEquals( $matrix[ 3 ], [ 10, 9 , 8, 7] );
    }
}