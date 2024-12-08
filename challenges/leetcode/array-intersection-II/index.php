#!/usr/bin/env php
<?php
require_once('vendor/autoload.php');

/*** Problem
 Given two integer arrays nums1 and nums2, return an array of their intersection.
 Each element in the result must appear as many times as it shows in both arrays
 and you may return the result in any order.



Example 1:

Input: nums1 = [1,2,2,1], nums2 = [2,2]
Output: [2,2]
Example 2:

Input: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
Output: [4,9]
Explanation: [9,4] is also accepted.


Constraints:

1 <= nums1.length, nums2.length <= 1000
0 <= nums1[i], nums2[i] <= 1000


Follow up:

What if the given array is already sorted? How would you optimize your algorithm?
What if nums1's size is small compared to nums2's size? Which algorithm is better?
What if elements of nums2 are stored on disk, and the memory is limited such that
you cannot load all elements into the memory at once?
 */

/* Possible Solutions
    - For each element in one of the arrays, loop through the other array and see if
    the element is in it. If it is, add it to "intersection" array, and remove it from
    each of the original lists (the removal will allow for the proper
    recognition of the right number of duplicates)

    - in PHP specifically, array_intersect_key (or a related function) may be able to expedite this process


*/

use Joneiros\ArrayIntersector;

//expected: [2,3]
$arr1 = [1,2,3];
$arr2 = [4,2,3];

$intersector = new ArrayIntersector();
echo(implode(",", $intersector->getIntersection($arr1, $arr2)));
