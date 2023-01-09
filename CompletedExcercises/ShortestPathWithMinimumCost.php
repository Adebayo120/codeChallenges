<?php

// multistage graph is a directed weighted graph
// Time complexity is 0(n^2)

// function shortestPathWithMinimumCost(array $graph, $startVertex, $endVertex)
// {
//   $cost = [];
//   $d = [];
//   for ($vertex=$endVertex; $vertex >= $startVertex ; $vertex--) {
//     $vertexEdges = $graph[$vertex];
//     $cost[$vertex] = 0;
//     $d[$vertex] = $vertex;
//     foreach ($vertexEdges as $key => $edge) {
//       $totalCostForEdge = $cost[$edge[0]] + $edge[1];
//       if (!$key || $totalCostForEdge < $cost[$vertex]) {
//         $cost[$vertex] = $totalCostForEdge;
//         $d[$vertex] = $edge[0];
//       }
//     }
//   }

//   $vertex = $startVertex;
//   $path = "";
//   while ($vertex != $endVertex) {
//     $path .= "$vertex ";
//     $vertex = $d[$vertex];
//   }
//   echo $path . $endVertex;
// }

// shortestPathWithMinimumCost([
//   1 => [[2, 9], [3, 7], [4, 3], [5, 2]],
//   2 => [[6, 4], [7, 2], [8, 1]],
//   3 => [[6, 2], [7, 7]],
//   4 => [[8, 11]],
//   5 => [[7, 11], [8, 8]],
//   6 => [[9, 6],[10, 5]],
//   7 => [[9, 4], [10, 3]],
//   8 => [[10, 5], [11, 6]],
//   9 => [[12, 4]],
//   10 => [[12, 2]],
//   11 => [[12, 5]],
//   12 => [],
// ], 1, 12);

function shortestPathWithMinimumCost(array $matrix, int $n, int $stages)
{
  $cost[$n] = 0;
  $d = [];

  for ($i=$n - 1; $i >= 1 ; $i--) {
    $min =878768678;
    for ($k=$i + 1; $k <= $n ; $k++) { 
      if ($matrix[$i][$k] && $matrix[$i][$k] + $cost[$k] < $min) {
        $min = $matrix[$i][$k] + $cost[$k];
        $d[$i] = $k;
      }
    }
    $cost[$i] = $min;
  }
  $p = [1 => 1, $stages => $n];

  for ($i=2; $i <= $stages ; $i++) { 
    $p[$i] = $d[$p[$i - 1]];
  }
  print_r($p);
}

shortestPathWithMinimumCost([
  [0,0,0,0,0,0,0,0,0],
  [0,0,2,1,3,0,0,0,0],
  [0,0,0,0,0,2,3,0,0],
  [0,0,0,0,0,6,7,0,0],
  [0,0,0,0,0,6,8,9,0],
  [0,0,0,0,0,0,0,0,6],
  [0,0,0,0,0,0,0,0,4],
  [0,0,0,0,0,0,0,0,5],
  [0,0,0,0,0,0,0,0,0]
], 8, 4);