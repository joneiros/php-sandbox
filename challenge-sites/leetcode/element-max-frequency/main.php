#!/usr/bin/env php
<?php

/*** Problem
    You are given an array nums consisting of positive integers.

    Return the total frequencies of elements in nums such that those elements all have the maximum frequency.

    The frequency of an element is the number of occurrences of that element in the array.



    Example 1:

    Input: nums = [1,2,2,3,1,4]
    Output: 4
    Explanation: The elements 1 and 2 have a frequency of 2 which is the maximum frequency in the array.
    So the number of elements in the array with maximum frequency is 4.
    Example 2:

    Input: nums = [1,2,3,4,5]
    Output: 5
    Explanation: All elements of the array have a frequency of 1 which is the maximum.
    So the number of elements in the array with maximum frequency is 5.


    Constraints:

    1 <= nums.length <= 100
    1 <= nums[i] <= 100
*/

/* Possible Solutions
- for each element, iterate over the endtire array and count the number of items identical to it (tmpCount).
Record the number of duplicates (countDuplicates).
If it is first, or the same as the previous max duplicates,add it to a "numbers with max duplicates"
(duplicatedNumbers) list.
If it is greater, replace the max duplicates list with that number.
At the end, multiply the number of elements in the duplicatedNumbers list by the countDuplicates.
    - This solution would have O(n)^2 complexity, so it's not great, but it's pretty easy to understand
    - This could be written in a way to only loop over elements later in the array,
    which would make it better (roughly O(n)^1.5 amortized), but still not good

- Sort the numbers. For each element,
if it is different than the last element, set tmpCount = 1. continue.
if it is the same as the last element, add to tmpCount. if tmpCount == countDuplicates,
append to duplicatedNumbers. if tmpCount > countDuplicates, update countDuplicates, replace duplicatedNumbers.
At the end, multiply the number of elements in the duplicatedNumbers list by the countDuplicates.
    - This variant is O(n) complexity (or more specifically O(2n) ), so better than the last one,
    and still pretty easy to understand.

- From the startingList, create a newList of unique values.
For each unique value, remove an instance of that value from the original list.
increment a countDuplicates counter.
Repeat this process until the startingList contains nothing, at which time you use newList as duplicatedNumbers
    - This one is less intuitive, and runs in O(n)^2, so even though I like it (it seems clever),
    it's not the best solution.
*/

function maxFrequencyElements(): int {
    $nums = [1,2,2,3,1,4];
    //$nums = [1,2,3,4,5];
    $countDuplicates = 1;
    $duplicatedNums = [];

    //special case
    if(empty($nums)) {
        return 0;
    }

    sort($nums);

    $tmpCount = 1;
    for($i=1; $i < count($nums); $i++) {
        if($nums[$i] !== $nums[$i-1]) {
            $tmpCount = 1;
            continue;
        }

        $tmpCount++;

        if($tmpCount > $countDuplicates) {
            $countDuplicates = $tmpCount;
            $duplicatedNums = [$nums[$i]];

        } else if($tmpCount === $countDuplicates) {
            $duplicatedNums[] = $nums[$i];
        }
    }

    //edge case where no numbers are repeated
    if (empty($duplicatedNums)) {
        return count($nums);
    }

    return count($duplicatedNums) * $countDuplicates;
}

echo(maxFrequencyElements() . "\n");