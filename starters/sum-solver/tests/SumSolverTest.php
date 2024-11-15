<?php

use PHPUnit\Framework\TestCase;
use Jonoros\SumSolver;
use PHPUnit\Framework\Attributes\DataProvider;

class SumSolverTest extends TestCase{

    public function testTwoSumBruteForceNoSolution(){
        $nums = [];
        $target = 15;
        $solver = new SumSolver();
        $answerIndexes = $solver->twoSumBruteForce($nums, $target);
        $this->assertEmpty($answerIndexes);
    }

    #[DataProvider("getCasesTestTwoSum")]
    public function testTwoSumBruteForce(string $case, array $nums, $target, int $answerIndex1, int $answerIndex2){
        $solver = new SumSolver();
        $answerIndexes = $solver->twoSumBruteForce($nums, $target);
        $this->assertContains($answerIndex1, $answerIndexes, $case);
        $this->assertContains($answerIndex2, $answerIndexes, $case);
    }

    public static function getCasesTestTwoSum(): array {
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
}