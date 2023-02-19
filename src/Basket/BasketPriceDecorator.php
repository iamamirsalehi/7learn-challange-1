<?php

namespace Src\Basket;

use Src\SingleProduct;

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