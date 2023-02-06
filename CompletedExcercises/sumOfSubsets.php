<?php


// This algorithm has a time complexity of 0(2^n)

// function subset_sum($arr, $n, $sum, $temp, $i) {
//     if ($sum == 0) {
//         echo implode(" + ", $temp), "\n";
//         return;
//     }

//     if ($i == $n || $sum - $arr[$i] < 0) {
//         return;
//     }

//     $temp[] = $arr[$i];

//     // depth wise traversal
//     subset_sum($arr, $n, $sum - $arr[$i], $temp, $i + 1);

//     array_pop($temp);

//     // breadth wise traversal
//     subset_sum($arr, $n, $sum, $temp, $i + 1);
// }

function subset_sum_2($arr, $targetSum, $sum, $k,array $listOfNodesSummedUp)
{
    if ($sum == $targetSum) {
        echo implode(" + ", $listOfNodesSummedUp), "\n";
        echo "<br>";
        return;
    }

    for ($i=$k; $i < count($arr); $i++) {
        $listOfNodesSummedUp[] = $arr[$i];
        subset_sum_2($arr, $targetSum, $sum + $arr[$i], $i + 1,$listOfNodesSummedUp);
        array_pop($listOfNodesSummedUp);
    }
}

$arr = array(1,2,3,4);
$sum = 4;
// $arr = array(3, 34, 4, 12, 5, 2);
// $sum = 9;
$n = count($arr);

echo "All subsets whose elements add up to $sum:\n";
echo "<br>";

// subset_sum($arr, $n, $sum, [], 0);
subset_sum_2($arr, $sum, 0, 0, []);


?>
