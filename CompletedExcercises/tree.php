<?php

class TreeNode {

    /**
     * $data
     *
     * @var [type]
     */
    public $data;

    /**
     * $children
     *
     * @var array
     */
    public $children;

    public function __construct( $data )
    {
        $this->data = $data;
        $this->children = [];
    }

    /**
     * add
     *
     * @param [type] $data
     * @return void
     */
    public function add ( $data )
    {
        $this->children[] = new Node( $data );
    }

    /**
     * remove
     *
     * @param [type] $data
     * @return void
     */
    public function remove ( $data )
    {
        $this->children = array_filter( $this->children, function ( $child ) use ( $data ) {
            return $child->data !== $data;
        } );
    }
} 

class Tree {

    /**
     * $root
     *
     * @var Node|null
     */
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    /**
     * traverseBF
     *
     * @param [type] $fn
     * @return void
     */
    public function traverseBF ( Closure $fn )
    {
        $arr = [ $this->root ];

        while ( count( $arr )  ) 
        {
            $node = array_shift( $arr );

            foreach ( array_reverse( $node->children ) as $index => $child ) 
            {
                $arr[] = $child;
            }

            $fn( $node );
        }
    }

    /**
     * traverseDF
     *
     * @param [type] $fn
     * @return void
     */
    public function traverseDF ( $fn )
    {
        $arr = [ $this->root ];

        while ( count( $arr )  ) 
        {
            $node = array_pop( $arr );

            foreach ( array_reverse( $node->children )  as $index => $child ) 
            {
                array_push( $arr, $child );
            }

            $fn( $node );
        }
    }
}