<?php

// There are n children standing in a line. Each child is assigned a rating value given in the integer array ratings.

// You are giving candies to these children subjected to the following requirements:

// Each child must have at least one candy.
// Children with a higher rating get more candies than their neighbors.
// Return the minimum number of candies you need to have to distribute the candies to the children.

// Example 1:

// Input: ratings = [1,0,2]
// Output: 5
// Explanation: You can allocate to the first, second and third child with 2, 1, 2 candies respectively.
// Example 2:

// Input: ratings = [1,2,2]
// Output: 4
// Explanation: You can allocate to the first, second and third child with 1, 2, 1 candies respectively.
// The third child gets 1 candy because it satisfies the above two conditions.
 

// Constraints:

// n == ratings.length
// 1 <= n <= 2 * 104
// 0 <= ratings[i] <= 2 * 104

function minCandies($ratings) {
    $n = count($ratings);
    $candies = array_fill(0, $n, 1); // Initialize candies array with all elements set to 1
    
    // Traverse from left to right
    for ($i = 1; $i < $n; $i++) {
        if ($ratings[$i] > $ratings[$i - 1]) {
            $candies[$i] = $candies[$i - 1] + 1;
        }
    }
    
    // Traverse from right to left
    for ($i = $n - 2; $i >= 0; $i--) {
        if ($ratings[$i] > $ratings[$i + 1]) {
            $candies[$i] = max($candies[$i], $candies[$i + 1] + 1);
        }
    }
    
    // Sum up candies array to get total minimum number of candies needed
    return array_sum($candies);
}

// Example usage:
$ratings1 = [1, 0, 2];
echo minCandies($ratings1); // Output: 5

$ratings2 = [1, 2, 2];
echo minCandies($ratings2); // Output: 4
