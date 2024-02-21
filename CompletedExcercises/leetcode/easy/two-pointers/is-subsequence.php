<?php

// Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

// A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) of the characters without disturbing the relative positions of the remaining characters. (i.e., "ace" is a subsequence of "abcde" while "aec" is not).

 

// Example 1:

// Input: s = "abc", t = "ahbgdc"
// Output: true
// Example 2:

// Input: s = "axc", t = "ahbgdc"
// Output: false
 

// Constraints:

// 0 <= s.length <= 100
// 0 <= t.length <= 104
// s and t consist only of lowercase English letters.
 

// Follow up: Suppose there are lots of incoming s, say s1, s2, ..., sk where k >= 109, and you want to check one by one to see if t has its subsequence. In this scenario, how would you change your code?

function isSubsequence($s, $t) {
    $sLength = strlen($s);
    $tLength = strlen($t);
    
    $sPointer = 0;
    $tPointer = 0;
    
    while ($sPointer < $sLength && $tPointer < $tLength) {
        if ($s[$sPointer] === $t[$tPointer]) {
            $sPointer++;
        }
        $tPointer++;
    }
    
    // If we've reached the end of s, it means s is a subsequence of t
    return $sPointer === $sLength;
}

// Test cases
$s1 = "abc";
$t1 = "ahbgdc";
echo isSubsequence($s1, $t1) ? "true\n" : "false\n"; // Output: true

$s2 = "axc";
$t2 = "ahbgdc";
echo isSubsequence($s2, $t2) ? "true\n" : "false\n"; // Output: false
