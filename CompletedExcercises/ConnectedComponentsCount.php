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

[
  0 => [1, 2, 3],
  1 => [0, 2],
  2 => [0, 1],
  3 => [0, 4],
  4 => [3]
];

// Simple self explanatory depth wise traversal of a graph
// foreach ($graph as $vertex => $adjacentVertices) {
//   adjacentVerticesTraversal($graph, $adjacentVertices);
// }

// function adjacentVerticesTraversal($graph, $adjacentVertices) {
//   foreach ($adjacentVertices as $key => $vertex) {
//     adjacentVerticesTraversal($graph, $graph[$vertex]);
//   }
// }