<?php

use Joneiros\MatrixReshaper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

class MatrixReshaperTest extends TestCase {
    private MatrixReshaper $sut;

    public function setUp(): void
    {
        $this->sut = new MatrixReshaper();
    }

    #[DataProvider('getCases')]
    public function testMatrixReshape(
        array $matrix,
        int $row,
        int $col,
        array $expected
    ) {
        $actual = $this->sut->matrixReshape($matrix, $row, $col);
        $this->assertSame($expected, $actual);
    }

    public static function getCases(): array {
        return [
            [
                'matrix' => [[1,2],[3,4]],
                'row' => 1,
                'col' => 4,
                'expected' => [[1,2,3,4]],
            ],
            [
                'matrix' => [[1,2],[3,4]],
                'row' => 2,
                'col' => 4,
                'expected' => [[1,2],[3,4]],
            ],

        ];
    }
}