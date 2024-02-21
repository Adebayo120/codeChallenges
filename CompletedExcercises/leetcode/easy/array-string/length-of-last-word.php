<?php

// Given a string s consisting of words and spaces, return the length of the last word in the string.

// A word is a maximal 
// substring
//  consisting of non-space characters only.

// Example 1:

// Input: s = "Hello World"
// Output: 5
// Explanation: The last word is "World" with length 5.
// Example 2:

// Input: s = "   fly me   to   the moon  "
// Output: 4
// Explanation: The last word is "moon" with length 4.
// Example 3:

// Input: s = "luffy is still joyboy"
// Output: 6
// Explanation: The last word is "joyboy" with length 6.
 

// Constraints:

// 1 <= s.length <= 104
// s consists of only English letters and spaces ' '.
// There will be at least one word in s.

function lengthOfLastWord($s) {
    // Trim any trailing spaces
    $s = rtrim($s);

    // Initialize the length counter
    $length = 0;

    // Iterate through the string from the end
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        // If we encounter a space, return the length
        if ($s[$i] === ' ') {
            return $length;
        }
        // Otherwise, increment the length counter
        $length++;
    }

    // If no space is encountered, return the length of the entire string
    return $length;
}

// Test cases
$s1 = "Hello World";
echo lengthOfLastWord($s1) . "\n";  // Output: 5

$s2 = "   fly me   to   the moon  ";
echo lengthOfLastWord($s2) . "\n";  // Output: 4

$s3 = "luffy is still joyboy";
echo lengthOfLastWord($s3) . "\n";  // Output: 6
