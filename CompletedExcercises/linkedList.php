<?php

require_once 'Stack.php';

class Node
{
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

    public function __construct($data, $next = null)
    {
        $this->data = $data;

        $this->next = $next;
    }
}

class LinkedList
{

    private ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    /**
     * insertFirst
     *
     * @param [type] $data
     * @return void
     */
    public function insertFirst($data)
    {
        $this->head = new Node($data, $this->head);
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
            $node = $this->next;
        }
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
        $this->head = $this->head->next;
    }

    /**
     * removeLast
     *
     * @return void
     */
    // public function removeLast ()
    // {
    //     $previous = null;
    //     $node = $this->head;
    //     while ( $node ) 
    //     {
    //         if ( !$node->next )
    //         {
    //             if ( $previous )
    //             {
    //                 $previous->next = null;
    //             }
    //             else
    //             {
    //                 $this->head = null;
    //             }
    //         }
    //         $previous = $node;
    //         $node = $node->next;
    //     }
    // }

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

        $previous = $this->head;

        $node = $this->head->next;

        while ($node) {
            $previous = $node;
            $node = $node->next;
        }
        $previous->next = null;
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

        $previous = $this->getAt($index - 1);

        if (!$previous || !$previous->next) {
            return;
        }
        $previous->next = $previous->next->next;
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
            $this->insertFirst($data);
            return;
        }

        $previous = ($idealPreviousNode = $this->getAt($index - 1)) ? $idealPreviousNode : $this->getLast();

        $previous->next = new Node($data, $previous->next);
    }

    public function insertAt2($data, int $index)
    {
        if (!$index) {
            $this->insertFirst($data);
            return;
        }

        $parentNode = $this->head;

        // This is prone to error what if parentNide is already while looping
        for ($i = 0; $i < $index - 2; $i++) {
            $parentNode = $parentNode->next;
        }

        $parentNode->next = new Node($data, $parentNode->next);
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

        $this->recursiveReverseA($next, $node);
    }

    public function recursiveReverseB(Node $node,  $previous = null)
    {
        if (!$node->next) {
            $node->next = $previous;

            $this->head =  $node;

            return;
        }

        $this->recursiveReverseB($node->next, $node);

        $node->next = $previous;
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

    public function reverseUsingStack()
    {
        if (!$node = $this->head) {
            return;
        }

        $stack = new Stack();

        $node = $this->head;

        while ($node) {
            $stack->push($node);

            $node = $node->next;
        }

        $node = $stack->pop();

        $this->head = $node;

        while (!$stack->empty()) {
            $node->next = $stack->pop();

            $node = $node->next;
        }
        $node->next = null;
    }
}
