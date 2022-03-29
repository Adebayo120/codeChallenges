<?php

// --- Directions
// Implement a 'peek' method in this Queue class.
// Peek should return the last element (the next
// one to be returned) from the queue *without*
// removing it.

class Queue {

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
     * add
     *
     * @param [type] $record
     * @return int
     */
    public function add ( $record )
    {
        return array_unshift( $this->data, $record );
    }

    /**
     * remove
     *
     * @return void
     */
    public function remove ()
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