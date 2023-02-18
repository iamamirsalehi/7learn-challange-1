<?php

namespace Src\Basket;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        return parent::getPrice();
    }
}