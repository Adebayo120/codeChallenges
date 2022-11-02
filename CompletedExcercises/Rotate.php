<?php

// Given an array, rotate the array to the right by k steps, where k is non-negative.
//
// Example 1:
// Input: nums = [1,2,3,4,5,6,7], k=3
// Output: [5,6,7,1,2,3,4]
//
// Explanation:
// After rotating 1 steps to the right, array becomes: [7,1,2,3,4,5,6]
// After rotating 2 steps to the right, array becomes: [6,7,1,2,3,4,5]
// After rotating 3 steps to the right, array becomes: [5,6,7,1,2,3,4]
//
// Example 2:
// Input: nums = [-1,-100,3,99], k = 2
// Output: [3,99,-1,-100]
//
// Explanation:
// After rotating 1 steps to the right, array becomes: [99,-1,-100,3]
// After rotating 2 steps to the right, array becomes: [3,99,-1,-100]


class Solution{
  function rotate(array $nums, int $k) {
    $bck = array_slice($nums, $k);


    $frnt = array_slice($nums, 0, count($nums) - 1);

    return [...$bck, ...$frnt];
  }

  function rotates(array $nums, int $k) {
    $bck = array_slice($nums, -$k, $k, true);

    $frnt = array_slice($nums, 0, count($nums) - $k, true);

    return array_merge($bck, $frnt);
  }
}

$solution = new Solution();

$output = $solution->rotates([-1,-100,3,99], 2);

echo '[' . implode(',', $output) . ']';