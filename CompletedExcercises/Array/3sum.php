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

// The basic idea is to sort the values in the array and loop through each one of them, and each loop
// you take the first element after the current value and the last value in the array and check if the addition
// of any of them is equal to (target -  current iteration value), then we base on the fact that they are arrange and check if the addition of
// the first element after the current value and the last value in the array is greater than the current iteration additional value, that means
// the last element is too big, so move to the next smaller value which should be the next value by its left(since they are sorted) and if otherwise
// the first element after the current value need to be a bigger value which should be the value after it, while we continue this we should get the right
// combination if not there is no combination then
// We need to note that even after finding a combination we just need to check increment/decrement both the first element after the current value and the last value
// because there might be other combination and beware of duplicate values, because it might end up returning a combination more than once
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