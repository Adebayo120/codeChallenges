<?php

// --- Directions
// 1) Implement the Node class to create
// a binary search tree.  The constructor
// should initialize values 'data', 'left',
// and 'right'.
// 2) Implement the 'insert' method for the
// Node class.  Insert should accept an argument
// 'data', then create an insert a new node
// at the appropriate location in the tree.
// 3) Implement the 'contains' method for the Node
// class.  Contains should accept a 'data' argument
// and return the Node in the tree with the same value.
// If the value isn't in the tree return null.

class Node {

    /**
     * $data
     *
     * @var Node
     */
    public $data;

    /**
     * $left
     *
     * @var Node|null
     */
    public $left;

    /**
     * $right
     *
     * @var Node|null
     */
    public $right;

    public function __construct( $data )
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    /**
     * 
     *
     * @param [type] $data
     * @return void
     */
    public function insert ( $data )
    {
        if ( $data < $this->data && $this->left )
        {
            $this->left->insert( $data );
        }
        elseif ( $data < $this->data && !$this->left )
        {
            $this->left = new Node( $data );
        }
        elseif ( $data > $this->data && $this->right )
        {
            $this->right->insert( $data );
        }
        elseif ( $data > $this->data && !$this->right )
        {
            $this->right = new Node( $data );
        }
    }

    /**
     * contains
     *
     * @param [type] $data
     * @return Node|null
     */
    public function contains ( $data )
    {
        if ( $data === $this->data )
        {
            return $this;
        }
        elseif ( $data < $this->data && $this->left )
        {
            return $this->left->contains( $data );
        }
        elseif ( $data > $this->data && $this->right ) 
        {
            return $this->right->contains( $data );
        }

        return null;
    }
}