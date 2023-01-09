<?php

function dijkstraAlgorithm(array $matrix, int $startPoint)
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

print_r(dijkstraAlgorithm([
  [0,0,0,0,0,0,0],
  [0,0,50,45,10,0,0],
  [0,0,0,10,15,0,0],
  [0,0,0,0,0,30,0],
  [0,10,0,0,0,15,0],
  [0,0,20,35,0,0,0],
  [0,0,0,0,0,3,0]
], 1));