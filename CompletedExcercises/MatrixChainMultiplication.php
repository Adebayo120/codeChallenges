<?php

// This is algorithm is used to find the minimum cost to
// to multiply matrixes, we can also derive through it, a parenthesis 
// illustration of which matrix should be taken first to multiply with others
//
// This algorithm uses the following formula to get each matrix multiplication cost
// C[i][j] = C[i][k] + C[k+1][j] + d[i - 1] * d[k] * d[j];



function matrixChainMultiplication(int $numberOfMatrixes, array $dimensions)
{
    $costOfMultiplication = [];
    $ksForMinimumCosts = [];
    for ($differences=1; $differences < $numberOfMatrixes-1; $differences++) {
        for ($i=1; $i < $numberOfMatrixes - $differences; $i++) {
            $j = $i + $differences;
            $min = 32767; // max int value for 32 bit.
            for ($k=$i; $k < $j ; $k++) {
                $q = getCostOfMultiplication($costOfMultiplication, $i, $k) + 
                                                getCostOfMultiplication($costOfMultiplication, $k+1, $j) + 
                                                $dimensions[$i - 1] * $dimensions[$k] * $dimensions[$j];
                if ($q < $min) {
                    $min = $q;
                    $ksForMinimumCosts[$i][$j] = $k;
                }
            }
            $costOfMultiplication[$i][$j] = $min;
        }
    }
    
    return $costOfMultiplication[1][$numberOfMatrixes - 1];
}

function getCostOfMultiplication(array $costOfMultiplication, int $i, int $j): int
{
    return !isset($costOfMultiplication[$i][$j]) ? 0 : $costOfMultiplication[$i][$j];
}

echo matrixChainMultiplication(5, [5, 4, 6, 2, 7]);