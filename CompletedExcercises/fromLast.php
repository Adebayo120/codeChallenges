<?php

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