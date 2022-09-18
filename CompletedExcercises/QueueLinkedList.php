<?php

class Node {

    /**
     * $data
     *
     * @var [type]
     */
    public $data;

    /**
     * $next
     *
     * @var [type]
     */
    public $next;

    public function __construct( $data, $next = null )
    {
        $this->data = $data;

        $this->next = $next;
    }
}


class QueueLinkedList 
{
    /**
     * $head
     *
     * @var null|Node
     */
    private $head;

    /**
     * $tail
     *
     * @var null|Node
     */
    private $tail;

    public function __construct()
    {
        $this->head = null;

        $this->tail = null;
    }

    /**
     * enqueue
     *
     * @param [type] $record
     * @return void
     */
    public function enqueue ( $record ): void
    {
        $node = new Node( $record );

        if ( $this->isEmpty() )
        {
            $this->head = $node;

            $this->tail = $node;

            return;
        }

        $this->tail->next = $node;

        $this->tail = $node;
    }

    /**
     * dequeue
     *
     * @return void
     */
    public function dequeue (): void
    {
        $node = $this->head;

        if ( $this->isEmpty() )
        {
            return;
        }

        if ( $this->head == $this->tail )
        {
            $this->head = null;

            $this->tail = null;
        }
        else
        {
            $this->head = $this->head->next;
        }

        unset( $node );
    }

    /**
     * peek
     *
     * @return mixed
     */
    public function peek (): mixed
    {
        return $this->head;
    }

    /**
     * isEmpty
     *
     * @return boolean
     */
    public function isEmpty (): bool
    {
        return !$this->head && !$this->tail;
    }
}