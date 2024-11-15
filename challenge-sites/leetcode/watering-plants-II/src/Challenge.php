<?php

namespace Joneiros;

/**
 * https://leetcode.com/problems/watering-plants-ii/description/
 * Originally solved in JS, implementing in PHP to maintain language fluency
 */
class Challenge {
    public function minimumRefillFull(array $plants, int $capacityA, int $capacityB) {
        $count = 0;
        $skipAlice = false;
        $skipBob = false;
        $aliceCap = $capacityA;
        $bobCap = $capacityB;
        $plantsCount = count($plants);
        $oddPlants = $plantsCount % 2 != 0;
        $midpoint = ceil(($plantsCount / 2));

        for($i=0; $i < $midpoint; $i++) {
            if( $i === $midpoint && $oddPlants) {
                if($aliceCap >= $bobCap) {
                    $skipBob = true;
                } else {
                    $skipAlice = true;
                }
            }

            if(!$skipAlice) {
                $aliceTarget = $plants[$i];
                if($aliceCap < $aliceTarget) {
                    $count++;
                    $aliceCap = $capacityA;
                }

                $aliceCap -= $aliceTarget;
            }

            if(!$skipBob) {
                $bobTarget = $plants[$plantsCount - $i - 1];
                if($bobCap < $bobTarget) {
                    $count++;
                    $bobCap = $capacityB;
                }

                $bobCap -= $bobTarget;
            }
        }

        return $count;
    }

    public function minimumRefillBreakdown(array $plants, int $capacityA, int $capacityB) {
        $count = 0;
        $skipAlice = false;
        $skipBob = false;
        $aliceCap = $capacityA;
        $bobCap = $capacityB;
        $plantsCount = count($plants);
        $oddPlants = $plantsCount % 2 != 0;
        $midpoint = ceil(($plantsCount / 2));

        for($i=0; $i < $midpoint; $i++) {
            if( $i === $midpoint && $oddPlants) {
                $this->chooseMiddle($aliceCap, $bobCap, $skipBob, $skipAlice);
            }
            $this->handlePerson($skipAlice, $plants[$i], $aliceCap, $count, $capacityA);
            $this->handlePerson($skipBob, $plants[$plantsCount - $i - 1], $bobCap, $count, $capacityB);
        }

        return $count;
    }

    private function chooseMiddle(int $aliceCap, int $bobCap, bool &$skipBob, bool &$skipAlice) {
        if($aliceCap >= $bobCap) {
            $skipBob = true;
        } else {
            $skipAlice = true;
        }
    }

    private function handlePerson(bool $skip, int $personTarget, int &$cap, int &$count, int $capacity) {
        if(!$skip) {
            if($cap < $personTarget) {
                $count++;
                $cap = $capacity;
            }

            $cap -= $personTarget;
        }
    }
}