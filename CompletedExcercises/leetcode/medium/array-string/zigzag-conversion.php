<?php

// The string "PAYPALISHIRING" is written in a zigzag pattern on a given number of rows like this: (you may want to display this pattern in a fixed font for better legibility)

// P   A   H   N
// A P L S I I G
// Y   I   R
// And then read line by line: "PAHNAPLSIIGYIR"

// Write the code that will take a string and make this conversion given a number of rows:

// string convert(string s, int numRows);
 

// Example 1:

// Input: s = "PAYPALISHIRING", numRows = 3
// Output: "PAHNAPLSIIGYIR"
// Example 2:

// Input: s = "PAYPALISHIRING", numRows = 4
// Output: "PINALSIGYAHRPI"
// Explanation:
// P     I    N
// A   L S  I G
// Y A   H R
// P     I
// Example 3:

// Input: s = "A", numRows = 1
// Output: "A"
 

// Constraints:

// 1 <= s.length <= 1000
// s consists of English letters (lower-case and upper-case), ',' and '.'.
// 1 <= numRows <= 1000

function convert($s, $numRows) {
    if ($numRows == 1) {
        return $s; // No conversion needed if numRows is 1
    }

    $rows = array_fill(0, $numRows, ""); // Initialize an array to hold characters for each row
    $curRow = 0; // Initialize current row
    $direction = 1; // Direction of movement (1 for down, -1 for up)

    // Iterate through the characters of the input string
    for ($i = 0; $i < strlen($s); $i++) {
        $rows[$curRow] .= $s[$i]; // Append current character to the corresponding row
        // Update the current row and direction of movement
        $curRow += $direction;
        if ($curRow == 0 || $curRow == $numRows - 1) {
            $direction *= -1;
        }
    }

    // Concatenate the rows to form the zigzag pattern
    return implode("", $rows);
}

// Test cases
echo convert("PAYPALISHIRING", 3) . "\n"; // Output: "PAHNAPLSIIGYIR"
echo convert("PAYPALISHIRING", 4) . "\n"; // Output: "PINALSIGYAHRPI"
echo convert("A", 1) . "\n"; // Output: "A"
