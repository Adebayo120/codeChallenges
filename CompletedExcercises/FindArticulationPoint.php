<?php

// class Graph
// {
//     public $v;

//     public $adj;

//     public $nil;

//     public $time;

//     public function __construct(int $v)
//     {
//         $this->v = $v;
//         $this->adj = [];
//         $this->nil = -1;
//         $this->time = 0;
//         for ($i=0; $i < $v; ++$i) { 
//             $this->adj[$i] = []; 
//         }
//     }

//     public function addEdge($v, $w)
//     {
//         $this->adj[$v][] = $w;
//         $this->adj[$w][] = $v;
//     }

//     public function APUtil($u, $visited, $disc, $low, $parent, $ap)
//     {
//         $children = 0;
        
//         $visited[$u] = true;

//         $disc[$u] = $low[$u] = ++$this->time;

//         foreach ($this->adj[$u] as $key => $v) {
//             if (!$visited[$v]) {
//                 $children++;
//                 $parent[$v] = $u;
//                 $this->APUtil($v, $visited, $disc, $low, $parent, $ap);

//                 $low[$u] = min($low[$u], $low[$v]);

//                 if ($parent[$u] == $this->nil && $children > 1) {
//                     $ap[$u] = true;
//                 }

//                 if ($parent[$u] != $this->nil && $low($v) >= $disc[$u]) {
//                     $ap[$u] = true;
//                 }
//             } elseif ($v != $parent[$u]) {
//                 $low[$u] = min($low[$u], $disc[$v]);
//             }
//         }
//     }

//     public function AP()
//     {
//         $visited = [];
//         $disc = [];
//         $low = [];
//         $parent = [];
//         $ap = [];

//         for ($i=0; $i < $this->v; $i++) { 
//             $parent[$i] = $this->nil;
//             $visited[$i] = false;
//             $ap[$i] = false;
//         }

//         for ($i=0; $i < $this->v; $i++) { 
//             $parent[$i] = $this->nil;
//             $visited[$i] = false;
//             $ap[$i] = false;
//         }

//         for ($i=0; $i < $this->v; $i++) { 
//             if ($visited[$i] == false) {
//                 $this->APUtil($i, $visited, $disc, $low, $parent, $ap);
//             }
//         }

//         for ($i=0; $i < $this->v; $i++) { 
//             if ($visited[$i] == false) {
//                 $this->APUtil($i, $visited, $disc, $low, $parent, $ap);
//             }
//         }
//         return $ap;
//     }
// }

// $g1 = new Graph(5);
// $g1->addEdge(1, 0);
// $g1->addEdge(0, 2);
// $g1->addEdge(2, 1);
// $g1->addEdge(0, 3);
// $g1->addEdge(3, 4);
// $g1->AP();


function findArticulationPoint(
    array $graph, 
    int $u,
    array $visited,
    array $disc, 
    array $low, 
    array $parent,
    array $ap,
    int $time
) {
    list(
        $visited,
        $disc,
        $low,
        $parent,
        $ap
    ) = findArticulationPoint(
        $graph, 
        $u, 
        $visited,
        $disc,
        $low,
        $parent,
        $ap,
        $time
    );

    return $ap;
}

function findArticulationPointAction(
    array $graph, 
    int $u,
    array $visited,
    array $disc, 
    array $low, 
    array $parent,
    array $ap,
    int $time
) {
    
    $visited[$u] = true;
    
    $disc[$u] = $low[$u] = ++$time;

    $children = 0;
    foreach ($graph[$u] as $key => $v) {
        if (!isset($visited[$v])) {
            $children++;
            $parent[$v] = $u;
            list(
                $visited,
                $disc,
                $low,
                $parent,
                $ap
            ) = findArticulationPoint(
                $graph, 
                $v, 
                $visited,
                $disc,
                $low,
                $parent,
                $ap,
                $time
            );

            $low[$u] = min( $low[$u], $low[$v] );

            if (!isset($parent[$u]) && $children > 1) {
                $ap[$u] = $u;
            }

            if (isset($parent[$u]) && $low[$v] >= $disc[$u]) {
                $ap[$u] = $u;
            }
        } elseif($v !== $parent[$u]) {
            $low[$u] = min($low[$u], $disc[$v]);
        }
    }

    return [
        $visited,
        $disc,
        $low,
        $parent,
        $ap
    ];
}

print_r(findArticulationPoint(
    [
        1 => [2, 4],
        2 => [1, 3],
        3 => [2, 4, 5, 6],
        4 => [1, 3],
        5 => [3, 6],
        6 => [3, 5]
    ], 1, [], [], [], [], [], 0
));

// print_r(findArticulationPoint(
//     [
//         0 => [1, 2, 3],
//         1 => [0, 4, 2],
//         2 => [0, 1],
//         3 => [0, 4],
//         4 => [3]
//     ], 1, [], [], [], [], [], 0
// ));