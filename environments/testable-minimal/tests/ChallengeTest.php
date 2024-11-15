<?php

use Joneiros\Challenge;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class SumSolverTest extends TestCase{

    public function testTwoSumBruteForceNoSolution(){
        $main = new Challenge();
        $this->assertTrue(false);
    }

    /*
    #[DataProvider("getCasesTestTwoSum")]
    public function testTwoSumBruteForce(string $case, array $nums, $target, int $answerIndex1, int $answerIndex2){
        $solver = new SumSolver();
        $answerIndexes = $solver->twoSumBruteForce($nums, $target);
        $this->assertContains($answerIndex1, $answerIndexes, $case);
        $this->assertContains($answerIndex2, $answerIndexes, $case);
    }


    public static function getCasesTestAspectOfMain(): array {
        return [
            [
                'case' => 'simplest',
                'nums' => [
                    1,
                    2,
                ],
                'target' => 3,
                'answerIndex1' => 0,
                'answerIndex2' => 1,
            ],
        ];
    }
    */
}