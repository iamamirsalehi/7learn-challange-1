<?php

namespace Src;

class Bundle
{
    private array $products = [];

    public function addProduct(Product $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}