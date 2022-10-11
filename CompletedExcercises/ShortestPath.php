<?php

// Write a function shortestPath, that takes in an array of edges for an undirected
// graph and two nodes (nodeA, nodeB). The function should return the length of 
// the shortest path between A and B. Consider the length as the number of edges
// in the path, not the number of nodes, if there is no path between A and B return -1

function shortestPath($edges, $nodeA, $nodeB): int
{
    $graph = buildGraph($edges);

    $queue = [[$nodeA, 0]];
    $visited = [$nodeA => true];

    while (!count($queue)) {
        $current = array_shift($queue);
        list($currentNode, $currentNodeNumberOfEdges) = $current;
        if ($currentNode == $nodeB) {
            return $currentNodeNumberOfEdges;
        }
        foreach ($graph[$currentNode] as $key => $neighbor) {
            if (!isset($visited[$neighbor])) {
                array_push($queue, [$neighbor, $currentNodeNumberOfEdges + 1]);
                $visited[$neighbor] = true;
            }
        }
    }

    return -1;
}

function buildGraph($edges): array
{
    $graph = [];

    foreach ($edges as $key => $edge) {
        list($nodeA, $nodeB) = $edge;

        if (!isset($graph[$nodeA])) {
            $graph[$nodeA] = [];
        }

        if (!isset($graph[$nodeB])) {
            $graph[$nodeB] = [];
        }

        $graph[$nodeA][] = $nodeB;

        $graph[$nodeB][] = $nodeA;
    }

    return $graph;
}
