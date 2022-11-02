<?php

// In a town, there are N people labelled from 1 to N. There is a rumor that one of these
// people is secretly the town judge.
//
// if the town judge exists, then:
//
// 1. The town judge trusts nobody.
// 2. Everybody (except for the town judge) trusts the town judge.
// 3. There is exactly one person that satisfies properties 1 and 2.
//
// You are given trust, an array pairs trust[i] = [a, b] representing that the person labeled "a"
// trusts the person labeled "b".
//
// if the town judge exists and can be identified, return the label of the town judge. Otherwise
// return -1
//
// Example 1:
// Input: N = 2, trust = [[1,2]]
// Output: 2
//
// Example 2:
// Input: N = 3, trust = [[1,3], [2,3]]
// Output: 3
//
// Example 3:
// Input: N = 3, trust = [[1,3], [2,3], [3,1]]
// Output: -1
//
// Example 4:
// Input: N = 3, trust = [[1,2], [2,3]]
// Output: -1
//
// Example 4:
// Input: N = 4, trust = [[1,3], [1,4], [2,3], [2,4], [4,3]]
// Output: 3

class Solution {
  function findJudge(int $n, array $trusts) {
    $trusted = [];
    foreach ($trusts as $key => $trust) {
      $trusted[$trust[0]] = isset($trusted[$trust[0]]) ? $trusted[$trust[0]] - 1 : -1;
      $trusted[$trust[1]] = isset($trusted[$trust[1]]) ? $trusted[$trust[1]] + 1 : 1;
    }

    foreach ($trusted as $person => $trustedCount) {
      if ($trustedCount === ($n - 1)) {
        return $person;
      }
    }
    return -1;
  }
}

$solution = new Solution();
$output = $solution->findJudge(2, [[1,2]]);

echo $output;