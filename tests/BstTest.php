<?php

require_once 'Excercises/bst.php';

class BstTest extends \PHPUnit\Framework\TestCase
{
    /**@test */
    public function testIfNodeCanInsertCorrectly ()
    {
        $node = New Node( 10 );

        $node->insert( 5 );

        $node->insert( 15 );

        $node->insert( 17 );

        $this->assertEquals( $node->left->data, 5 );

        $this->assertEquals( $node->right->data, 15 );

        $this->assertEquals( $node->right->right->data, 17 );
    }

    /**@test */
    public function testIfContainsMethodReturnNodeWithTheSameData ()
    {
        $node = New Node( 10 );

        $node->insert( 5 );

        $node->insert( 15 );

        $node->insert( 20 );

        $node->insert( 0 );

        $node->insert( -5 );

        $node->insert( 3 );

        $this->assertEquals( $node->contains( 3 ), $node->left->left->right );
    }

    /**@test */
    public function testIfContainsMethodReturnsNullIfValueNotFound ()
    {
        $node = New Node( 10 );

        $node->insert( 5 );

        $node->insert( 15 );

        $node->insert( 20 );

        $node->insert( 0 );

        $node->insert( -5 );

        $node->insert( 3 );

        $this->assertEquals( $node->contains( 9999 ), null );
    }
}