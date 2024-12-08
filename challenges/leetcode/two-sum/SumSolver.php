<?php

namespace Jonoros;

class SumSolver {
    public function twoSum($nums, $target){
        $outerIndex = 0;
        $innerIndex = 0;

        foreach($nums as $num) {
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
    }
}