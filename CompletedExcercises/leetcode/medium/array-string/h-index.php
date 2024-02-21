<?php


function hIndex($citations) {
    $n = count($citations);
    sort($citations); // Sort the citations array in non-decreasing order
    
    for ($i = 0; $i < $n; $i++) {
        // Find the largest index i such that citations[i] >= i + 1
        $hhh = $citations[$n - $i - 1];
        if ($hhh < $i + 1) {
            return $i;
        }
    }
    
    return $n;
}

// Example usage:
// $citations1 = [3, 0, 6, 1, 5];
// echo "Output: " . hIndex($citations1) . "\n";
$citations1 = [1, 1, 1, 1, 1, 2, 2, 2, 2,2, 2, 2,2, 2,2 ,2 ,2 ,2];
echo "Output: " . hIndex($citations1) . "\n";

// $citations2 = [1, 3, 1];
// echo "Output: " . hIndex($citations2) . "\n";
