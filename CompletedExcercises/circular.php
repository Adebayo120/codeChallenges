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
    if (!$list->getFirst()) 
            return true; 
  
        // Next of head 
    $node = $list->getFirst()->next;
  
    // This loop would stop in both cases (1) If 
    // Circular (2) Not circular 
    while ($node != null && $node != $list->getFirst()) 
        $node = $node->next; 

    // If loop stopped because of circular 
    // condition 
    return $node === $list->getFirst(); 
}