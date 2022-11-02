<?php

// Given a string S, return the "reversed" string where all characters
// that are not a letter stay in the same place, and all letters
// reverse their positions.
//
// Example 1:
// Input: "ab-cd"
// Output: "dc-ba"
//
// Example 2:
// Input: "a-bC-dEf=ghlj!!"
// Output: "j-lh-gfE=dCba!!"


class Solution{
  function reverseOnlyLetters($s) {
    $result = '';
    $stack = [];
    $stringInArray = str_split($s);
    foreach ($stringInArray as $key => $char) {
      if (ctype_alpha($char)) {
        $stack[] = $char;
      }
    }
    foreach ($stringInArray as $key => $char) {
      if (ctype_alpha($char)) {
        $result .= array_pop($stack);
      } else {
        $result .= $char;
      }
    }

    return $result;
  }
}

$solution = new Solution();

$output = $solution->reverseOnlyLetters("a-bC-dEf=ghlj!!");

echo $output;