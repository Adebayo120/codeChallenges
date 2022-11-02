<?php

// Given an array of integers arr, a lucky integer is an integer which has
// a frequency (how many times an element occurs within the array) in the array to its value
//
// Return a lucky integer in the array. if there are multiple lucky integers return
// the largest of them. if there is no lucky integer return -1.
//
// Example 1:
// Input: arr = [2,2,3,4]
// Output: 2
// Explanation: The only lucky number in the array is 2 because it occurs twice
// within the array which is equal to its value 2.
//
// Example 2:
// Input: arr = [1,2,2,3,3,3]
// Output: 3
// Explanation: 1,2 and 3 are all lucky numbers and the largest is returned
//
// Example 3:
// Input: arr = [2,2,2,3,3]
// Output: -1
// Explanation: There are no lucky numbers in the array because 2 occurs 3 times and 3 occurs twice in the array
//
// Example 4:
// Input: arr = [5]
// Output: -1

class Solution {
  function findLucky(array $arr) {
    $result = -1;

    $hashTable = $this->createHashTable($arr);

    foreach ($hashTable as $element => $count) {
      if ($element == $count) {
        $result = $element > $result ? $element : $result;
      }
    }

    return $result;
  }

  function createHashTable(array $arr)
  {
    $result = [];

    foreach ($arr as $key => $element) {
      $result[$element] = isset($result[$element]) ? $result[$element] + 1 : 1;
    }

    return $result;
  }
}

$solution = new Solution();
$output = $solution->findLucky([2,2,3,4]);

echo $output;