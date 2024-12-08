<?php

use Joneiros\Challenge;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

class ChallengeTest extends TestCase {
    private Challenge $sut;

    protected function setUp(): void
    {
        $this->sut = new Challenge();
    }

    #[DataProvider('getCases')]
    public function testChallenge($in, $expected) {
        $this->assertEquals($expected, $this->sut->numberOfSteps($in));
    }

    public static function getCases(): array {
        return [
            [
                'in' => 14,
                'expected' => 6
            ],
            [
                'in' => 123,
                'expected' => 12
            ],
        ];
    }
}