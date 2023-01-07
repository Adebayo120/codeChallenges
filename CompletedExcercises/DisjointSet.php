<?php

class DisjointSet
{
    private array $vertices = [];

    public function isThereACycleInGraph(array $edges): string
    {
        foreach ($edges as $key => $edge) {
            $firstVertex = $edge[0];
            $secondVertex = $edge[1];
            if (!isset($this->vertices[$firstVertex]) && !isset($this->vertices[$secondVertex])) {
                $this->vertices[$firstVertex] = -2;
                $this->vertices[$secondVertex] = $firstVertex;
            } elseif (isset($this->vertices[$firstVertex]) && isset($this->vertices[$secondVertex])) {
                $firstVertexParent = $this->findParent($firstVertex);
                $secondVertexParent = $this->findParent($secondVertex);
                if ($firstVertexParent == $secondVertexParent) {
                    return "true";
                }
                $this->union($firstVertexParent, $secondVertexParent);
            } elseif (isset($this->vertices[$firstVertex])) {
                $parent = $this->findParent($firstVertex);
                $this->vertices[$secondVertex] = $parent;
                $this->vertices[$parent] += -1;
            } elseif (isset($this->vertices[$secondVertex])) {
                $parent = $this->findParent($secondVertex);
                $this->vertices[$firstVertex] = $parent;
                $this->vertices[$parent] += -1;
            }
        }
        return "false";
    }

    private function findParent(int $vertex): int
    {        
        while ($this->vertices[$vertex] > 0) {
            $vertex = $this->vertices[$vertex];
        }

        return $vertex;
    }

    private function union(int $firstVertex, int $secondVertex)
    {
        $parent = $firstVertex;
        $child = $secondVertex;
        if ($secondVertex < $firstVertex) {
            $parent = $secondVertex;
            $child = $secondVertex;
        }

        $this->vertices[$parent] = $this->vertices[$firstVertex] + $this->vertices[$secondVertex];
        $this->vertices[$child] = $parent;
    }
}


echo (new DisjointSet)->isThereACycleInGraph([
    [1, 2],
    [3, 4],
    [5, 6],
    [7, 8],
    [2, 4],
    [2, 5],
    [1, 3],
    [6, 8],
    [5, 7]
]);