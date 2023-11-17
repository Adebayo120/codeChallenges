<?php

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
}

function depthFirstValues(?Node $node)
{
    if (!$node->data) {
        return [];
    }

    $stack = [$node->data];

    $valuesIinDepthOrder = [];
    
    while (count($stack)) {
      $current = array_pop($stack);

      $valuesIinDepthOrder[] = $current;

      if ($left = $current->left ) {
          $stack[] = $left;
      }

      if ($right = $current->right ) {
          $stack[] = $right;
      }
    }
    
    return $valuesIinDepthOrder;
}

function breadthFirstValues(?Node $node): array
{
    if (!$node->data) {
        return [];
    }

    $queue = [$node->data];

    $valuesIinBreadthOrder = [];
    
    while (count($queue)) {
        $current = array_shift($queue);

        $valuesIinBreadthOrder[] = $current;

        if ($left = $current->left ) {
            $queue[] = $left;
        }

        if ($right = $current->right) {
            $queue[] = $right;
        }
    }

    return $valuesIinBreadthOrder;
}

function depthFirstValuesRecursive(?Node $node)
{
    if(!$node->data){
        return [];
    }

    $leftValues = depthFirstValuesRecursive($node->left);

    $rightValues = depthFirstValuesRecursive($node->right);

    return [$node->data, ...$leftValues, ...$rightValues];
}

function breadthTraversalToCheckIfNodeIsInTree(?Node $node, $target)
{
  if (!$node->data) {
    return false;
  }

  $queue = [$node->data];

  while (count($queue)) {
    $current = array_shift($queue);
    if ($current->data == $target) {
      return true;
    }

    if ($left = $current->left ) {
      $queue[] = $left;
    }

    if ($right = $current->right) {
        $queue[] = $right;
    }
  }

  return false;
}

function depthTraversalToCheckIfNodeIsInTree(?Node $node, $target)
{
  if (!$node->data) {
    return false;
  }
  
  if (!$node->data == $target) {
    return true;
  }

  return depthTraversalToCheckIfNodeIsInTree($node->left, $target) || depthTraversalToCheckIfNodeIsInTree($node->right, $target);
}
