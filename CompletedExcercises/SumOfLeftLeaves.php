<?php

// Find the sum of all leaves in a given binary tree
//
// Example:
//   3
//  / \
//  9 20
//    / \
//   15 7
//
// There are two left leaves in the binary tree, with 9 and 15 respectively. Return 24. 

// Time: 0(n);
// Space: O(H);
function sumOfLeftLeavesBFT1($root = null) {
  if (!$root){
    return 0;
  }
  $queue = [$root];
  $sumOfLeaves = 0;
  while(count($queue) > 0) {
    $current = array_shift($queue);
    if ($left = $current->left) {
      if (!$left->left && !$left->right) {
        $sumOfLeaves += (int)$left->data;
      }
      $queue[] = $left;
    }
    if ($right = $current->right) {
      $queue[] = $right;
    }
  }
  return $sumOfLeaves;
}

function sumOfLeftLeavesBFT2($root = null) {
  if (!$root){
    return 0;
  }
  $queue = [[$root, false]];
  $sumOfLeaves = 0;
  while(count($queue) > 0) {
    list($current, $isLeft) = array_shift($queue);
    if (!$current->left && !$current->right && $isLeft) {
      $sumOfLeaves += (int)$current->data;
    }
    if ($left = $current->left) {
      $queue[] = [$left, true];
    }
    if ($right = $current->right) {
      $queue[] = [$right, false];
    }
  }
  return $sumOfLeaves;
}

function sumOfLeftLeavesDFT($root = null) {
  return dfs($root, false);
}

function dfs($root, $isLeft) {
  if(!$root) {
    return 0;
  } 
  if (!$root->left && !$root->right) {
    return $isLeft ? $root->data : 0;
  }
  return dfs($root->left, true) + dfs($root->right, false);
}