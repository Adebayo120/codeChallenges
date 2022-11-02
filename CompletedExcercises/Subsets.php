<?php

// Given an integer array "nums" of unique elements, return all possible
// subsets(the power set). The solution set must not contain duplicate subsets.
// Return the solution in specified order.
//
// Example 1:
// Input: nums = [1,2,3]
// Output: [[], [1], [2], [1,2], [3], [1,3], [2,3], [1,2, 3]].
//
// Example 2:
// Input: nums = [0]
// Output: [[], [0]].
//
// Constraints:
// 1 <= nums.length <= 10
// -10 <= nums[i] <= 10
// All the numbers of nums are unique

class Solution {
  function subsets($nums): array
  {
    $result = [[]];
    foreach ($nums as $key => $num) {
      foreach ($result as $key => $item) {
        $item[] = $num;
        $result[] = $item;
      }
    }
    return $result;
  }
}

$solution = new Solution();

$output = $solution->subsets([0]);

$new = array_map(function($array) {
  return '['. implode(',', $array). ']';
}, $output);

echo '['. implode(',', $new). ']';