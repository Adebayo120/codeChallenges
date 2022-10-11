<?php

// Write a function, undirectedPath that takes in an array of edges for an undirected graph
// and two nodes (nodeA, nodeB). The function should return a boolean indicating whether or not 
// there exist a path between nodeA and nodeB.

// Complexity
// Time = 0(e)
// Space = 0(n)

function undirectedPath($edges, $nodeA, $nodeB): bool
{
  $graph = buildGraph($edges);

  return hasPath($graph, $nodeA, $nodeB, []);
}

function buildGraph($edges): array
{
  $graph = [];
  foreach ($edges as $key => $edge) {
    list($nodeA, $nodeB) = $edge;
    if (!isset($graph[$nodeA])) {
      $graph[$nodeA] = [];
    }
    if (!isset($graph[$nodeB])) {
      $graph[$nodeB] = [];
    }
    array_push($graph[$nodeA], $nodeB);

    array_push($graph[$nodeB], $nodeA);
  }
  return $graph;
}

function hasPath($graph, $src, $dst, $visited): bool
{
  if ($src == $dst) {
    return true;
  }

  if (isset($visited[$src])) {
    return false;
  }

  $visited[$src] = true;

  foreach ($graph[$src] as $key => $neighbor) {
    if (hasPath($graph, $neighbor, $dst, $visited)) {
      return true;
    }
  }

  return false;
}
