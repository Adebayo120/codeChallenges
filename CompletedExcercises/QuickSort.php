<?php

// This is a recursive algorithm that follows the divide and conquer principle
// The fact that it's name is QuickSort doesn't mean its the fastest sort algorithm
// https://www.guru99.com/quicksort-in-javascript.html

class QuickSort
{
    public function __construct(protected array $arr = [])
    {}
    
    public function quickSort($left, $right)
    {
        if (count($this->arr) > 1) {
            $index = $this->partition($left, $right);
            if ($left < $index - 1) {
                $this->quickSort($left, $index -1);
            }
            if ($index < $right) {
                $this->quickSort($index, $right);
            }
        }
        return $this->arr;
    }
    
    private function partition($left, $right)
    {
        $pivot = $this->arr[floor(($left + $right) / 2)];
        $i = $left;
        $j = $right;
        while ($i <= $j) {
            while ($this->arr[$i] < $pivot) {
                $i++;
            };
    
            while ($this->arr[$j] > $pivot) {
                $j--;
            };
    
            if ($i <= $j) {
                $this->swap($i, $j);
                $i++;
                $j--;
            }
        }
        return $i;
    }
    
    private function swap($index1, $index2)
    {
        $firstElement = $this->arr[$index1];
        $this->arr[$index1] = $this->arr[$index2];
        $this->arr[$index2] = $firstElement;
    }
}

$quickSort = new QuickSort([5,3,7,6,2,9]);

print_r($quickSort->quickSort(0, 5));