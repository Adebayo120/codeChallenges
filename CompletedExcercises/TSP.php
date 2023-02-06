<?php


// formula = g(i, S) = min(Cik + g(k, s - {k}))
function TSPDynamicApproach(int $startPoint, array $graph, array $subsets)
{
    return TSPDynamicApproachAction(
        $startPoint,
        $graph,
        $startPoint,
        $subsets
    );
}

function TSPDynamicApproachAction(int $startPoint, array $graph, int $i, array $subsets)
{
    if (empty($subsets)) {
        return $graph[$i][$startPoint];
    }

    $min = 233444222222;
    foreach ($subsets as $key => $k) {
        $arr = $subsets;
        unset($arr[$key]);
        $cost = $graph[$i][$k] + TSPDynamicApproachAction(
            $startPoint,
            $graph,
            $k,
            $arr
        );
        if ($cost < $min) {
            $min = $cost;
        }
    }

    return $min;
}

echo TSPDynamicApproach(1, [
    [0, 0, 0, 0, 0],
    [0, 0, 10, 15, 20],
    [0, 5, 0, 9, 10],
    [0, 6, 13, 0, 12],
    [0, 8, 8, 9, 0]
], [2, 3, 4]);