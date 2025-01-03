<?php

namespace Joneiros;

class Challenge {
    /**
     * P.2 Euclid's Algorithm
     *
     * Given two positive integers m and n, find their greatest common divisor,
     * that is, the largest positive integer that divides both m and n.
     *
     * Steps
     * 1. Divide m by n, and let r be the remainder (0 <= r < n)
     * 2. If r == 0, the answer is n.
     * 3. Else, set m to n, n to r, and try again.
     */
    public function main(int $m, int $n): int {
        /**
         * This step is not strictly necessary, because
         * in modulus a % b if a is smaller than b, the remainder is a
         * and the rest of our algorithm will switch them.
         *
         * I originally added this not knowing the above rule (and not having
         * searched for it), then deleted it as superfluous after learning about
         * the rule, and now am re-adding it after P.4 mentions it.
         *
         * This is a tiny optimization since after the first cycle m > n consistently.
         */
        if($m < $n) {
            $tmp = $m;
            $m = $n;
            $n = $tmp;
        }

        $r = $m % $n;

        if($r === 0) {
            return $n;
        }

        return $this->main($n, $r);
    }
}