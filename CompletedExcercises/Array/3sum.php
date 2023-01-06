<?php

// Given an array and a target. You need to find all the triplets(a[i], a[j], a[k])
// such that a[i]+a[j]+a[k] = target and i!=j!=k
// Note solution must contain unique triplets
//
// Sample input
// N = 7
// arr = [7, -6, 3, 8, -1, 8, -11]
// target = 0
// sample output
// [-11, 3, 8], [-6, -1, 7]
//

// Time Complexity = 0(n);
// Space Complexity = 0(n);
function threeSum(array $arr, int $target)
{
    sort($arr);
    $lastIndex = count($arr) - 1;
    foreach ($arr as $key => $value) {
        if ($key === 0 || $value != $arr[$key - 1]) {
            $j = $key + 1;
            $k = $lastIndex;
            $targ = $target - $value;
            while ($j < $k) {
                $currentTotal = $arr[$j] + $arr[$k];
                if ($currentTotal === $targ) {
                    echo "[{$value}, {$arr[$j]}, {$arr[$k]}] ";
                    while ($j < $k && $arr[$j] === $arr[$j + 1]) {
                        $j++;
                    }
                    while ($j < $k && $arr[$k] === $arr[$k - 1]) {
                        $k--;
                    }
                    $j++;
                    $k--;
                } elseif ($currentTotal < $targ) {
                    $j++;
                } else {
                    $k--;
                }
            }
        }
    }
}

threeSum([7, -6, 3, 8, -1, 8, -11], 0);