<?php

namespace Joneiros;

class Challenge {
    /**
     * https://leetcode.com/problems/minimum-recolors-to-get-k-consecutive-black-blocks/description/
     *
     * Think of this problem as a rolling window equal to the size of $targetConsecutive.
     * We want to find where that window should go so it contains the most B possible
     * (and therefore requires fewest operations to make the rest B).
     *
     */
    public function main(string $blocks, int $targetConsecutive): int {
        $blockArray = \mb_str_split($blocks);
        $blockArrayCount = count($blockArray);
        $fewestChanges = null;
        for($i = 0; $i <= $blockArrayCount - $targetConsecutive; $i++) {
            $targetSlice = \array_slice($blockArray, $i, $targetConsecutive);
            print_r($targetSlice);
            $onlyW = \array_diff($targetSlice, ['B']);
            print_r($onlyW);
            $wcount = count($onlyW);
            if(!isset($fewestChanges) || $fewestChanges > $wcount) {
                $fewestChanges = $wcount;
            }

        }
        return $fewestChanges;
    }
}