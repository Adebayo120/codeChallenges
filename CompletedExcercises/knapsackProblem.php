<?php

// Given two arrays weight[] and profit[] the weights and profit of N items, 
// we need to put these items in a knapsack of capacity W to get the maximum 
// total value in the knapsack.
// Note: Unlike 0/1 knapsack, you are allowed to break the item.
//
// Examples:
// Input: weight[] = {10, 20, 30}, profit[] = {60, 100, 120}, N= 50
// Output: Maximum profit earned = 240
// Explanation: 
// Decreasing p/w ratio[] = {6, 5, 4}
// Taking up the weight values 10, 20, (2 / 3) * 30 
// Profit = 60 + 100 + 120 * (2 / 3) = 240
//
//
// Input: weight[] = {10, 40, 20, 24}, profit[] = {100, 280, 120, 120}, N = 60
// Output: Maximum profit earned = 440
// Explanation: 
// Decreasing p/w ratio[] = {10, 7, 6, 5}
// Taking up the weight values 10, 40, (1 / 2) * 20 
// Profit = 100 + 280 + (1 / 2) * 120 = 440

function KPGreedyMethod(array $weight, array $profit, int $n)
{
  $profitWeights = [];

  foreach ($weight as $key => $value) {
    $profitWeights[$key] = round($profit[$key] / $value);
  }

  arsort($profitWeights);

  $totalWeight = $totalProfit = 0;

  foreach ($profitWeights as $index => $profitWeight) {

    $ratio = (($weight[$index] + $totalWeight) <= $n) ? 1: (($n - $totalWeight)/$weight[$index]);

    $totalProfit += $ratio * $profit[$index];

    if ($ratio < 1) {
      break;
    }

    $totalWeight += $ratio * $weight[$index];
  }

  return $totalProfit;
}

echo(KPGreedyMethod([20, 10, 30], [100, 60, 120], 50));