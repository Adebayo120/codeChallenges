<?php

// This is an algorithm to get the optimal to arrange a weighted binary tree
// with each tree having different search probability

function optimalBinarySearchTreeMinimumCost(
    int $numberOfItemsInTree, 
    array $listOfSuccessfulSearchProbability, 
    array $listOfUnsuccessfulSearchProbability
) {
    $weights = [];
    $costs = [];
    $roots = [];
    for ($difference=0; $difference <= $numberOfItemsInTree - 1; $difference++) {
        for ($i=0; $i < $numberOfItemsInTree - $difference; $i++) {
            $j = $i + $difference;
            $weights[$i][$j] = $listOfUnsuccessfulSearchProbability[$j];
            $costs[$i][$j] = 0;
            $roots[$i][$j] = 0;
            $min = 32767;
            for ($k=$i + 1; $k <= $j; $k++) {
                $weights[$i][$j] = $weights[$i][$j - 1] + $listOfSuccessfulSearchProbability[$j] + $listOfUnsuccessfulSearchProbability[$j];
                $q = $costs[$i][$k - 1] + $costs[$k][$j] + $weights[$i][$j];
                if ($q < $min) {
                    $min = $q;
                    $costs[$i][$j] = $q;
                    $roots[$i][$j] = $k;
                }
            }
        }
    }

    echo '<pre>';
    print_r($weights);
    echo '</pre>';

    echo '<pre>';
    print_r($costs);
    echo '</pre>';

    echo '<pre>';
    print_r($roots);
    echo '</pre>';
    return $costs[0][$numberOfItemsInTree - 1];
}

echo optimalBinarySearchTreeMinimumCost(5, [0, 3, 3, 1, 1], [2, 3, 1, 1, 1]);