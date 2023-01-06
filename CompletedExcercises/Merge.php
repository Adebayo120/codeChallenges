<?php

// The following algorithm is used to merged two or more sorted
// array into one sorted array list
// Time complexity = 0(n + m);

function merge(array $a, array $b, int $m, int $n): array
{
  $c = [];
  $i = $j = $k = 0;
  while ($i < $m && $j < $n) {
    if ($a[$i] < $b[$j]) {
      $c[$k++] = $a[$i++];
    } else {
      $c[$k++] = $b[$j++];
    }
  }

  for (; $i < $m; $i++) { 
    $c[$k++] = $a[$i++];
  }

  for (; $j < $n; $j++) { 
    $c[$k++] = $b[$j];
  }

  return $c;
}

print_r(\merge([2, 8, 15, 18], [5, 9, 12, 17, 19, 25, 30], 4, 7));