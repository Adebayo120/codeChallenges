<?php

// Write a function, hasPath that takes in an object representing 
// the adjacency list of a directed acyclic graph and two nodes (src, dst). 
// The function should return a boolean indicating whether or not there exists directed
// path between the source and destination nodes

function hasPath($graph, $src, $dst): bool
{
  foreach ($graph[$src] as $node) {
    if ($node == $dst) {
      return true;
    }
  }
  return false;
}

function hasPathDepthTraversalRecursive($graph, $src, $dst): bool
{
  if ($src == $dst) {
    return true;
  }

  foreach ($graph[$src] as $neighbor) {
    if (hasPathDepthTraversalRecursive($graph, $neighbor, $dst)) {
      return true;
    }
  }
  return false;
}

function hasPathBreadthTraversalRecursive($graph, $src, $dst): bool
{
  $queue = [$src];

  while (count($queue)) {
    $current = array_shift($queue);
    if ($current == $dst) {
      return true;
    }
    foreach ($graph[$current] as $key => $neighbor) {
      array_push($queue, $neighbor);
    }
  }

  return false;
}
