<?php

// John came across a problem involving palindromes and while working on it he gets stuck at some point and asks for your help. 
// He is working with string arrays and trying to perform some operations on them.
// He gives you an array of N strings, where each string consists of only lowercase 
// English alphabets. Any two strings in the array can be concatenated to check if their characters can be 
// rearranged to form a palindrome string. The task is to return the count of such string pairs in the array.
// For example - strings "abc" and "bac" can be concatenated to form "abcbac" whose characters can be rearranged to form "abccba" 
// which is a palindrome.

// Input Specification:
// input1: an array of N strings
// input2: an integer N denoting the length of the array
//
//Output Specification:
// Return the number of such string pairs.
// Example 1:
// input1 : {ac, bb, dd} 
// input2: 3

// Output : 1
// Explanation:
// The pair "bb" and "dd' can be concatenated to form the strings "bddb" or "dbbd" which are palindromes. Therefore, this string pair("bb" and "dd") counts.
// No other string pairs except ("bb" and "dd") can be combined to form a palindrome.
// So 1 will be returned as the output.
// Example 2:
// input : {aab, abc, bbb, cc} 
// input2: 4

// Output : 3
// Explanation:
// Looking at the given string array:
// • The pair "aab" and "cc" can be concatenated to form "acbca", "cabac"
// • The pair "bbb" and "cc" can be concatenated to form "cbbbc"
// • The pair "aab" and "bbb" can be concatenated to form "babbab"
// There are 3 such pairs, so 3 will be returned as the output.

function isPalindromePossible($str1, $str2) {
    $concatenated = $str1 . $str2;
    $arr = array();
    $n = strlen($concatenated);
    // I feel this is a better solution to checking if the concatenated string is a palindrome or not
    for ($i = 0; $i < $n; $i++) {
        if (!isset($arr[$concatenated[$i]])) {
            $arr[$concatenated[$i]] = true;
        } else {
            unset($arr[$concatenated[$i]]);
        }
    }
    return count($arr) <= 1;

    // This algorithm is doing more than necessary
    // for ($i = 0; $i < $n; $i++) {
    //     if (!isset($arr[$concatenated[$i]])) {
    //         $arr[$concatenated[$i]] = 0;
    //     }
    //     $arr[$concatenated[$i]]++;
    // }

    // $oddCount = 0;
    // foreach ($arr as $value) {
    //     if ($value % 2 != 0) {
    //         $oddCount++;
    //     }
    // }

    // return $oddCount <= 1;
}

function countPalindromePairs($arr, $N) {
    $count = 0;
    for ($i = 0; $i < $N; $i++) {
        for ($j = $i + 1; $j < $N; $j++) {
            if (isPalindromePossible($arr[$i], $arr[$j])) {
                $count++;
            }
        }
    }
    return $count;
}

// Example usage
$input1 = array('ac', 'bb', 'dd');
$input2 = 3;
echo countPalindromePairs($input1, $input2) . "\n"; // Outputs: 1

$input1 = array('aab', 'abc', 'bbb', 'cc');
$input2 = 4;
echo countPalindromePairs($input1, $input2) . "\n"; // Outputs: 3

// Fanny's Occurrences
// Fanny is given a string along with the string which contains single character ×. She s has to remove the character > from the given string. Help her write a function to remove all occurrences of x character from the given string.
// jon Input Specification:
// input: input string s input2: String containing any character
// Ad
// Output Specification:
// String without the occurrence of character x
// Example 1:
// input: welcome to mettl input2: I
// 18
// AT Output: wecome to mett
// Explanation:
// 15 As is the character which is required to be removed, therefore all the
// occurrences of I are removed, keeping all other characters.
// Example 2:
// input1: Lord of Rings
// Ad? input2: 0
// Output: Lrd f Rings
// Explanation:
// The character which is required to be removed is o, hence all the occurrences of o
// A dare removed keeping all other characters.

// Stocks
// You want to buy a particular stock at its lowest price and sell it later at its highest price. Since the stock market is unpredictable, you steal the price plans of a
// company for this stock for the next N days.
// Find the best price you can get to buy this stock to achieve maximum profit.
// Note: The initial price of the stock is O.

// Input Specification:
// input1: N, number of days
// input2: Array representing change in stock price for the day.
// Output Specification:
// Your function must return the best price to buy the stock at.
// Example 1:
// input1: 5
// input2: {-39957-17136,35466,21820-26711}
// Output: -57093
// Explanation:

// The best time to buv the stock will be on Day 2 when the price of the stock will be -57093
// Example 2:
// input1: 9

// input2: {-4527,-1579,-38732,-43669,-9287-48068,-30293,-30867,18677}

// Output: -207022
// Explanation:
// yours The best time to buy the stock will be on Day 8 when the price of the stock will be -207022

// Maximum Coordinate
// You are at the origin of a coordinate axis with an infinite number of points marked jess at intervals of 1 unit on the X-axis, Moving from one point to the next (i.e from
// x=a to x=a+1) requires spending one coin. You start with K coins and aim to reach the maximum coordinate on the x-axis. There are N check points on the x-axis at jam specitic coordinates given by an array A, and reaching each check point rewards
// you with B [i] coins.
// Ad Your task is to find and return an integer value representing the maximum coordinate you can reach on the x-axis, considering the number of coins you have and the rewards for reaching the check point coordinates.
// Note: The points on the x-axis are indexed starting from 0.
// Input Specification:
// input1 : An integer value N, representing the total number of check points on the x-axis.
// input2: An integer K, representing initial number of coins you have. 
// input3: An integer array A, representing the coordinates at which the check points are present.
// input4: An integer array B, representing number of coins each check point has

// Output Specification: Return an integer value, representing the maximum coordinate you can reach
// throughout your journey starting from zero.

// Example 1:
// input1: 2
// input2: 3 
// input3 : {2,5}
// input4 : {1,10}
// Output: 4
// Explanation:
// Here, we have N=2 check points at coordinates 2 and 5. Each check point rewards us with a certain number of coins specified by array B, where B[0]=1 and B[1]=10.
// Additionally, we start with K=3 coins.
// Starting from the origin at ×=0, we follow the steps outlined below to reach the
// maximum coordinate:
// • We move from x=0 to x=1 by using 1 coin, leaving us with 2 coins remaining.
// • We continue from x=1 to x=2 by using another coin. At x=2, there is a check point that rewards us with 1 coin which leaves us with 2 coins.
// • We proceed from x=2 to x=3 by using 1 coin, which leaves us with 1 coin.
// • We advance from x=3 to x=4 by using our final coin.

// Since we are left with no coins, the maximum coordinate we can reach throughout our journey starting from the origin is 4. Therefore, 4 is returned as the output.
// Example 2:

// input1: 3
// input2: 1
// input3: {4, 5, 7} 
// input4: {10, 4, 2}
// Output: 1
// Explanation:
// Here, we have N=3 check points at coordinates 4, 5 and 7. Each check point rewards us with a certain number of coins specified by array B, where B[0]=10, B[1]=4 and B [2]=2. Additionally, we start with K=1 coin.
// Starting from the origin at x=0, we follow the steps outlined below to reach the
// maximum coordinate:
// • We move from x=0 to x=1 by using our only coin.

// Since we are left with no coins, the maximum coordinate we can reach throughout our journey starting from the origin is 1. Therefore, 1 is returned as the output.


