<?php

// Given an array of strings words and a width maxWidth, format the text such that each line has exactly maxWidth characters and is fully (left and right) justified.

// You should pack your words in a greedy approach; that is, pack as many words as you can in each line. Pad extra spaces ' ' when necessary so that each line has exactly maxWidth characters.

// Extra spaces between words should be distributed as evenly as possible. If the number of spaces on a line does not divide evenly between words, the empty slots on the left will be assigned more spaces than the slots on the right.

// For the last line of text, it should be left-justified, and no extra space is inserted between words.

// Note:

// A word is defined as a character sequence consisting of non-space characters only.
// Each word's length is guaranteed to be greater than 0 and not exceed maxWidth.
// The input array words contains at least one word.
 

// Example 1:

// Input: words = ["This", "is", "an", "example", "of", "text", "justification."], maxWidth = 16
// Output:
// [
//    "This    is    an",
//    "example  of text",
//    "justification.  "
// ]
// Example 2:

// Input: words = ["What","must","be","acknowledgment","shall","be"], maxWidth = 16
// Output:
// [
//   "What   must   be",
//   "acknowledgment  ",
//   "shall be        "
// ]
// Explanation: Note that the last line is "shall be    " instead of "shall     be", because the last line must be left-justified instead of fully-justified.
// Note that the second line is also left-justified because it contains only one word.
// Example 3:

// Input: words = ["Science","is","what","we","understand","well","enough","to","explain","to","a","computer.","Art","is","everything","else","we","do"], maxWidth = 20
// Output:
// [
//   "Science  is  what we",
//   "understand      well",
//   "enough to explain to",
//   "a  computer.  Art is",
//   "everything  else  we",
//   "do                  "
// ]
 

// Constraints:

// 1 <= words.length <= 300
// 1 <= words[i].length <= 20
// words[i] consists of only English letters and symbols.
// 1 <= maxWidth <= 100
// words[i].length <= maxWidth

function fullJustify($words, $maxWidth) {
    $result = [];
    $line = [];
    $lineLength = 0;

    foreach ($words as $word) {
        // Check if adding the word would exceed maxWidth
        if ($lineLength + count($line) + strlen($word) > $maxWidth) {
            // Justify the current line and add it to the result
            $result[] = justifyLine($line, $lineLength, $maxWidth);
            // Start a new line with the current word
            $line = [$word];
            $lineLength = strlen($word);
        } else {
            // Add the word to the current line
            $line[] = $word;
            $lineLength += strlen($word);
        }
    }

    // Justify the last line and add it to the result
    $lastLine = implode(' ', $line);
    $lastLine .= str_repeat(' ', $maxWidth - strlen($lastLine));
    $result[] = $lastLine;

    return $result;
}

function justifyLine($line, $lineLength, $maxWidth) {
    $numGaps = count($line) - 1;
    $totalSpaces = $maxWidth - $lineLength;
    $spacesBetweenWords = $numGaps == 0 ? $totalSpaces : intval($totalSpaces / $numGaps);
    $extraSpaces = $numGaps == 0 ? 0 : $totalSpaces % $numGaps;

    $justifiedLine = '';
    foreach ($line as $word) {
        $justifiedLine .= $word;
        if ($numGaps > 0) {
            $justifiedLine .= str_repeat(' ', $spacesBetweenWords);
            if ($extraSpaces > 0) {
                $justifiedLine .= ' ';
                $extraSpaces--;
            }
            $numGaps--;
        }
    }
    return $justifiedLine;
}

// Test cases
$words1 = ["This", "is", "an", "example", "of", "text", "justification."];
$maxWidth1 = 16;
print_r(fullJustify($words1, $maxWidth1));

$words2 = ["What","must","be","acknowledgment","shall","be"];
$maxWidth2 = 16;
print_r(fullJustify($words2, $maxWidth2));

$words3 = ["Science","is","what","we","understand","well","enough","to","explain","to","a","computer.","Art","is","everything","else","we","do"];
$maxWidth3 = 20;
print_r(fullJustify($words3, $maxWidth3));
