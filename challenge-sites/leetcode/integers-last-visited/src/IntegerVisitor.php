<?php

namespace Joneiros;

class IntegerVisitor {
    function lastVisitedIntegers($nums):array {
        $seen = [];
        $ans = [];
        $consecutiveNegs = 0;
        for( $i = 0; $i < count($nums); $i++) {
            if($nums[$i] > 0) {
                $consecutiveNegs = 0;
                array_unshift($seen, $nums[$i]);
            } else {
                $consecutiveNegs++;
                if($consecutiveNegs <= count($seen)) {
                    $ans[] = $seen[$consecutiveNegs -1];
                } else {
                    $ans[] = -1;
                }
            }
        }

        return $ans;
    }
}