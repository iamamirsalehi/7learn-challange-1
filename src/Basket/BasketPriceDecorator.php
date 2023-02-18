<?php

namespace src\Basket;

use Src\Product;

class BasketPriceDecorator implements BasketPrice
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function getPrice(): int
    {
        return $this->product->getPrice();
    }
}