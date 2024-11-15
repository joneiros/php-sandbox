<?php

namespace Jonoros;

class Challenge {
    public function twoSumBruteForce(array $nums, int $target): array {
        $outerIndex = 0;

        foreach($nums as $num) {
            $innerIndex = 0;
            foreach($nums as $innerNum) {
                if($num + $innerNum === $target) {
                    return [
                        $outerIndex,
                        $innerIndex,
                    ];
                }
                $innerIndex++;
            }
            $outerIndex++;
        }

        return [];
    }
}