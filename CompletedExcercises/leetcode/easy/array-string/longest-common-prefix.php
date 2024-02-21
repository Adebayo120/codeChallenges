<?php

// Write a function to find the longest common prefix string amongst an array of strings.

// If there is no common prefix, return an empty string "".


// Example 1:
// Input: strs = ["flower","flow","flight"]
// Output: "fl"
// Example 2:

// Input: strs = ["dog","racecar","car"]
// Output: ""
// Explanation: There is no common prefix among the input strings.

// Constraints:

// 1 <= strs.length <= 200
// 0 <= strs[i].length <= 200
// strs[i] consists of only lowercase English letters.

function longestCommonPrefix($strs) {
    // If the input array is empty, return an empty string
    if (empty($strs)) {
        return "";
    }

    // Initialize the common prefix as the first string in the array
    $prefix = $strs[0];

    // Iterate through the strings in the array
    for ($i = 1; $i < count($strs); $i++) {
        // Iterate through the characters of the current string and compare them with the prefix
        $j = 0;
        while ($j < strlen($prefix) && $j < strlen($strs[$i]) && $prefix[$j] == $strs[$i][$j]) {
            $j++;
        }

        // Update the common prefix to the substring up to the index of the mismatch
        $prefix = substr($prefix, 0, $j);

        // If the prefix becomes empty, there is no common prefix, so return an empty string
        if (empty($prefix)) {
            return "";
        }
    }

    // Return the longest common prefix found
    return $prefix;
}

// Test cases
$strs1 = ["flower", "flow", "flight"];
echo longestCommonPrefix($strs1) . "\n";  // Output: "fl"

$strs2 = ["dog", "racecar", "car"];
echo longestCommonPrefix($strs2) . "\n";  // Output: ""
"pA S KipYyS0 GV9 7W8r q4 uM2P eLl sBmxVa1Eh lKw y5j02N M6FyWJ LFTT Aa vPKksW LDtzIOvWLt LKg3a 11lASBGl 0 i7 YgHsUKFd zIiIXd GsaSwLnOs glfOAYah40 TZH p L3jQ78 qM VBLWqIJXRi kT xmhQMptz qEjVjL UmNRei hQs 6eq 9v yY wUb6 en J kX WZJ0M3Z c W9Mqf7cep 15uAqvNl Jp nKCtoS8 aQ7iiTy OUVxX1zsUL KkkRVXY7 k0b9Ts QcspISw z o Rep6lU ZaYYygdFe sQ gtUGyw"
"pA S KipYyS0 GV9 7W8r q4 uM2P eLl sBmxVa1Eh lKw y5j02N M6FyWJ LFTT Aa vPKksW LDtzIOvWLt LKg3a 11lASBGl 0 i7 YgHsUKFd zIiIXd GsaSwLnOs glfOAYah40 TZH p L3jQ78 qM VBLWqIJXRi kT xmhQMptz qEjVjL UmNRei hQs 6eq 9v yY wUb6 en J kX WZJ0M3Z c W9Mqf7cep 15uAqvNl Jp nKCtoS8 aQ7iiTy OUVxX1zsUL KkkRVXY7 k0b9Ts QcspISw z o Rep6lU ZaYYygdFe sQ gtUGyw"