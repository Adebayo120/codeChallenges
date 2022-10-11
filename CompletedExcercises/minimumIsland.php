<?php

// Write a function minimumIsland, that takes in a grid containing
// Ws and Ls. W represents water and L represents land. The function should return
// the size of the smallest island. An island is a vertically or horizontally
// connected region of island 

function minimumIsland(array $grid) : int
{
  $visited = [];
  $minimumIslandLandCount = 0;
  foreach ($grid as $row => $nodesInARow) {
    foreach ($nodesInARow as $column => $node) {
      $numberOfLandsInIsland = explore($grid, $row, $column, $node, $visited);

      if ($numberOfLandsInIsland > 0  && $numberOfLandsInIsland < $minimumIslandLandCount) {
        $minimumIslandLandCount = $numberOfLandsInIsland;
      }
    }
  }
  return $minimumIslandLandCount;
}

function explore(array $grid, int $row, int $column, string $node, array $visited): int
{
  $pos = "{$row}, {$column}";
  $rowInbound = 0 <= $row && $row < count($grid);
  $columnInbound = 0 <= $column && $column < count($grid[0]);

  if (
    $visited[$pos] ||
    $node == "w" ||
    !$rowInbound ||
    !$columnInbound
  ) {
    return 0;
  }

  $visited[$pos] = true;

  $numberOfLands = 1;

  $numberOfLands += explore($grid, $row + 1, $column, $node, $visited);
  $numberOfLands += explore($grid, $row - 1, $column, $node, $visited);
  $numberOfLands += explore($grid, $row, $column + 1, $node, $visited);
  $numberOfLands += explore($grid, $row, $column - 1, $node, $visited);

  return $numberOfLands;
}