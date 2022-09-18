<?php

// --- Directions
// Given a linked list, return true if the list
// is circular, false if it is not.
// --- Examples
//   $l = new List();
//   $a = new Node('a');
//   $b = new Node('b');
//   $c = new Node('c');
//   $l.head = $a;
//   $a.next = $b;
//   $b.next = $c;
//   $c.next = $b;
//   circular($l) // true

require_once 'linkedList.php';

/**
 * circular
 *
 * @param LinkedList $list
 * @return boolean
 */
function circular ( LinkedList $list )
{
    $slow = $list->getFirst();

    $fast = $list->getFirst();

    while ( $fast->next && $fast->next->next ) 
    {
        $slow = $slow->next;

        $fast = $fast->next->next;

        if ( $fast === $slow )
        {
            return true;
        }
    }

    return false;
}