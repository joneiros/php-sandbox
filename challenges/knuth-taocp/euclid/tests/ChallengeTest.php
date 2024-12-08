<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, int $m, int $n, $expected){
        $solver = new Challenge();
        $actual = $solver->main($m, $n);
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'Knuth P.4',
                'm' => 119,
                'n' => 544,
                'expected' => 17,
            ],
            [
                'case' => 'A',
                'm' => 1,
                'n' => 1,
                'expected' => 1,
            ],
            [
                'case' => 'B1 When m is larger than n',
                'm' => 4,
                'n' => 2,
                'expected' => 2,
            ],
            [
                'case' => 'B2 When m is smaller than n',
                'm' => 2,
                'n' => 4,
                'expected' => 2, //doesn't change expected outcome
            ],
            [
                'case' => 'C',
                'm' => 8,
                'n' => 6,
                'expected' => 2,
            ],
            [
                'case' => 'D',
                'm' => 9,
                'n' => 6,
                'expected' => 3,
            ],
            [
                'case' => 'E1 Primes',
                'm' => 7,
                'n' => 5,
                'expected' => 1,
            ],
            [
                'case' => 'E2 Primes',
                'm' => 11,
                'n' => 5,
                'expected' => 1,
            ],
            [
                'case' => 'F',
                'm' => 25,
                'n' => 20,
                'expected' => 5,
            ],
        ];
    }
}