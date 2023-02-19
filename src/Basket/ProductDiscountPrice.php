<?php

namespace Src\Basket;

use Src\Bundle;
use Src\SingleProduct;

class ProductDiscountPrice extends BasketPriceDecorator
{
    public function getPrice(): int
    {
        $totalDiscount = 0;
        foreach ($this->basket->getItems() as $item) {
            if ($item['product'] instanceof Bundle) {
                foreach (range(1, $item['count']) as $productCount) {
                    $totalDiscount += $this->calculateBundlePriceWithDiscount($item['product']);
                }
            }

            if ($item['product'] instanceof SingleProduct) {
                foreach (range(1, $item['count']) as $productCount) {
                    $totalDiscount += $this->calculateProductItemPriceWithDiscount($item['product']);
                }
            }
        }

        return parent::getPrice() - $totalDiscount;
    }

    private function calculateBundlePriceWithDiscount(Bundle $bundle): int
    {
        if ($bundle->getDiscount() != 0) {
            return PricePercentageCalculator::getThePercentageAmountOfPrice($bundle->getPrice(), $bundle->getDiscount());
        }

        $totalDiscount = 0;

        foreach ($bundle->getProducts() as $product) {
            $totalDiscount += $this->calculateProductItemPriceWithDiscount($product);
        }

        return $totalDiscount;
    }

    private function calculateProductItemPriceWithDiscount(SingleProduct $productItem): int
    {
        if ($productItem->getDiscount() != 0) {
            return PricePercentageCalculator::getThePercentageAmountOfPrice($productItem->getPrice(), $productItem->getDiscount());
        }

        return $productItem->getPrice();
    }
}