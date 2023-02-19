<?php

namespace Src\Basket;

use Src\Bundle;
use Src\ProductItem;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        $totalPriceThatMustBeDiscount = 0;
        foreach ($this->basket->getItems() as $item) {
            if ($item['product'] instanceof Bundle) {
                foreach (range(1, $item['count']) as $productCount) {
                    $totalPriceThatMustBeDiscount += $this->calculateBundlePriceWithDiscount($item['product']);
                }
            }

            if ($item['product'] instanceof ProductItem) {
                foreach (range(1, $item['count']) as $productCount) {
                    $totalPriceThatMustBeDiscount += $this->calculateProductItemPriceWithDiscount($item['product']);
                }
            }
        }

        return parent::getPrice() - $totalPriceThatMustBeDiscount;
    }

    private function calculateBundlePriceWithDiscount(Bundle $bundle): int
    {
        if ($bundle->getDiscount() != 0) {
            return PricePercentageCalculator::getThePercentageAmountOfPrice($bundle->getPrice(), $bundle->getDiscount());
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
            return PricePercentageCalculator::getThePercentageAmountOfPrice($productItem->getPrice(), $productItem->getDiscount());
        }

        return $productItem->getPrice();
    }
}