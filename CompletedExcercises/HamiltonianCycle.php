<?php

$num_vertices = 4;

$graph = array(
    array(0, 1, 0, 1),
    array(1, 0, 1, 1),
    array(0, 1, 0, 1),
    array(1, 1, 1, 0)
);

// function isSafe($v, $graph, $path, $pos) {
//     if ($graph[$path[$pos - 1]][$v] == 0) {
//         return false;
//     }
//     for ($i = 0; $i < $pos; $i++) {
//         if ($path[$i] == $v) {
//             return false;
//         }
//     }
//     return true;
// }

function printSolution($path) {
    for ($i = 0; $i < count($path); $i++) {
        echo $path[$i] . " ";
    }
    echo "\n";
}

// function hamCycleUtil($graph, $path, $pos) {
//     if ($pos == count($graph)) {
//         if ($graph[$path[$pos - 1]][$path[0]] == 1) {
//             printSolution($path);
//             return false;
//         } else {
//             return false;
//         }
//     }

//     for ($v = 1; $v < count($graph); $v++) {
//         if (isSafe($v, $graph, $path, $pos)) {
//             $path[$pos] = $v;
//             if (hamCycleUtil($graph, $path, $pos + 1) == false) {
//                 $path[$pos] = -1;
//             }
//         }
//     }
// }

// function hamCycle($graph) {
//     $path = array();
//     for ($i = 0; $i < count($graph); $i++) {
//         $path[$i] = -1;
//     }
//     $path[0] = 0;
//     hamCycleUtil($graph, $path, 1);
// }

// I think this is a more cleaner implementation
function hamCycle(array $graph) {
    $cycle = [];
    hamCycleUtil($graph, $cycle, 0);
}

function hamCycleUtil($graph, &$cycle, $source) {
    $cycle[$source] = $source;

    foreach ($graph[$source] as $vertex => $isConnected) {
        if (!$isConnected) {
            continue;
        }

        if (isset($cycle[$vertex])) {
            if ($vertex === 0 && count($cycle) === count($graph)) {
                printSolution($cycle);
            }

            continue;
        }

        hamCycleUtil($graph, $cycle, $vertex);

        array_pop($cycle);
    }
}

echo "All solutions:\n";
hamCycle($graph);

?>
