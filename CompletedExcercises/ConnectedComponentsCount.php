<?php

// Write a function, ConnectedComponentsCount that takes in the adjacency list of
// an undirected graph, The function should return the number of connected components
// within the graph

// complexity
// Time = 0(e)
// Space = 0(n)

function ConnectedComponentsCount($graph): int
{
  $visited = [];
  $count = 0;
  foreach ($graph as $node => $neighbors) {
    if (explore($graph, $node, $visited)) {
      $count += 1;
    }
  }
  return $count;
}

function explore($graph, $node, $visited): bool
{
  if ($visited[$node]) {
    return false;
  }
  $visited[$node] = true;

  foreach ($graph[$node] as $key => $neighbor) {
    explore($graph, $neighbor, $visited);
  }

  return true;
}
