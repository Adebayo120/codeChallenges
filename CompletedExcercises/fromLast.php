<?php

// --- Directions
// Given a linked list and integer n, return the element n
// spaces from the last node in the list.  Do not call the
// 'size' method of the linked list. Assume that n will always
// be less than the length of the list.
// --- Examples
//    const list = new List();
//    list.insertLast('a');
//    list.insertLast('b');
//    list.insertLast('c');
//    list.insertLast('d');
//    fromLast(list, 2).data // 'b'

require_once 'linkedList.php';

/**
 * fromLast
 *
 * @param LinkedList $list
 * @param integer $n
 * @return Node
 */
// function fromLast ( LinkedList $list, int $n )
// {
//     $slow = $list->getFirst();

//     $fast = $list->getFirst();

//     $counter = 0;

//     while ( $fast->next ) 
//     {
//         $counter++;

//         $fast = $fast->next;

//         $slow = $counter > $n ? $slow->next : $slow;
//     }

//     return $slow;
// }


/**
 * fromLast
 *
 * @param LinkedList $list
 * @param integer $n
 * @return Node
 */
function fromLast ( LinkedList $list, int $n )
{
    $slow = $list->getFirst();

    $fast = $list->getFirst();

    while ( $n > 0 ) 
    {
        $fast = $fast->next;

        $n--;
    }

    while ( $fast->next ) 
    {
        $slow = $slow->next;

        $fast = $fast->next;
    }

    return $slow;
}