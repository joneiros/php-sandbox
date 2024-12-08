<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
//use PHPUnit\Framework\Attributes\DataProvider;

class ChallengeTest extends TestCase{


    #[DataProvider("getCases")]
    public function testMainFunc(string $case, array $nums1, $nums2, $nums3, $expected){
        $solver = new Challenge();
        $actual =  $solver->main($nums1, $nums2, $nums3);
        //"assertEqualsCanonicalizing" asserts array elements are equal after being "canonically" sorted.
        //works well for this case because we don't care about item order.

        $this->assertEqualsCanonicalizing($expected, $actual, $case);
    }

    #[DataProvider("getCases")]
    public function testMainFrequencyMapVariation(string $case, array $nums1, $nums2, $nums3, $expected){
        $solver = new Challenge();
        $actual =  $solver->mainFrequencyMapVersion($nums1, $nums2, $nums3);

        $this->assertEqualsCanonicalizing($expected, $actual, $case);
    }


    public static function getCases(): array {
        return [
            [
                'case' => 'A',
                'nums1' => [1,1,2,3],
                'nums2' => [2,3],
                'nums3' => [3],
                'expected' => [3,2],
            ],
            [
                'case' => 'A',
                'nums1' => [3,1],
                'nums2' => [2,3],
                'nums3' => [1,2],
                'expected' => [2,3,1],
            ],
            [
                'case' => 'A',
                'nums1' => [1,2,2],
                'nums2' => [4,3,3],
                'nums3' => [5],
                'expected' => [],
            ],
        ];
    }
}