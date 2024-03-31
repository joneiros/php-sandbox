<?php

use Joneiros\AccountBalancer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once('vendor/autoload.php');

class AccountBalancerTest extends TestCase {
    private AccountBalancer $balancer;

    protected function setUp(): void
    {
        $this->balancer = new AccountBalancer();
    }

    #[DataProvider('getCases')]
    public function testGetBalanceAfterPurchase(int $purchaseAmount, int $expected) {
        $this->assertEquals($expected, $this->balancer->getBalanceAfterPurchase($purchaseAmount));
    }

    public static function getCases(): array {
        return [
            [
                'purchaseAmount' => 9,
                'expected' => 90,
            ],
            [
                'purchaseAmount' => 15,
                'expected' => 80,
            ],
        ];
    }
}