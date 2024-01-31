<?php

// Given a string "morsecode" that contains a list of "." and "-".
// You are allowed to make one move and replace two 
// consecutive ".." with "--".
//
// Return all possible morse codes you can get after a single move
// you doy to the string "morsecode".
//
// If you cannot do any moves, just return an empty array.
//
// Example 1:
// Input: morsecode = "...."
// Output: ["--..", ".--.", "..--"]
//
// Constraints
// 1 <= morsecode.length <= 500
// morsecode[i] is either "." or "-".

class SolutionClass{
  function solution($morsecode) {
    $len = strlen($morsecode) - 1;

    for ($i=0; $i < $len; $i++) {
      $result = $morsecode;
      $result[$i] = '-';
      $result[$i + 1] = '-';
      echo $result;
      echo '<br>';
    }
  }
}

$sol = new SolutionClass();
$output = $sol->solution("....");