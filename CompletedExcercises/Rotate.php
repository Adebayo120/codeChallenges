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

// $solution = new Solution();

// $output = $solution->rotates([-1,-100,3,99], 2);

// echo '[' . implode(',', $output) . ']';


function rotate(&$nums, $k) {
  $length = count($nums);
  $k %= $length; // To handle cases where k > length of the array
  reverseArray($nums, 0, $length - 1); // Reverse the entire array
  reverseArray($nums, 0, $k - 1); // Reverse the first k elements
  reverseArray($nums, $k, $length - 1); // Reverse the remaining elements
}

function reverseArray(&$nums, $start, $end) {
  while ($start < $end) {
      $temp = $nums[$start];
      $nums[$start] = $nums[$end];
      $nums[$end] = $temp;
      $start++;
      $end--;
  }
}

// Example usage:
$nums1 = [1, 2, 3, 4, 5, 6, 7];
$k1 = 3;
rotate($nums1, $k1);
echo "Output: [";
foreach ($nums1 as $num) {
  echo "$num, ";
}
echo "]\n";

$nums2 = [-1, -100, 3, 99];
$k2 = 2;
rotate($nums2, $k2);
echo "Output: [";
foreach ($nums2 as $num) {
  echo "$num, ";
}
echo "]\n";


