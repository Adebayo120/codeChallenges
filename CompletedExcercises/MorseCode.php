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
    // Write your solution here
  }
}

$sol = new SolutionClass();
$output = $sol->solution("....");
sort($output);

// if(count($output) == 0)