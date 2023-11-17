<?php

class Graph
{
    private array $adjacentVertices = [];

    public int $nil = -1;

    public int $discoveryTime = 0;

    public array $visited = [];

    public array $arrayOfEachVertexDiscoveryTime = [];

    public array $lowestReachableDiscoveryTime = [];

    public array $parent = [];

    public array $articulationPoints = [];

    public function __construct(private int $v) {}

    public function addEdge($v, $w)
    {
        $this->adjacentVertices[$v][] = $w;
        $this->adjacentVertices[$w][] = $v;
    }

    public function APUtil($source)
    {
        $children = 0;
        
        $this->visited[$source] = true;

        $this->discoveryTime++;

        $this->arrayOfEachVertexDiscoveryTime[$source] = $this->discoveryTime;

        $this->lowestReachableDiscoveryTime[$source] = $this->discoveryTime;

        foreach ($this->adjacentVertices[$source] as $adjacentVertex) {
            if (!$this->visited[$adjacentVertex]) {
                $children++;

                $this->parent[$adjacentVertex] = $source;

                $this->APUtil($adjacentVertex);

                $this->lowestReachableDiscoveryTime[$source] = min($this->lowestReachableDiscoveryTime[$source], $this->lowestReachableDiscoveryTime[$adjacentVertex]);

                if ($this->parent[$source] == $this->nil && $children > 1) {
                    $this->articulationPoints[$source] = true;
                }

                if ($this->parent[$source] != $this->nil && $this->lowestReachableDiscoveryTime[$adjacentVertex] >= $this->arrayOfEachVertexDiscoveryTime[$source]) {
                    $this->articulationPoints[$source] = true;
                }
            } elseif ($adjacentVertex != $this->parent[$source]) {
                $this->lowestReachableDiscoveryTime[$source] = min($this->lowestReachableDiscoveryTime[$source], $this->arrayOfEachVertexDiscoveryTime[$adjacentVertex]);
            }
        }
    }

    public function AP()
    {
        for ($i=0; $i < $this->v; $i++) {
            $this->parent[$i] = $this->nil;
            $this->visited[$i] = false;
            $this->articulationPoints[$i] = false;
        }


        for ($i=0; $i < $this->v; $i++) { 
            if ($this->visited[$i] == false) {
                $this->APUtil($i);
            }
        }

        for ($i=0; $i < $this->v; $i++) {
            if ($this->articulationPoints[$i] == true) {
                echo "{$i} ";
            }
        }
    }
}

$g1 = new Graph(5);
$g1->addEdge(1, 0);
$g1->addEdge(0, 2);
$g1->addEdge(2, 1);
$g1->addEdge(0, 3);
$g1->addEdge(3, 4);
$g1->AP();


// function findArticulationPoint(
//     array $graph, 
//     int $source,
//     array $visited,
//     array $disc, 
//     array $low, 
//     array $parent,
//     array $articulationPoints,
//     int $discoveryTime
// ) {
//     list(
//         $visited,
//         $disc,
//         $low,
//         $parent,
//         $articulationPoints
//     ) = findArticulationPointAction(
//         $graph, 
//         $source, 
//         $visited,
//         $disc,
//         $low,
//         $parent,
//         $articulationPoints,
//         $discoveryTime
//     );

//     return $articulationPoints;
// }

// function findArticulationPointAction(
//     array $graph, 
//     int $source,
//     array $visited,
//     array $disc, 
//     array $low, 
//     array $parent,
//     array $articulationPoints,
//     int $discoveryTime
// ) {
    
//     $visited[$source] = true;
    
//     $disc[$source] = $low[$source] = ++$discoveryTime;

//     $children = 0;
//     foreach ($graph[$source] as $key => $v) {
//         if (!isset($visited[$v])) {
//             $children++;
//             $parent[$v] = $source;
//             list(
//                 $visited,
//                 $disc,
//                 $low,
//                 $parent,
//                 $articulationPoints
//             ) = findArticulationPoint(
//                 $graph, 
//                 $v, 
//                 $visited,
//                 $disc,
//                 $low,
//                 $parent,
//                 $articulationPoints,
//                 $discoveryTime
//             );

//             $low[$source] = min( $low[$source], $low[$v] );

//             if (!isset($parent[$source]) && $children > 1) {
//                 $articulationPoints[$source] = $source;
//             }

//             if (isset($parent[$source]) && $low[$v] >= $disc[$source]) {
//                 $articulationPoints[$source] = $source;
//             }
//         } elseif($v !== $parent[$source]) {
//             $low[$source] = min($low[$source], $disc[$v]);
//         }
//     }

//     return [
//         $visited,
//         $disc,
//         $low,
//         $parent,
//         $articulationPoints
//     ];
// }

// print_r(findArticulationPoint(
//     [
//         1 => [2, 4],
//         2 => [1, 3],
//         3 => [2, 4, 5, 6],
//         4 => [1, 3],
//         5 => [3, 6],
//         6 => [3, 5]
//     ], 1, [], [], [], [], [], 0
// ));

// print_r(findArticulationPoint(
//     [
//         0 => [1, 2, 3],
//         1 => [0, 4, 2],
//         2 => [0, 1],
//         3 => [0, 4],
//         4 => [3]
//     ], 1, [], [], [], [], [], 0
// ));