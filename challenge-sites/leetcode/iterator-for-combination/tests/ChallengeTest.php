<?php
use Joneiros\CombinationIterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, string $characters, int $combinationLength, $expected){
        $solver = new CombinationIterator($characters, $combinationLength);
        $actual = [];
        while($solver->hasNext()) {
            $actual[] = $solver->next();
        }
        $this->assertEquals($expected, $actual, $case);

    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'characters' => 'abc',
                'combinationLength' => 2,
                'expected' => ["ab","ac","bc"],
            ],
        ];
    }
}