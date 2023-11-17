<?php

// Given an array of size N and an integer 'target'. Find the indices(i,j) of 
// two numbers such that their sum is equal to target. (i != j) you can assume that
// there will be exactly one solution
//
// sample input
// N = 5
// arr = [7,6,3,8,2]
// target = 14
// Sample output
// 1, 3

// Time Complexity = 0(n);
// Space Complexity = 0(n);

// The basic idea in the functionality is to make the array an associative array 
// with value as index and the index as value, then you just need to subject target from the present 
// array value and check if its existence in you hashMap/Dictionary
function twoSum(array $arr, int $target): string
{
    $hashMap = [];
    foreach ($arr as $key => $value) {
        $num = $target - $value;
        if (isset($hashMap[$num])) {
            return "{$key}, {$hashMap[$num]}";
        }
        $hashMap[$value] = $key;
    }
    return "";
}

echo twoSum([7,6,3,8,2], 14);