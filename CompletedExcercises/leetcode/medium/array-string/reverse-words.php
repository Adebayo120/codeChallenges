<?php

function reverseWords($s) {
    // Split the string into an array of words
    $words = explode(" ", $s);
    
    // Remove empty elements and reverse the array
    $words = array_reverse(array_filter($words, function ($str) {
        return $str || $str == 0;
    }));
    
    // Join the array elements into a single string
    return implode(" ", $words);
}

// Test cases
$s1 = "the   0  sky is blue";
echo reverseWords($s1) . "\n";  // Output: "blue is sky the"

$s2 = "  hello world  ";
echo reverseWords($s2) . "\n";  // Output: "world hello"

$s3 = "a good   example";
echo reverseWords($s3) . "\n";  // Output: "example good a"
