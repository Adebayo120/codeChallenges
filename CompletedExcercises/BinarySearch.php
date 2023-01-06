<?php

// Binary search follow divide and conquer rule whereby
// for every search we divide the list to reduce the number of traversal
// NOTE: Binary search only works on sorted list


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
      $high = $medium - 1;
    } else {
      $low = $medium + 1;
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