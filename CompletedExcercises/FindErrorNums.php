<?php

// suppose you're given a set which originally contains numbers from 1 to n.
// Unfortunately due to a data error, one of the numbers in the set got duplicated
// to another number in the set, which results in a repetition of one number
// and a loss of another number
// Given an array nums representing the data status of this set after the error,
// find and return the number that occurs twice and the number that is the form
// of an array
//
// Example 1:
// Input: nums = [1,2,3,4,3]
// Output: [3,5]
// Explanation: 3 is repeated twice and 5 is missing
//
// Example 2:
// Input: nums = [1,2,2]
// Output: [2,3]
// Explanation: 2 is repeated twice and 3 is missing

class Solution{
  function findErrorNums(array $nums): array 
  {
    $duplicate = -1;
    $missing = -1;
    foreach ($nums as $key => $num) {
      if ($nums[$num - 1] < 0) {
        $duplicate = $num;
      } else {
        $nums[$num - 1] *= -1;
      }
    }

    foreach ($nums as $key => $num) {
      if ($num > 0) {
        $missing = $key + 1;
      }
    }
    return [$duplicate, $missing];
  }
}

$solution = new Solution();

$output = $solution->findErrorNums([1,2,3,2]);

echo '['. implode(',', $output). ']';