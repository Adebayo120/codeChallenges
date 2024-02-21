<?php

// You are given an integer array nums. You are initially positioned at the array's first index, and each element in the array represents your maximum jump length at that position.

// Return true if you can reach the last index, or false otherwise.

 

// Example 1:

// Input: nums = [2,3,1,1,4]
// Output: true
// Explanation: Jump 1 step from index 0 to 1, then 3 steps to the last index.
// Example 2:

// Input: nums = [3,2,1,0,4]
// Output: false
// Explanation: You will always arrive at index 3 no matter what. Its maximum jump length is 0, which makes it impossible to reach the last index.
 

// Constraints:

// 1 <= nums.length <= 104
// 0 <= nums[i] <= 105


function canJump($nums) {
    $maxReach = 0; // Keep track of the furthest position you can reach
    
    for ($i = 0; $i < count($nums); $i++) {
        if ($maxReach < $i) {
            // If you cannot reach this index, return false
            return false;
        }
        
        // Update the furthest position you can reach
        $maxReach = max($maxReach, $i + $nums[$i]);
        
        if ($maxReach >= count($nums) - 1) {
            // If you can reach or exceed the last index, return true
            return true;
        }
    }
    
    return false; // If the loop finishes without reaching the last index
}

// Example usage:
$nums1 = [2, 3, 1, 1, 4];
echo "Output: " . (canJump($nums1) ? "true" : "false") . "\n";

$nums2 = [3, 2, 1, 0, 4];
echo "Output: " . (canJump($nums2) ? "true" : "false") . "\n";
