<?php

// In a card game, each player will be given a set of random cards. Player will throw on the
// table their one winning card, the player with the highest card wins
//
// A winning card is the card that only exist once in the set of cards and the highest one
//
// Given an array of sets of integers "cards", return the card of the winning player.
// Return -1 if no such card is found.
//
// Example 1:
// Input: Cards = [
//   [5,7,3,9,4,9,8,3,1],
//   [1,2,2,4,4,1],
//   [1,2,3]
// ]
// Output: 8
//
// Example 2: 
// Input: cards = [
//   [5,5],
//   [2,2]
// ]
// Output: -1
//
// Constraints:
// 1 <= cards.length <= 2000
// 0 <= cards[i] <= 1000


class Solution{
  function winningCards($cards) {
    $result = -1;

    $cardsAndCountHashTable = $this->cardsAndCountHashTable($cards);

    foreach ($cardsAndCountHashTable as $card => $count) {
      if ($count === 1) {
        $result = (int)$card > $result ? $card : $result; 
      }
    }

    return $result;
  }

  function cardsAndCountHashTable(array $cardSets) {
    $result = [];
    foreach ($cardSets as $key => $set) {
      foreach ($set as $key => $card) {
        $result[$card] = isset($result[$card]) ? $result[$card] + 1: 1;
      }
    }
    return $result;
  }
}

$solution = new Solution();

$output = $solution->winningCards([
  [5,7,3,9,4,9,8,3,1],
  [1,2,2,4,4,1],
  [1,2,3]
]);

echo $output;