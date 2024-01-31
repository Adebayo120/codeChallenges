<?php
// You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, and two integers m and n, representing the number of elements in nums1 and nums2 respectively.

// Merge nums1 and nums2 into a single array sorted in non-decreasing order.

// The final sorted array should not be returned by the function, but instead be stored inside the array nums1. To accommodate this, nums1 has a length of m + n, where the first m elements denote the elements that should be merged, and the last n elements are set to 0 and should be ignored. nums2 has a length of n.

 

// Example 1:

// Input: nums1 = [1,2,3,0,0,0], m = 3, nums2 = [2,5,6], n = 3
// Output: [1,2,2,3,5,6]
// Explanation: The arrays we are merging are [1,2,3] and [2,5,6].
// The result of the merge is [1,2,2,3,5,6] with the underlined elements coming from nums1.
// Example 2:

// Input: nums1 = [1], m = 1, nums2 = [], n = 0
// Output: [1]
// Explanation: The arrays we are merging are [1] and [].
// The result of the merge is [1].
// Example 3:

// Input: nums1 = [0], m = 0, nums2 = [1], n = 1
// Output: [1]
// Explanation: The arrays we are merging are [] and [1].
// The result of the merge is [1].
// Note that because m = 0, there are no elements in nums1. The 0 is only there to ensure the merge result can fit in nums1.
 

// Constraints:

// nums1.length == m + n
// nums2.length == n
// 0 <= m, n <= 200
// 1 <= m + n <= 200
// -109 <= nums1[i], nums2[j] <= 109
 

// Follow up: Can you come up with an algorithm that runs in O(m + n) time?

function merge(&$nums1, $m, $nums2, $n) {
    $i = $m - 1; // index for nums1
    $j = $n - 1; // index for nums2
    $k = $m + $n - 1; // index for the merged array
    
    while ($i >= 0 && $j >= 0) {
        // Compare elements from the end of both arrays
        if ($nums1[$i] > $nums2[$j]) {
            $nums1[$k--] = $nums1[$i--];
        } else {
            $nums1[$k--] = $nums2[$j--];
        }
    }
    
    // If there are remaining elements in nums2
    while ($j >= 0) {
        $nums1[$k--] = $nums2[$j--];
    }
}

// Example usage:
// $nums1 = [1, 2, 3, 0, 0, 0];
// $m = 3;
// $nums2 = [2, 5, 6];
// $n = 3;
$nums1 = [100, 200];
$m = 2;
$nums2 = [2, 5];
$n = 2;

merge($nums1, $m, $nums2, $n);
print_r($nums1); // Output: [1, 2, 2, 3, 5, 6]

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $j=0;

        $length = count($nums1);
        if($m == 0){
            $nums1 = [];

            foreach ($nums2 as $num2) {
                $nums1[] = $num2;
            }

            sort($nums1);
        } else {
            for($i=0; $i< $length; $i++){
                if ($i<$m){
                    $nums1[] = $nums1[$i]; 
                } else {
                    $nums1[] = $nums2[$j];
                    $j++;
                }
            }
        
            for($i=0; $i<$length; $i++){
                unset($nums1[$i]);
            }

            sort($nums1);
        }
    }
}
$element = new Solution;
$nums1 = [];
$m = 0;
$nums2 = [1];
$n = 1;
$element->merge($nums1, $m, $nums2, $n);
print_r($nums1);
