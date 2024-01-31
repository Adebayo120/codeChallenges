<?php

require __DIR__ . '/Heap.php';

function heapSort(array $arr)
{
  $totalElementsInArray = count($arr);

  $heap = new Heap($arr, $totalElementsInArray);

  $lastIndex = $totalElementsInArray - 1;

  for ($i=$lastIndex; $i >= 1; $i--) {
    $heap->delete($i);
    print_r($heap->getHeap());
    echo '<br>';
  }

  print_r($heap->getHeap());
}

heapSort([18,20,15,12,10,40,25]);
// function dd($variable){
//   echo '<pre>';
//   die(var_dump($variable));
//   echo '</pre>';
// }

// $prices = array( 'Tires'=>100, 'Oil'=>10, 'Spark Plugs'=>4 );

// dd($prices);

// echo "<br><br>I am here";