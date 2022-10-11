<?php

// Write a function, islandCount, that takes in a grid containing Ws and Ls
// representing water and land, the function should return the number of
// islands on the grid. An island is a vertically or horizontally connected regions on land.

function islandCount(array $grid): int
{
  $numberOfIslands = 0;

  $visited = [];
  foreach ($grid as $row => $arrayOfNodesInARow) {
    foreach ($arrayOfNodesInARow as $column => $node) {
      if (explore($grid, $row, $column, $node, $visited) == true) {
        $numberOfIslands++;
      };
    }
  }

  return $numberOfIslands;
}

function explore(
  array $grid, 
  int $row, 
  int $column, 
  string $node, 
  array $visited
): bool {
  $pos = "{$row}, {$column}";
  $rowInbound = 0 <= $row && $row < count($grid);
  $columnInbound = 0 <= $column && $column < count($grid[0]);

  if (
    isset($visited[$pos]) ||
    !$rowInbound ||
    !$columnInbound ||
    $node == "w"
  ) {
    return false;
  }

  $visited[$pos] = true;

  explore($grid, $row + 1, $column, $visited);
  explore($grid, $row - 1, $column, $visited);
  explore($grid, $row, $column + 1, $visited);
  explore($grid, $row, $column - 1, $visited);
}