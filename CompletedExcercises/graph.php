<?php

$graph = [
  "a" => ['c', 'b'],
  "b" => ['d'],
  "c" => ['e'],
  "d" => ['f'],
  "e" => [],
  "f" => [],
];

function depthFirstTraversal(array $graph, string $source)
{
  $stack = [$source];
  while (count($stack) > 0) {
    $current = array_pop($stack);
    echo $current;
    echo "<br>";
    foreach ($graph[$current] as $key => $child) {
      array_push($stack, $child);
    }
  }
}

function depthFirstTraversalRecursive(array $graph, string $source)
{
  echo $source;
  echo "<br>";
  foreach ($graph[$source] as $key => $child) {
    depthFirstTraversalRecursive($graph, $child);
  }
}

// Breath first traversal can't be run recursively, because recursive
// actions uses stack under the hood meanwhile traversal can only use queue
function breadthFirstTraversal(array $graph, string $source)
{
  $queue = [$source];
  while (count($queue) > 0) {
    $current = array_shift($queue);
    echo $current;
    echo "<br>";
    foreach ($graph[$current] as $key => $child) {
      array_push($queue, $child);
    }
  }
}
// depthFirstTraversalRecursive($graph, "a");

breadthFirstTraversal($graph, "a");
