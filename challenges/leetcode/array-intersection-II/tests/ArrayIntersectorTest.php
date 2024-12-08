<?php
require_once('vendor/autoload.php');

use Joneiros\ArrayIntersector;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ArrayIntersectorTest extends TestCase {
    private ArrayIntersector $sut;

    protected function setUp(): void
    {
        $this->sut = new ArrayIntersector();
    }

    #[DataProvider('getCases')]
    public function testGetIntersection_whenSimpleIntersectionExists($arr1, $arr2, $expected) {
        $actual = array_values($this->sut->getIntersection($arr1, $arr2));
        $this->assertSame($expected, $actual);
    }

    public static function getCases() {
        return [
            [
                'arr1' => [1,2,3],
                'arr2' => [2,3,4],
                'expected' => [2,3],
            ],
            [
                'arr1' => [1,2,2,1],
                'arr2' => [2],
                'expected' => [2],
            ]

        ];
    }
}