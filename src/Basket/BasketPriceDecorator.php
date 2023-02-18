<?php

namespace Src\Basket;

use Src\ProductItem;

class BasketPriceDecorator implements BasketPrice
{
    protected Basket $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }


    public function getPrice(): int
    {
        return $this->basket->getPrice();
    }
}