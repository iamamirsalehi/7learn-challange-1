<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

class Bundle
{
    private array $products = [];
    private float $discount = 0;

    public function addProduct(Product $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    public function setDiscount(float $discount = 0): self
    {
        if ($discount < 0 or $discount > 100) {
            throw ProductApplicationException::discountMustBeBetweenZeroAndHundred();
        }

        $this->discount = $discount;

        return $this;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getTotalPrice(): int
    {
        $totalPrice = 0;

        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }

        return $totalPrice;
    }

}