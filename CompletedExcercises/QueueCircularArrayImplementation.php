<?php

class QueueCircularArrayImplementation {

    const MAX_SIZE = 15;

    /**
     * $data
     *
     * @var array
     */
    private $data = [];

    /**
     * $head
     *
     * @var integer
     */
    private int $head;

    /**
     * $tail
     *
     * @var integer
     */
    private int $tail;

    public function __construct()
    {
        $this->data = [];

        $this->head = -1;

        $this->tail = -1;
    }

    /**
     * enqueue
     *
     * @param [type] $record
     * @return void
     */
    public function enqueue ( $record ): void
    {
        if ( $this->isFull() )
        {
            return;
        }
        
        if ( $this->isEmpty() )
        {
            $this->head = 0;

            $this->tail = 0;
        }
        else
        {
            $this->tail = ( $this->tail + 1 ) % self::MAX_SIZE;
        }

        $this->data[ $this->tail ] = $record;
    }

    /**
     * dequeue
     *
     * @return void
     */
    public function dequeue ()
    {
        if ( $this->isEmpty() )
        {
            return;
        }

        if ( $this->head == $this->tail )
        {
            $this->head = -1;

            $this->tail = -1;
        }
        else
        {
            $this->head = ( $this->head + 1 ) % self::MAX_SIZE;
        }
    }

    /**
     * peek
     *
     * @return void
     */
    public function peek (): mixed
    {
        if ( $this->head == -1 )
        {
            return;
        }
        return $this->data[ $this->head ];
    }

    /**
     * isEmpty
     *
     * @return boolean
     */
    public function isEmpty (): bool
    {
        return ( $this->head == -1 ) && ( $this->tail == -1 );
    }

    public function isFull(): bool
    {
        return $this->tail + 1 == self::MAX_SIZE;
    }
}