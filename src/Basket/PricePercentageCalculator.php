<?php

namespace Src\Basket;

class PricePercentageCalculator
{
    public static function getTheActualPrice(int $price, float $discount): int
    {
        return $price - (($price / 100) * $discount);
    }
}