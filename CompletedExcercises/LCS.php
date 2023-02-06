<?php

// Longest Common Subsequence

function findLCSRecursively(string $a, string $b)
{
    return lcsActionRecursively($a, $b, 0, 0);
}

// Without memoization this recursive function take exponential time of 0(n^2)
// but with memoization it reduces the time complexity to 0(m * n)

function lcsActionRecursively(string $a, string $b, int $indexA, int $indexB, $cache = [])
{
    if (isset($cache[$indexA][$indexB])) {
        return $cache[$indexA][$indexB];
    }

    if (!isset($a[$indexA]) || !isset($b[$indexB])) {
        $result = 0;
    } elseif ($a[$indexA] == $b[$indexB]) {
        $result = 1 + lcsActionRecursively($a, $b, $indexA + 1, $indexB + 1, $cache);
    } else {
        $result = max(
            lcsActionRecursively($a, $b, $indexA + 1, $indexB, $cache),
            lcsActionRecursively($a, $b, $indexA, $indexB + 1, $cache)
        );
    }

    $cache[$indexA][$indexB] = $result;

    return $result;
}

echo findLCSRecursively('bd', 'abcd');
echo '<br>';

// Time Complexity 0(m * n)
function findLCSDynamicPrograming(string $a, string $b)
{
    $table = [];
    $aStrlen = strlen($a);
    $bStrlen = strlen($b);
    for ($i=0; $i < $aStrlen; $i++) { 
        for ($j=0; $j < $bStrlen; $j++) { 
            if ($a[$i] === $b[$j]) {
                $table[$i][$j] = 1 + getTableValues($table, $i - 1, $j - 1);
            } else {
                $table[$i][$j] = max(
                    getTableValues($table, $i, $j - 1),
                    getTableValues($table, $i - 1, $j)
                );
            }
        }
    }

    return $table[$aStrlen - 1][$bStrlen - 1];
}

function getTableValues(array $table, int $i, int $j)
{
    return isset($table[$i][$j]) ? $table[$i][$j] : 0;
}

echo findLCSDynamicPrograming('bd', 'abcd');
$j = 0;
echo $j++;
echo $j;
$d = [];
for ($i=0; $i < 5; $i++) { 
    $d[$i] = [];
}

echo '<pre>';
print_r($d);
echo '</pre>';