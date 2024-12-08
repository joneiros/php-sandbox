<?php

namespace Joneiros;

class Challenge {
    public function main(array $nums): array
    {
        $numsCount = count($nums);
        $ans = array_fill(0, $numsCount, 0);
        for($i = 0; $i < $numsCount; $i++)
        {
            $ans[$i] = $nums[$nums[$i]];
        }

        return $ans;
    }
}