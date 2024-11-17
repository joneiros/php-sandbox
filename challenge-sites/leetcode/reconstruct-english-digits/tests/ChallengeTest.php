<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, string $chars, string $expected){
        $solver = new Challenge();
        $actual = $solver->main($chars);
        $this->assertEquals($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'chars' => "owoztneoer",
                'expected' => "012",
            ],
            [
                'case' => 'B',
                'chars' => "fviefuro",
                'expected' => "45",
            ],
        ];
    }
}