<?php

use Joneiros\IntegerVisitor;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

class IntegerVisitorTest extends TestCase {
    private IntegerVisitor $sut;
    protected function setUp(): void
    {
        $this->sut = new IntegerVisitor();
    }

    #[DataProvider('getCases')]
    public function testLastVisitedIntegers(array $nums, array $expected) {
        $actual = $this->sut->lastVisitedIntegers($nums);

        $this->assertSame($expected, $actual);
    }

    public static function getCases(): array {
        return [
            [
                'nums' => [1,2,-1,-1,-1],
                'expected' => [2,1,-1],
            ],
            [
                'nums' => [1,-1,2,-1,-1],
                'expected' => [1,2,1],
            ],
        ];
    }
}