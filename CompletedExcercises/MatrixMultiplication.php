<?php

// We can either use a recursive way to implement the multiplication of matrix algorithm
// or we use the normal for loop, on a normal matrix multiplication algorithm has a
// time complexity of n^3, so imagine having a recursive stack memory usage in n^3 time
// so that means recursive implementation takes more memory space i.e higher space complexity
// (stack memory usage), but we'll implement both
//
// This is an example of a matrix
// [
//     [1,   2,  3, 4],
//     [12, 13, 14, 5],
//     [11, 16, 15, 6],
//     [10,  9,  8, 7]
// ]
// [
//     [1,   2,  3, 4],
//     [12, 13, 14, 5],
//     [11, 16, 15, 6],
//     [10,  9,  8, 7]
// ]


/**
 * iterativeImplementationOfMM
 *
 * @param array $a
 * @param array $b
 * @param integer $n // total number of elements in each matrix, it should be a multiple of 2
 * @return void
 */
function iterativeImplementationOfMM(array $a, array $b, int $n)
{
  $result = [];
  for ($i=0; $i < $n; $i++) { 
    for ($j=0; $j < $n; $j++) { 
      $result[$i][$j] = 0;
      for ($k=0; $k < $n; $k++) { 
        $result[$i][$j] = $a[$i][$k] * $b[$k][$j];
      }
    }
  }
  return $result;
}

print_r(iterativeImplementationOfMM(
  [[1,2], [12, 13]], [[15, 16], [8,7]], 2
));

[
  [6,14],
  [104, 91],
];

// function recursiveImplementationOfMatrixMultiplication(array $a, array $b, int $n)
// {
//   if ()
// }