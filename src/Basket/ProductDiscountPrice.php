<?php

namespace Src\Basket;

use Src\Bundle;
use Src\ProductItem;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        //TODO: calculate count
        $totalPrice = 0;
        foreach ($this->basket->getItems() as $item) {
            if ($item instanceof Bundle) {
                $totalPrice += $this->calculateBundlePriceWithDiscount($item);
            }

            if ($item instanceof ProductItem) {
                $totalPrice += $this->calculateProductItemPriceWithDiscount($item);
            }
        }

        return parent::getPrice() + $totalPrice;
    }

    private function calculateBundlePriceWithDiscount(Bundle $bundle): int
    {
        if ($bundle->getDiscount() != 0) {
            return PricePercentageCalculator::getTheActualPrice($bundle->getPrice(), $bundle->getDiscount());
        }

        $totalPrice = 0;

        foreach ($bundle->getProducts() as $product) {
            $totalPrice += $this->calculateProductItemPriceWithDiscount($product);
        }

        return $totalPrice;
    }

    private function calculateProductItemPriceWithDiscount(ProductItem $productItem): int
    {
        if ($productItem->getDiscount() != 0) {
            return PricePercentageCalculator::getTheActualPrice($productItem->getPrice(), $productItem->getDiscount());
        }

        return $productItem->getPrice();
    }
}