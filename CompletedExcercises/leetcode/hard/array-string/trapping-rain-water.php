<?php

// Given n non-negative integers representing an elevation map where the width of each bar is 1, compute how much water it can trap after raining.

// Example 1:

// Input: height = [0,1,0,2,1,0,1,3,2,1,2,1]
// Output: 6
// Explanation: The above elevation map (black section) is represented by array [0,1,0,2,1,0,1,3,2,1,2,1]. In this case, 6 units of rain water (blue section) are being trapped.
// Example 2:

// Input: height = [4,2,0,3,2,5]
// Output: 9
 
// Constraints:

// n == height.length
// 1 <= n <= 2 * 104
// 0 <= height[i] <= 105

function trap($height) {
    $n = count($height);
    if ($n == 0) return 0;
    
    $leftMax = array_fill(0, $n, 0);
    $rightMax = array_fill(0, $n, 0);
    
    // Compute the maximum height of bars to the left of each position
    $leftMax[0] = $height[0];
    for ($i = 1; $i < $n; $i++) {
        $leftMax[$i] = max($leftMax[$i - 1], $height[$i]);
    }
    
    // Compute the maximum height of bars to the right of each position
    $rightMax[$n - 1] = $height[$n - 1];
    for ($i = $n - 2; $i >= 0; $i--) {
        $rightMax[$i] = max($rightMax[$i + 1], $height[$i]);
    }
    
    $totalWater = 0;
    // Compute the amount of water trapped at each position
    for ($i = 0; $i < $n; $i++) {
        $waterAbove = min($leftMax[$i], $rightMax[$i]) - $height[$i];
        $totalWater += max($waterAbove, 0);
    }
    
    return $totalWater;
}

// Example usage:
$height1 = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];
echo trap($height1); // Output: 6

$height2 = [4, 2, 0, 3, 2, 5];
echo trap($height2); // Output: 9
