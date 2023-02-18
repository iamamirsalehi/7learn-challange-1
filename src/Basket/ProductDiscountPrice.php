<?php

namespace Src\Basket;

use Src\Bundle;
use Src\ProductItem;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->basket->getItems() as $item) {
            if($item instanceof Bundle){

            }

            if($item instanceof ProductItem){

            }
        }

        return parent::getPrice() + $totalPrice;
    }
}