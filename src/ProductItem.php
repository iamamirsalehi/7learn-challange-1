<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

class ProductItem extends Product
{
    private int $price;

    /**
     * @throws ProductApplicationException
     */
    public static function new(string $title, int $price, float $discount = 0): self
    {
        $product = new self();
        $product->setTitle($title);
        $product->setPrice($price);
        $product->setDiscount($discount);

        return $product;
    }

    public function setPrice(int $price): self
    {
        if ($price < 0) {
            throw ProductApplicationException::canNotHaveNegativePrice();
        }

        $this->price = $price;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}