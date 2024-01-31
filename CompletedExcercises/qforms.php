<?php


require_once 'stack.php';

class QForm {

    /**
     * $frst
     *
     * @var [type]
     */
    public $first;

    /**
     * $second
     *
     * @var [type]
     */
    public $second;

    public function __construct()
    {
        $this->first = new ArrayStack2();
        
        $this->second = new ArrayStack2();
    }

    /**
     * add
     *
     * @param [type] $record
     * @return void
     */
    public function add ( $record )
    {
        $this->first->push( $record );
    }

    /**
     * remove
     *
     * @return void
     */
    public function remove ()
    {
        while( $this->first->peek() )
        {
            $this->second->push( $this->first->pop() );
        }

        $removed = $this->second->pop();

        while( $this->second->peek() )
        {
            $this->first->push( $this->second->pop() );
        }

        return $removed;
    }

    /**
     * peek
     *
     * @return void
     */
    public function peek ()
    {
        while( $this->first->peek() )
        {
            $this->second->push( $this->first->pop() );
        }

        $peeked = $this->second->peek();

        while( $this->second->peek() )
        {
            $this->first->push( $this->second->pop() );
        }

        return $peeked;
    }

}