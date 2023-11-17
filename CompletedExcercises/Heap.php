<?php

class Heap
{
  private array $heap;

  public function __construct(array $arr, int $count)
  {
    $this->heap = $arr;

    $this->createHeap($count);
  }

  public function createHeap($count): array
  {
    for ($i=0; $i < $count; $i++) {
      $this->rearrangeArrayElements($i);
    }
    return $this->heap;
  }

  public function getHeap()
  {
    return $this->heap;
  }

  public function setHeap(array $arr)
  {
    $this->heap = $arr;

    $this->createHeap(count($arr));
  }

  public function insert(int $needle)
  {
    $count = array_push($this->heap, $needle);
  
    return $this->rearrangeArrayElements($count - 1);
  }
  
  public function delete($lastHeapIndex = null)
  {
    $removedElement = $this->heap[0];
  
    $lastIndex = $lastHeapIndex != null ? $lastHeapIndex : count($this->heap) - 1;
  
    $this->heap[0] = $this->heap[$lastIndex];

    $this->heap[$lastIndex] = $removedElement;

    if ($lastHeapIndex === null) {
      unset($this->heap[$lastIndex]);
    }

    $this->heap = $this->rearrangeArrayElementsAfterDeletion(0, $lastIndex - 1);
  
    return $removedElement;
  }

  protected function rearrangeArrayElements(int $index): array
  {
    if (!$index) {
      return $this->heap;
    }

    $parentIndex = floor(($index + 1)/2) - 1;

    $element = $this->heap[$index];

    $parent = $this->heap[$parentIndex];

    if ($element > $parent) {
      $this->heap[$index] = $parent;

      $this->heap[$parentIndex] = $element;

      return $this->rearrangeArrayElements($parentIndex);
    }

    return $this->heap;
  }

  protected function rearrangeArrayElementsAfterDeletion($index, $lastIndex)
  {
    $leftChildIndex = (($index + 1) * 2) - 1;

    $rightChildIndex = ($index + 1) * 2;

    $maxChildIndex = ($leftChildIndex <= $lastIndex && isset($this->heap[$leftChildIndex]))? $leftChildIndex : null;

    $maxChildIndex = ($rightChildIndex <= $lastIndex && isset($this->heap[$rightChildIndex])) ? $this->getMaxIndex($leftChildIndex, $rightChildIndex) : $maxChildIndex;

    if (!$maxChildIndex) {
      return $this->heap;
    }

    $element = $this->heap[$index];

    $maxChild = $this->heap[$maxChildIndex];

    if ($element < $maxChild) {
      $this->heap[$index] = $maxChild;

      $this->heap[$maxChildIndex] = $element;

      return $this->rearrangeArrayElementsAfterDeletion($maxChildIndex, $lastIndex);
    }

    return $this->heap;
  }

  private function getMaxIndex($leftChildIndex, $rightChildIndex)
  {
    $maxChildIndex = $leftChildIndex;
    if ($this->heap[$rightChildIndex] > $this->heap[$leftChildIndex]) {
      $maxChildIndex = $rightChildIndex;
    }
    return $maxChildIndex;
  }
}

// $heap = new Heap([50,30,20,15,10,8,16], 7);

// $heap->delete();

// print_r($heap->getHeap());