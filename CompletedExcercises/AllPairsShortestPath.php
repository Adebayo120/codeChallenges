<?php

require __DIR__ . '/ShortestPathToOtherVetices.php';

// The algorithm below help find the shortest path within all pairs
// in a graph

// Time Complexity 0(n^3)

function dijkstraAlgorithmAllPairsShortestPath(array $matrix)
{
    foreach ($matrix as $startPoint => $result) {
        $result = dijkstraAlgorithmShortestPathToOtherVertices($matrix, $startPoint);
        $matrix[$startPoint] = $result;
    }
    return $matrix;
}

function floydWarshallAlgorithm($matrix)
{
    foreach ($matrix as $middleVertex => $value) {
        // So we are taking each vertex as a middle vertex
        if (!$middleVertex) {
            continue;
        }
        $result = $matrix;
        foreach ($matrix as $rowIndex => $row) {
            // Since we want to check if using middleIndex between vertex is shorter
            // we don't want to read middle vertex row, because it will be a direct path and 
            // not a path through middleVertex
            if (!$rowIndex || $rowIndex === $middleVertex) {
                continue;
            }
            foreach ($row as $columnIndex => $columnValue) {
                // Since we want to check if using middleIndex between vertex is shorter
                // we don't want to read middle vertex column, because it will be a direct path and 
                // not a path through middleVertex, and also we don't want to read where columnIndex
                // is equal to rowIndex because its a self path, there will never be a path between
                // vertex 2 to vertex 2
                if (!$columnIndex || $columnIndex == $middleVertex || $columnIndex === $rowIndex) {
                    continue;
                }

                $matrix[$rowIndex][$columnIndex] = min(
                    $result[$rowIndex][$columnIndex], 
                    $result[$rowIndex][$middleVertex] + $result[$middleVertex][$columnIndex]
                );
            }
        }
    }
    return $matrix;
}
$infinite = 8765456789876543456789;

$matrix = [
    [0, 0, 0, 0, 0],
    [0, 0, 3, $infinite, 7],
    [0, 8, 0, 2, $infinite],
    [0, 5, $infinite, 0, 1],
    [0, 2, $infinite, $infinite, 0]
];

echo '<pre>';
print_r(floydWarshallAlgorithm($matrix));
echo '</pre>';

echo '<pre>';
print_r(dijkstraAlgorithmAllPairsShortestPath($matrix));
echo '</pre>';