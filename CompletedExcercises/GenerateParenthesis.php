<?php

// Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.
//
//
// Example 1:
//
// Input: n = 3
// Output: ["((()))","(()())","(())()","()(())","()()()"]
// Example 2:
//
// Input: n = 1
// Output: ["()"]
// 
//
// Constraints:

// 1 <= n <= 8

class Solution {

  protected array $result = [];

  protected int $length = 0;

  protected array $stack = [];

  function generateParenthesis($n) {
    $this->length = $n;

    $this->backTrack(0, 0);

    return $this->result;
  }
  
  function backTrack($openN, $closedN) {
    if (
      $openN == $closedN && 
      $openN == $this->length &&
      $closedN == $this->length
    ) {
      $this->result[] = implode("", $this->stack);
      return;
    }
  
    if ($openN < $this->length) {
      $this->stack[] = "(";
      $this->backTrack($openN + 1, $closedN);
      array_pop($this->stack);
    }
  
    if ($closedN < $openN) {
      $this->stack[] = ")";
      $this->backTrack($openN, $closedN + 1);
      array_pop($this->stack);
    }
  }

}

$solution = new Solution();

echo '['. implode(',', $solution->generateParenthesis(3)). ']';

 