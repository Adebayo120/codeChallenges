<?php

// The m_coloring function takes an adjacency matrix ($graph) 
// representing the undirected graph and an integer ($m) 
// representing the maximum number of colors to use. 
// It initializes all vertices to color 0 and then calls 
// the m_coloring_util function to perform the backtracking search. 
// The function returns true if a valid coloring is found, and false otherwise.

// The m_coloring_util function performs the backtracking search, 
// trying all possible colors for each vertex and recursively calling 
// itself for the next vertex. If a valid coloring is found, it returns 
// true; otherwise, it backtracks and tries a different color.

// The is_color_safe function checks if a given color is safe to use for a 
// given vertex by checking if any of its neighbors have the same color.

// Finally, the example usage code applies the algorithm to a sample 
// graph and prints the resulting coloring, if one is found.

// In summary, the time complexity of the backtracking algorithm for 
// the m-coloring decision problem is exponential in the worst case, 
// but is usually much lower in practice, and can be improved by 
// using heuristics or other optimization techniques.
// 0(n^m)

function m_coloring($graph, $m) {
    $num_vertices = count($graph);
    $colors = array_fill(0, $num_vertices, 0); // Initialize all vertices to color 0
    return m_coloring_util($graph, $colors, $m, 0); // Start with vertex 0
}

function m_coloring_util($graph, &$colors, $m, $v) {
    $num_vertices = count($graph);
    if ($v == $num_vertices) { // All vertices are colored
        return true;
    }
    for ($i = 1; $i <= $m; $i++) { // Try all colors
        if (is_color_safe($graph, $colors, $v, $i)) {
            $colors[$v] = $i; // Assign color
            if (m_coloring_util($graph, $colors, $m, $v + 1)) { // Recur for next vertex
                return true;
            }
            $colors[$v] = 0; // Backtrack
        }
    }
    return false; // No valid coloring found
}

function is_color_safe($graph, $colors, $v, $c) {
    foreach ($graph[$v] as $neighbor) {
        if ($colors[$neighbor] == $c) { // Check if neighbor has the same color
            return false;
        }
    }
    return true;
}

// Example usage:
$graph = array(
    array(0, 1, 1, 1),
    array(1, 0, 1, 0),
    array(1, 1, 0, 1),
    array(1, 0, 1, 0)
);
$m = 3; // Try to color the graph with 3 colors
if (m_coloring($graph, $m)) {
    echo "The graph can be colored with $m colors.\n";
} else {
    echo "The graph cannot be colored with $m colors.\n";
}
