<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, array $nums, $expected){
        $solver = new Challenge();
        $actual = $solver->main();
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'nums' => [],
                'expected' => true,
            ],
            [
                'case' => 'B',
                'nums' => [],
                'expected' => false,
            ],
        ];
    }
}