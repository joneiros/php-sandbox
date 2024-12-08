<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, string $blocks, int $targetConsecutive, $expected){
        $solver = new Challenge();
        $actual = $solver->main($blocks, $targetConsecutive);
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'blocks' => "WBBWWBBWBW",
                'targetConsecutive' => 7,
                'expected' => 3,
            ],
            [
                'case' => 'B',
                'blocks' => "WBWBBBW",
                "targetConsecutive" => 2,
                'expected' => 0,
            ],
            [
                'case' => 'C',
                'blocks' => "BWWWBB",
                "targetConsecutive" => 6,
                'expected' => 3,
            ],
        ];
    }
}