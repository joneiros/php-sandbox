<?php

namespace Joneiros;

class AccountBalancer {
    public function getBalanceAfterPurchase($purchaseAmount):int {
        $balance = 100;
        $modAmount = $purchaseAmount % 10;
        $purchaseAmount -= $modAmount;
        $purchaseAmount += $modAmount < 5 ? 0 : 10;

        return $balance - $purchaseAmount;
    }
}