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

class ArrayStack1
{

    /**
     * $data
     *
     * @var array
     */
    private $data = [];

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
    public function push($record)
    {
        return array_push($this->data, $record);
    }

    /**
     * pop
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->data);
    }

    /**
     * peek
     *
     * @return mixed
     */
    public function peek()
    {
        return count($this->data) ? $this->data[count($this->data) - 1] : null;
    }

    /**
     * empty
     *
     * @return boolean
     */
    public function empty(): bool
    {
        return !count($this->data);
    }
}

class ArrayStack2
{
    /**
     * $data
     *
     * @var array
     */
    private $data = [];

    /**
     * $data
     *
     * @var int
     */
    private $top = -1;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * push
     *
     * @param [type] $record
     * @return void
     */
    public function push($record)
    {
        $this->top++;

        $this->data[$this->top] = $record;
    }

    /**
     * pop
     *
     * @return mixed
     */
    public function pop()
    {
        $this->top--;
    }

    /**
     * peek
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->top > -1 ? $this->data[$this->top] : null;
    }

    /**
     * empty
     *
     * @return boolean
     */
    public function empty(): bool
    {
        return $this->top < 0;
    }
}


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

class LinkedListStack
{
    /**
     * $data
     *
     * @var ?Node
     */
    private $data;

    /**
     * $data
     *
     * @var ?Node
     */
    private $top;

    public function __construct()
    {
        $this->top = null;
    }

    /**
     * push
     *
     * @param [type] $data
     * @return void
     */
    public function push($data)
    {
        $this->top = new Node($data, $this->top);
    }

    /**
     * pop
     *
     * @return mixed
     */
    public function pop()
    {
        if (!$this->top) {
            return;
        }
        $this->top = $this->top->next;
    }

    /**
     * peek
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->top;    
    }

    /**
     * empty
     *
     * @return boolean
     */
    public function empty(): bool
    {
        return !$this->top;
    }
}
