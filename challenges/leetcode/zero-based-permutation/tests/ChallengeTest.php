<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, array $nums, $expected){
        $solver = new Challenge();
        $actual = $solver->main($nums);
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'nums' => [0,2,1,5,3,4],
                'expected' => [0,1,2,4,5,3],
            ],
            [
                'case' => 'B',
                'nums' => [5,0,1,2,3,4],
                'expected' => [4,5,0,1,2,3],
            ],
        ];
    }
}