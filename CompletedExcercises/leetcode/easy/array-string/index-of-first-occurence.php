<?php

// Given two strings needle and haystack, return the index of the first occurrence of needle in haystack, or -1 if needle is not part of haystack.

// Example 1:

// Input: haystack = "sadbutsad", needle = "sad"
// Output: 0
// Explanation: "sad" occurs at index 0 and 6.
// The first occurrence is at index 0, so we return 0.
// Example 2:

// Input: haystack = "leetcode", needle = "leeto"
// Output: -1
// Explanation: "leeto" did not occur in "leetcode", so we return -1.
 

// Constraints:

// 1 <= haystack.length, needle.length <= 104
// haystack and needle consist of only lowercase English characters.

function findFirstOccurrence($haystack, $needle) {
    $haystackLen = strlen($haystack);
    $needleLen = strlen($needle);

    // Edge case: if needle is empty, return 0
    if ($needleLen == 0) {
        return 0;
    }

    // Iterate through the haystack
    for ($i = 0; $i <= $haystackLen - $needleLen; $i++) {
        // Check if the substring starting at index $i matches the needle
        if (substr($haystack, $i, $needleLen) == $needle) {
            return $i; // Return the starting index of the match
        }
    }

    // If no match is found, return -1
    return -1;
}

// Test cases
echo findFirstOccurrence("sadbutsad", "sad") . "\n"; // Output: 0
echo findFirstOccurrence("leetcode", "leeto") . "\n"; // Output: -1


