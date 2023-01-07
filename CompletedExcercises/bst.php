<?php

// --- Directions
// 1) Implement the Node class to create
// a binary search tree.  The constructor
// should initialize values 'data', 'left',
// and 'right'.
// 2) Implement the 'insert' method for the
// Node class.  Insert should accept an argument
// 'data', then create an insert a new node
// at the appropriate location in the tree.
// 3) Implement the 'contains' method for the Node
// class.  Contains should accept a 'data' argument
// and return the Node in the tree with the same value.
// If the value isn't in the tree return null.

// NOTE
// Nodes at same depth can also be defined as nodes at same level
// Maximum depth of a tree is equivalent to the height of the tree
// Maximum number of nodes at a level = pow(2, $level) where $level is the current level
// Maximum number of nodes in a binary tree with height $h = pow(2, $h + 1) - 1;
// The height of a perfect binary tree with $n nodes = log($n + 1, 2) - 1;
// The height of a complete binary tree with $n nodes = floor(log($n, 2));
// Minimum height of a binary tree with $n nodes = log($n, 2)
// Maximum height of a binary tree with $n nodes = $n - 1
// Height of an empty tree is -1
// Height of tree with 1 node is 0
// You can get the index of an element left child with index $i using 2 * $i + 1 in a complete binary tree
// You can get the index of an element right child with index $i using 2 * $i + 2 in a complete binary tree

use Node as GlobalNode;

require_once 'Queue.php';

class Node
{
    /**
     * $data
     *
     * @var Node
     */
    public $data;

    /**
     * $left
     *
     * @var Node|null
     */
    public $left;

    /**
     * $right
     *
     * @var Node|null
     */
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    /**
     * insert
     *
     * @param mixed $data
     * @return void
     */
    public function insert($data)
    {
        if ($data <= $this->data && $this->left) {
            $this->left->insert($data);
        } elseif ($data <= $this->data && !$this->left) {
            $this->left = new Node($data);
        } elseif ($data > $this->data && $this->right) {
            $this->right->insert($data);
        } elseif ($data > $this->data && !$this->right) {
            $this->right = new Node($data);
        }
    }

    /**
     * contains
     *
     * @param [type] $data
     * @return Node|null
     */
    public function contains($data)
    {
        if ($data === $this->data) {
            return $this;
        } elseif ($data < $this->data && $this->left) {
            return $this->left->contains($data);
        } elseif ($data > $this->data && $this->right) {
            return $this->right->contains($data);
        }

        return null;
    }
}

function findMax(Node $root)
{
    if (!$root->data) {
        trigger_error('Node is empty');
        return null;
    }

    while ($root->right) {
        $root = $root->right;
    }
    return $root;
}

function findMaxRecursively(Node $node)
{
    if (!$node->data) {
        trigger_error('Please fill up node');
        return;
    }

    if (!$node->right) {
        return $node;
    }

    findMaxRecursively($node->right);
}

function findMin(Node $root)
{
    if (!$root->data) {
        trigger_error('Node is empty');

        return null;
    }

    while ($root->left) {
        $root = $root->left;
    }

    return $root;
}

function findMinRecursively(Node $node)
{
    if (!$node->data) {
        trigger_error('Please fill up node');
        return;
    }

    if (!$node->left) {
        return $node;
    }

    findMinRecursively($node->left);
}

function findHeight(?Node $root)
{
    if (!$root) {
        return -1;
    }

    $max = max(findHeight($root->left), findHeight($root->right));

    return  $max + 1;
}

// findHeight(5) = max(2, 1) + 1 = 3;
// findHeight(4) = max(1, -1) + 1 = 2;
// findHeight(3) = max(-1, -1) + 1 = 1;
// findHeight(6) = max(-1, -1) + 1 = 1;

function levelOrder(Node $root)
{
    if (!$root) {
        return;
    }

    $discoveredNodes = new Queue();

    $discoveredNodes->add($root);

    while (!$discoveredNodes->empty()) {
        $current = $discoveredNodes->remove();
        if ($left = $current->left) {
            $discoveredNodes->add($left);
        }
        if ($right = $current->right) {
            $discoveredNodes->add($right);
        }
    }
}

function preOrder(?Node $root)
{
    echo $root->data;
    preOrder($root->left);
    preOrder($root->right);
}

function inOrder(?Node $root)
{
    inOrder($root->left);
    echo $root->data;
    inOrder($root->right);
}

function postOrder(?Node $root)
{
    postOrder($root->left);
    postOrder($root->right);
    echo $root->data;
}

function isBST($root)
{
    isBSTUtil($root, log(0), log(-0));
}

function isBSTUtil(?Node $root, $minValue, $maxValue)
{
    if (!$root) {
        return true;
    }

    if (
        $root->data > $minValue
        && $root->data < $maxValue
        && isBSTUtil($root->left, $minValue, $root->data)
        && isBSTUtil($root->right, $root->data, $maxValue)
    ) {
        return true;
    } else {
        return false;
    }
}

function delete(?Node $root, $data)
{
    if (!$root) {
        return $root;
    }

    if ($data < $root->data) {
        $root->left = delete($root->left, $data);
    } elseif ($data > $root->data) {
        $root->right = delete($root->right, $data);
    } else {
        if (!$root->right && !$root->left) {
            $root = null;
        } elseif (!$root->left) {
            $root = $root->right;
        } elseif (!$root->right) {
            $root = $root->left;
        } else {
            $min = findMin($root->right);
            $root = $min;
            $root->right = delete($root->right, $min->data);
        }
    }

    return $root;
}

$node = new Node(7);
$node->insert(4);
$node->insert(9);
$node->insert(1);
$node->insert(6);
$node->insert(5);
$node->insert(7);
echo findHeight($node);
