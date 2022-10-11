<?php

// Write a function, largestComponent that takes in the adjacency 
// list of an undirected graph. The function should return the size of the largest
// connected component in the graph.

function largestComponent($graph): int
{
    $visited = [];
    $largest = 0;
    foreach ($graph as $node => $neighbor) {
        $numberOfNodesInComponent = numberOfNodesInComponent($graph, $node, 0, $visited);
        $largest =  $numberOfNodesInComponent > $largest ? $numberOfNodesInComponent : $largest;
    }
    return $largest;
}

function numberOfNodesInComponent($graph, $node, $visited): int
{
    if (isset($visited[$node])) {
        return 0;
    }

    $visited[$node] = true;

    $numberOfNodesInComponent = 1;

    foreach ($graph[$node] as $key => $neighbor) {
        $numberOfNodesInComponent += numberOfNodesInComponent($graph, $neighbor, $visited);
    }
    return $numberOfNodesInComponent;
}
