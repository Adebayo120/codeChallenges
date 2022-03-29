<?php

// --- Directions
// Create a stack data structure.  The stack
// should be a class with methods 'push', 'pop', and
// 'peek'.  Adding an element to the stack should
// store it until it is removed.
// --- Examples
//   const s = new Stack();
//   s.push(1);
//   s.push(2);
//   s.pop(); // returns 2
//   s.pop(); // returns 1

class Stack {

    /**
     * $data
     *
     * @var array
     */
    public $data = [];

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * push
     *
     * @param [type] $record
     * @return int
     */
    public function push ( $record )
    {
        return array_push( $this->data, $record );
    }

    /**
     * pop
     *
     * @return void
     */
    public function pop ()
    {
        return array_pop( $this->data );
    }

    /**
     * peek
     *
     * @return void
     */
    public function peek ()
    {
        return count( $this->data ) ? $this->data[ count( $this->data ) - 1 ] : null;
    }
}