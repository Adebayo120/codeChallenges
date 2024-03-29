<?php

// Binary search follow divide and conquer rule whereby
// for every search we divide the list to reduce the number of traversal
// NOTE: Binary search only works on sorted list
// I have not tested but the implementation in here seems to be wrong
// you can just go through it to understand how you can use dive and concur to search for an element in a
// sorted array 

function iterativeImplementationOfBS(array $arr, int $high, int $needle): int
{
  $low = 0;
  $medium = 0;
  while($low < $high) {
    $medium = round(($low + $high) / 2);
    $midVal = $arr[$medium];
    if ($midVal == $needle) {
      return $medium;
    } elseif ($midVal < $needle) {
      $low = $medium + 1;
    } else {
      $high = $medium - 1;
    }
  }
  return -1;
}

function recursiveImplementationOfBS(array $arr, $high, int $needle, $low = 0)
{
  if ($low < $high) {
    return -1;
  }
  $medium = round(($low + $high) / 2);

  $midVal = $arr[$medium];
  
  if ($midVal == $needle) {
    return $medium;
  } elseif ($midVal < $needle) {
    $high = $medium - 1;
    recursiveImplementationOfBS($arr, $high, $needle, $low);
  } else {
    $low = $medium + 1;
    recursiveImplementationOfBS($arr, $high, $needle, $low);
  }
}