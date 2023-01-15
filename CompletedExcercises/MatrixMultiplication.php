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
function iterativeImplementationOfMM(array $a, array $b, int $n): array
{
  $result = [];
  for ($firstMatrixRowIndex=0; $firstMatrixRowIndex < $n; $firstMatrixRowIndex++) { 
    for ($secondMatrixColumnIndex=0; $secondMatrixColumnIndex < $n; $secondMatrixColumnIndex++) {
      $result[$firstMatrixRowIndex][$secondMatrixColumnIndex] = 0;
      for ($k=0; $k < $n; $k++) {
        $result[$firstMatrixRowIndex][$secondMatrixColumnIndex] += $a[$firstMatrixRowIndex][$k] * $b[$k][$secondMatrixColumnIndex];
      }
    }
  }
  return $result;
}

print_r(iterativeImplementationOfMM(
  [[1,2], [12, 13]], [[15, 16], [8,7]], 2
));

// function recursiveImplementationOfMatrixMultiplication(array $a, array $b, int $n)
// {
//   if ($n <= 2) {

//   } else {
//     $mid = $n / 2;

//     recursiveImplementationOfMatrixMultiplication(array_slice($a, 0, 2), )
//   }
// }