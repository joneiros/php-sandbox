<?php

use Joneiros\Challenge;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{

    #[DataProvider("getCases")]
    public function testMinRefillFull(string $case, array $plants, int $capacityA, int $capacityB, $expected){
        $solver = new Challenge();
        $actual = $solver->minimumRefillFull($plants, $capacityA, $capacityB);
        $this->assertEquals($expected, $actual, $case);
    }

    #[DataProvider("getCases")]
    public function testMinRefillBreakdown(string $case, array $plants, int $capacityA, int $capacityB, $expected){
        $solver = new Challenge();
        $actual = $solver->minimumRefillBreakdown($plants, $capacityA, $capacityB);
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'plants' => [2,2,3,3],
                'capacityA' => 5,
                'capacityB' => 5,
                'expected' => 1,
            ],
            [
                'case' => 'B',
                'plants' => [2,2,3,3],
                'capacityA' => 3,
                'capacityB' => 4,
                'expected' => 2,
            ],
            [
                'case' => 'C',
                'plants' => [5],
                'capacityA' => 10,
                'capacityB' => 8,
                'expected' => 0,
            ],
        ];
    }
}