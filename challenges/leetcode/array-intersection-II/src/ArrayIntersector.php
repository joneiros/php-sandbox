<?php

namespace Joneiros;

class ArrayIntersector {
    public function getIntersection(array $arr1, array $arr2): array {
        $intersection = [];
        $small = [];
        $big = [];

        //the main list we care about traversing is the shorter one
        if(count($arr1) < count($arr2)) {
            $small = $arr1;
            $big = $arr2;
        } else {
            $small = $arr2;
            $big = $arr1;
        }

        foreach($small as $num) {
            $index = array_search($num, $big);

            if($index !== false) {
                $intersection[] = $num;
                unset($big[$index]);
            }
        }

        return $intersection;
    }
}