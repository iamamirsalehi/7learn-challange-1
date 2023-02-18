<?php

namespace src\Basket;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        return parent::getPrice();
    }
}