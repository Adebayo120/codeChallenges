<?php

// Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].

// The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.

// You must write an algorithm that runs in O(n) time and without using the division operation.

 

// Example 1:

// Input: nums = [1,2,3,4]
// Output: [24,12,8,6]
// Example 2:

// Input: nums = [-1,1,0,-3,3]
// Output: [0,0,9,0,0]
 

// Constraints:

// 2 <= nums.length <= 105
// -30 <= nums[i] <= 30
// The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.
 

// Follow up: Can you solve the problem in O(1) extra space complexity? (The output array does not count as extra space for space complexity analysis.)

function productExceptSelf($nums) {
    $n = count($nums);
    $left = array_fill(0, $n, 1); // Array to store products of elements to the left of current element
    $right = array_fill(0, $n, 1); // Array to store products of elements to the right of current element
    
    // Calculate products of elements to the left of current element
    $leftProduct = 1;
    for ($i = 1; $i < $n; $i++) {
        $leftProduct *= $nums[$i - 1];
        $left[$i] = $leftProduct;
    }
    
    // Calculate products of elements to the right of current element
    $rightProduct = 1;
    for ($i = $n - 2; $i >= 0; $i--) {
        $rightProduct *= $nums[$i + 1];
        $right[$i] = $rightProduct;
    }
    
    // Calculate product of all elements except current element
    $answer = array();
    for ($i = 0; $i < $n; $i++) {
        $answer[$i] = $left[$i] * $right[$i];
    }
    
    return $answer;
}

// Example usage:
$nums1 = [1, 2, 3, 4];
print_r(productExceptSelf($nums1)); // Output: [24, 12, 8, 6]

$nums2 = [-1, 1, 0, -3, 3];
print_r(productExceptSelf($nums2)); // Output: [0, 0, 9, 0, 0]
