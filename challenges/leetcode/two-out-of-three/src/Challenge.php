<?php

namespace Joneiros;

/**
 * https://leetcode.com/problems/two-out-of-three/description/
 * Originally solved in JS. Doing in PHP for language practice
 *
 * Because of the listed constraints, the JS version simply attempts all
 * numbers from 1 to 100, but that solution is inelegant, and contains a lot of misses.
 * This is an improvement.
 *
 * While I didn't implement it myself, another great way to do it is to build a frequency map
 * (see below for someone else's smart implementation)
 */
class Challenge {
    public function main(array $nums1, array $nums2, array $nums3): array {
        $crossover = [];
        $toCheck = array_unique([...$nums1, ...$nums2, ...$nums3]);
        foreach($toCheck as $value) {
            $contained = 0;
            $contained += in_array($value, $nums1) ? 1:0;
            $contained += in_array($value, $nums2) ? 1:0;
            $contained += in_array($value, $nums3) ? 1:0;

            if($contained >= 2) {
                $crossover[] = $value;
            }
        }

        return $crossover;
    }

    public function mainFrequencyMapVersion($nums1, $nums2, $nums3) {
        $nums = array_merge(array_unique($nums1),array_unique($nums2),array_unique($nums3));
        $num_counts = array_count_values($nums);
        $results = [];
        foreach ($num_counts as $num => $count) {
            if ($count >=2) {
                $results[] = $num;
            }
        }
        return $results;
    }
}