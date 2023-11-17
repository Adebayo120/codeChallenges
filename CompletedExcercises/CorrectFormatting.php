<?php

// Correct formatting
// Gorge wants to develop a software which converts all the lines 
// written in a text document into a correct format.
// The document consist of N words and the software follows the below parameters to convert the document in
// the correct format
// The maximum number of characters in each line should be k
// Each line must have less than or equal to M spaces left at the end of the line
// You are given an integer array containing the length of N words present in the document.
// Your task is to find and return the maximum difference possible between the number of lines in incorrect
// format 
// Note: 
// Since there can be many words in a line, so a space is used for separating two words
// The order of the words mentioned in the array will remain the same in the document
// Input expectation 
// input1: An integer value N, representing the number words in the document. 
// input2: An integer array containing word lengths.
// input3: An integer value K, representing the maximum number of characters that should be there in each line.
// input4: An integer value M, representing the spaces that can be left at the end of a line.

// Example 1:
// input1: 3 
// input2: {3, 1, 1} 
// input3: 5
// input4: 3
// Output : 2


function correctFormatting($numOfWords, $arrOfWordsLength, $maxCharInEachLine, $maxSpaceLeft)
{
    return maxDiff(0, $numOfWords, $arrOfWordsLength, $maxCharInEachLine, $maxSpaceLeft);
}

function maxDiff($index, $numOfWords, $arrOfWordsLength, $maxCharInEachLine, $maxSpaceLeft, $diff = 0)
{    
    if ($index === $numOfWords) {
        return $diff + 0;
    }

    $maxDiff = 0;

    for ($i=1; $i <= ($numOfWords - $index); $i++) {
        $subArray = array_slice($arrOfWordsLength, $index, $i);

        $totalCharInLine = array_sum($subArray) + (count($subArray) - 1);

        $isCorrectLine = $totalCharInLine < $maxCharInEachLine && ($maxCharInEachLine - $totalCharInLine) <= $maxSpaceLeft;

        $lineResult = $isCorrectLine ? 1 : -1;

        $ChildrenDiff = maxDiff($index + count($subArray), $numOfWords, $arrOfWordsLength, $maxCharInEachLine, $maxSpaceLeft, $diff + $lineResult);

        $maxDiff = $ChildrenDiff > $maxDiff ? $ChildrenDiff : $maxDiff;
    }

    return $maxDiff;
}

echo correctFormatting(3, [3, 1, 1], 5, 3);