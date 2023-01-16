<?php

// Time complexity = 0(n^2)
function dijkstraAlgorithmShortestPathToOtherVertices(array $matrix, int $startPoint)
{
  $result = $matrix[$startPoint];
  $arr = $matrix[$startPoint];
  while (count($arr)) {
    $vertex = getMinValueIndex($arr);
    if ($vertex < 0 ) {
      return $result;
    }
    $relations = $matrix[$vertex];
    foreach ($relations as $relationVertex => $relationCost) {
      if (!$relationCost || 
          $relationVertex == $startPoint || 
          !isset($arr[$relationVertex])) {
        continue;
      }
      $newVertexCost = $result[$vertex] + $relationCost;
      if (!$result[$relationVertex] || $newVertexCost < $result[$relationVertex]) {
        $result[$relationVertex] = $newVertexCost;
        $arr[$relationVertex] = $newVertexCost;
      }
    }
    unset($arr[$vertex]);  
  }
  return $result;
}

// Time Complexity best case scenario 0(n^2), worst case scenario 0(n^3)
function bellmanFordAlgorithmShortestPathToOtherVertices(array $matrix, int $startPoint)
{
  $count = count($matrix);

  $result = fillArrayWithMaxValue($startPoint, $count);

  for ($i=1; $i < $count - 1; $i++) { 
    for ($row=1; $row < $count; $row++) { 
      for ($column=1; $column < $count; $column++) {
        if (!$distance = $matrix[$row][$column]) {
          continue;
        }

        $newDistance = $result[$row] + $distance;
        if ($newDistance < $result[$column]) {
          $result[$column] = $newDistance;
        }
      }
    }
  }
  return $result;
}

function fillArrayWithMaxValue(int $startPoint, int $count ): array
{
  $result = [];
  for ($i=1; $i < $count; $i++) {
    $result[$i] = $i == $startPoint ? 0 : 32767;
  }
  return $result;
}

function getMinValueIndex(array $arr)
{
  $min = 94899382938028023;
  $index = -1;
  foreach ($arr as $key => $value) {
    if ($value && $value < $min) {
      $min = $value;
      $index = $key;
    }
  }
  return $index;
}
echo '<pre>';
print_r(dijkstraAlgorithmShortestPathToOtherVertices([
  [0,0,0,0,0,0,0],
  [0,0,50,45,10,0,0],
  [0,0,0,10,15,0,0],
  [0,0,0,0,0,30,0],
  [0,10,0,0,0,15,0],
  [0,0,20,35,0,0,0],
  [0,0,0,0,0,3,0]
], 1));
echo '</pre>';
echo '<pre>';
print_r(bellmanFordAlgorithmShortestPathToOtherVertices([
  [0,0,0,0,0,0,0],
  [0,0,50,45,10,0,0],
  [0,0,0,10,15,0,0],
  [0,0,0,0,0,30,0],
  [0,10,0,0,0,15,0],
  [0,0,20,35,0,0,0],
  [0,0,0,0,0,3,0]
], 1));
echo '</pre>';
