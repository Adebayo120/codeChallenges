<?php

function reliabilityDesign(array $costs, array $reliabilities, int $availableCost)
{
    $upperBounds = [];

    $totalPriceOfEachDevices = array_sum($costs);

    $amountLeftToIncreaseSystemReliability = $availableCost - $totalPriceOfEachDevices;

    foreach ($costs as $key => $cost) {
        $upperBounds[$key] = floor($amountLeftToIncreaseSystemReliability/ $cost) + 1;
    }

    $sets = [[1, 0]];

    foreach ($upperBounds as $key => $upperBound) {
        $newSets = [];

        $mustRemainCost  = $totalPriceOfEachDevices - array_sum( array_slice($costs, 0, $key + 1) );

        for ($i=1; $i <= $upperBound ; $i++) {
            $reliabilityPercentage = getReliabilityPercentage($i, $reliabilities[$key]);

            $cost = $costs[$key] * $i;

            foreach ($sets as $index => $set) {
                
                $totalSetCost = $cost + $set[1];
                if (
                    $totalSetCost > $availableCost || 
                    ($availableCost - $totalSetCost) < $mustRemainCost
                ) {
                    continue;
                }
                $totalSetReliability = $reliabilityPercentage * $set[0];

                $newSets[] = [$totalSetReliability, $totalSetCost];
            }
        }

        $sets = implementDominantRuleOnSet($newSets);
    }

    return end($sets);
}

function getReliabilityPercentage(int $deviceCount, float $reliability)
{
    return 1 - pow((1 - $reliability), $deviceCount);
}

function implementDominantRuleOnSet(array $sets)
{
    sort($sets);

    $count = count($sets);

    for ($i=1; $i < $count; $i++) { 
        if ($sets[$i][1] < $sets[$i - 1][1]) {
            unset($sets[$i - 1]);
        }
    }
    sort($sets);

    return $sets;
}

print_r(reliabilityDesign(
    [30, 15, 20],
    [0.9, 0.8, 0.5],
    105
));