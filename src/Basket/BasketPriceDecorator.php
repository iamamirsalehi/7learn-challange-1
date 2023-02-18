<?php

namespace src\Basket;

use Src\ProductItem;

class BasketPriceDecorator implements BasketPrice
{
    protected ProductItem $product;

    public function __construct(ProductItem $product)
    {
        $this->product = $product;
    }


    public function getPrice(): int
    {
        return $this->product->getPrice();
    }
}