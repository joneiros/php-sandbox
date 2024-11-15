<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, array $nums, $target){
        $solver = new Challenge();
        $this->assertEquals($target, $solver->main(), $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'simplest',
                'nums' => [
                    1,
                    2,
                ],
                'target' => true,
            ],
            [
                'case' => 'Other Case',
                'nums' => [
                    1,
                    2,
                ],
                'target' => false,
            ],
        ];
    }
}