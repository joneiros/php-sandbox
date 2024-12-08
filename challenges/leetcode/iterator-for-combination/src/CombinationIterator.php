<?php

namespace Joneiros;

class CombinationIterator {
    private $combinations;
    private $combinationsCount;
    private $current;
    private $hasNext;

    /**
     * @param String $characters
     * @param Integer $combinationLength
     */
    function __construct($characters, private $combinationLength) {
        $this->combinations = $this->generateCombinations($characters, $combinationLength);
        $this->combinationsCount = count($this->combinations);
        $this->current = 0;
        $this->hasNext = $this->combinationsCount > 0;
    }

    /**
     * @return String
     */
    function next() {
        $combination = $this->combinations[$this->current];
        $this->current++;
        $this->hasNext = $this->current < $this->combinationsCount;
        return $combination;
    }

    /**
     * @return Boolean
     */
    function hasNext() {
        return $this->hasNext;
    }

    private function generateCombinations($characters, $length) {
        $result = [];
        $this->backtrack($characters, $length, 0, '', $result);
        return $result;
    }

    private function backtrack($characters, $length, $start, $current, &$result) {
        if (strlen($current) == $length) {
            $result[] = $current;
            return;
        }

        for ($i = $start; $i < strlen($characters); $i++) {
            $this->backtrack($characters, $length, $i + 1, $current . $characters[$i], $result);
        }
    }
}

/**
 * Your CombinationIterator object will be instantiated and called as such:
 * $obj = CombinationIterator($characters, $combinationLength);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */