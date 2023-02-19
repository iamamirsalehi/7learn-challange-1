<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

class Bundle extends Product
{
    private array $products = [];

    public function addProduct(SingleProduct $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getPrice(): int
    {
        $totalPrice = 0;

        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice();
        }

        return $totalPrice;
    }
}