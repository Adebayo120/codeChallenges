<?php

function heapSort(array $arr)
{
  $totalElementsInArray = count($arr);

  $arr = createHeap($arr, $totalElementsInArray);

  $lastIndex = $totalElementsInArray - 1;

  for ($i=$lastIndex; $i >= 1; $i--) {
    $element = $arr[$i];

    $arr[$i] = $arr[0];

    $arr[0] = $element;

    $arr = rearrangeArrayElementsAfterDeletion($arr, 0, $i - 1);
  }

  print_r($arr);
}

function createHeap(array $arr, $count): array
{
  for ($i=0; $i < $count; $i++) {
    $arr = rearrangeArrayElements($arr, $i);
  }

  return $arr;
}

function rearrangeArrayElements(array $arr, int $index): array
{
  if (!$index) {
    return $arr;
  }

  $parentIndex = floor(($index + 1)/2) - 1;

  $element = $arr[$index];

  $parent = $arr[$parentIndex];

  if ($element > $parent) {
    $arr[$index] = $parent;

    $arr[$parentIndex] = $element;

    return rearrangeArrayElements($arr, $parentIndex);
  }

  return $arr;
}

function rearrangeArrayElementsAfterDeletion(array $arr, $index, $lastIndex)
{
  $leftChildIndex = (($index + 1) * 2) - 1;

  $rightChildIndex = ($index + 1) * 2;

  $maxChildIndex = ($leftChildIndex <= $lastIndex && isset($arr[$leftChildIndex]))? $leftChildIndex : null;

  $maxChildIndex = ($rightChildIndex <= $lastIndex && isset($arr[$rightChildIndex])) ? getMaxIndex($arr, $leftChildIndex, $rightChildIndex) : $maxChildIndex;

  if (!$maxChildIndex) {
    return $arr;
  }

  $element = $arr[$index];

  $maxChild = $arr[$maxChildIndex];

  if ($element < $maxChild) {
    $arr[$index] = $maxChild;

    $arr[$maxChildIndex] = $element;

    return rearrangeArrayElementsAfterDeletion($arr, $maxChildIndex, $lastIndex);
  }
  return $arr;
}

function getMaxIndex($arr, $leftChildIndex, $rightChildIndex)
{
  $maxChildIndex = $leftChildIndex;
  if ($arr[$rightChildIndex] > $arr[$leftChildIndex]) {
    $maxChildIndex = $rightChildIndex;
  }
  return $maxChildIndex;
}

heapSort([18,20,15,12,10,40,25]);