<?php

// A string "str" contains a list of color names that are separated by a single space

// Colors in "str" are mixed up but each color has its original position at the end
// of the color name, positions are 1-indexed.
//
// For example, the string "black1 gold2 white3" can be arranged to "gold2 black1 white3" or "gold2 white3 black1" 
// "str" contains only up to 9 colors.
//
// Given a "str" with rearranged colors, sort the colors to the original state and return
// the original "str"
//
// Example 1:
// Input: str = "red2 blue5 black4 green1 gold3"
// Output: "green red gold black blue"
//
// Example 2:
// Input: str = "gold2 black1 white3"
// Outout: "black gold white
//
// Constraints:
// 2 <= str.length <= 200
// "str" consists of multiple color name, spaces, and digits from 1 to 9.
// "str" contains up to 9 colors names.
// "str" contains at least one color name.
// Color names in the "str" in are separated by a single space.
// "str" contains no leading or trailing spaces


class SolutionClass {
  function solution($s) {
    $arr = explode(" ", $s);
    $result = [];
    foreach ($arr as $key => $colorWithIndex) {
      $index = substr($colorWithIndex, -1);
      $color = rtrim($colorWithIndex, $index);
      $result[(int) $index] = $color;
    }
    ksort($result);

    return implode(" ", $result);
  }
}

$sol = new SolutionClass();

$output = $sol->solution("gold2 black1 white3");

echo $output;
