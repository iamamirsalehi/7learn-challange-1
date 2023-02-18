<?php

namespace src\Basket;

use Src\Bundle;
use Src\Product;
use Src\ProductItem;

class Basket
{
    private array $items;

    public function addItem(Product $product): self
    {
        $this->items[$product->getId()] = $product;

        return $this;
    }

    public function removeItem(int $id): self
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        return $this;
    }

    public function totalPrice(): self
    {
        return $this;
    }

    public function getItems(): self
    {
        return $this;
    }
}