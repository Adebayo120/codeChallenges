<?php

class Node
{
    /**
     * data
     *
     * @var [type]
     */
    public $data;

    /**
     * prev
     *
     * @var [type]
     */
    public $prev;

    /**
     * next
     *
     * @var [type]
     */
    public $next;

    public function __construct($data, $prev = null, $next = null)
    {
        $this->data = $data;
        $this->prev = $prev;
        $this->next = $next;
    }
}

class DoublyLinkedList
{
    public ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    /**
     * insertAtHead
     *
     * @param [type] $data
     * @return void
     */
    public function insertAtHead($data): void
    {
        $node = new Node($data);

        if (!$head = $this->head) {
            $this->head = $node;
            return;
        }

        $head->prev = $node;

        $node->next = $head;

        $this->head = $node;
    }

    /**
     * size
     *
     * @return int
     */
    public function size()
    {
        $counter = 0;

        $node = $this->head;

        while ($node) {
            $counter++;
            $node = $node->next;
        }

        return $counter;
    }

    /**
     * getFirst
     *
     * @return Node|null
     */
    public function getFirst()
    {
        return $this->head;
    }

    /**
     * getLast
     *
     * @return Node|null
     */
    public function getLast()
    {
        $node = $this->head;

        while ($node) {
            if (!$node->next) {
                return $node;
            }
            $node = $node->next;
        }
        return $node;
    }

    /**
     * clear
     *
     * @return void
     */
    public function clear()
    {
        return $this->head = null;
    }

    /**
     * removeFirst
     *
     * @return void
     */
    public function removeFirst()
    {
        if (!$this->head) {
            return;
        }
        $head = $this->head;

        $this->head = $this->head->next;

        if ($this->head) {
            $this->head->prev = null;
        }

        unset($head);
    }

    /**
     * removeLast
     *
     * @return void
     */
    public function removeLast()
    {
        if (!$this->head) {
            return;
        }

        if (!$this->head->next) {
            $this->head = null;
            return;
        }

        $lastNode = $this->head->next;

        while ($lastNode->next) {
            $lastNode = $lastNode->next;
        }

        $lastNode->prev->next = null;

        unset($lastNode);
    }

    /**
     * insertLast
     *
     * @param [type] $data
     * @return void
     */
    public function insertLast($data)
    {
        $last = $this->getLast();

        $node = new Node($data);

        if ($last) {
            $last->next = $node;
        } else {
            $this->head = $node;
        }
    }

    /**
     * getAt
     *
     * @param integer $index
     * @return Node|null
     */
    public function getAt(int $index)
    {
        $counter = 0;

        $node = $this->head;

        while ($node) {
            if ($counter == $index) {
                return $node;
            }
            $counter++;

            $node = $node->next;
        }
        return null;
    }

    /**
     * removeAt
     *
     * @param integer $index
     * @return void
     */
    public function removeAt(int $index)
    {
        if (!$this->head) {
            return;
        }

        if ($index == 0) {
            $this->removeFirst();
        }

        if (!$node = $this->getAt($index)) {
            return;
        }

        $node->prev->next = $node->next;

        if ($next = $node->next) {
            $next->prev = $node->prev;
        }
    }

    /**
     * insertAt
     *
     * @param [type] $data
     * @param int $index
     * @return void
     */
    public function insertAt($data, int $index)
    {
        if (!$this->head) {
            $this->head = new Node($data);
            return;
        }

        if ($index == 0) {
            $this->insertAtHead($data);
            return;
        }

        $previous = ($idealPreviousNode = $this->getAt($index - 1)) ? $idealPreviousNode : $this->getLast();

        $next = $previous->next;

        $previous->next = $node = new Node($data, $previous, $previous->next);

        $next->prev = $node;
    }

    public function reverse()
    {
        if (!$node = $this->head) {
            return;
        }

        $previous = null;

        while ($node) {
            $next = $node->next;

            $node->next = $previous;

            $node->prev = null;

            if($previous){
                $previous->prev = $node;
            }

            $previous = $node;

            $node = $next;
        }

        $this->head = $previous;
    }

    public function recursiveReverseA(Node $node, $previous = null)
    {
        if (!$node) {
            $this->head = $previous;
            return;
        }

        $next = $node->next;

        $node->next = $previous;

        $node->prev = null;

        if($previous){
            $previous->prev = $node;
        }

        $this->recursiveReverseA($next, $node);
    }

    public function recursiveReverseB(Node $node)
    {
        if (!$node->next) {
            $node->next = $node->prev;

            if($previous = $node->prev){
                $previous->prev = $node;
            }

            $node->prev = null;

            $this->head =  $node;

            return;
        }

        $this->recursiveReverseB($node->next, $node);

        $node->next = $node->prev;

        if($previous = $node->prev){
            $previous->prev = $node;
        }
    }

    public function recursiveReverseC(Node $node)
    {
        if (!$node->next) {
            $this->head =  $node;

            return;
        }

        $this->recursiveReverseB($node->next);

        $next = $node->next;

        $next->next = $node;

        $node->next = null;
    }

    // public function recursiveReverse ( Node $node,  $previous = null  )
    // {
    //     if ( !$node->next )
    //     {
    //         $node->next = $previous;

    //         $this->head =  $node;

    //         return;
    //     }

    //     $this->recursiveReverse( $node->next, $node );

    //     $node->next = $previous;
    // }
}
