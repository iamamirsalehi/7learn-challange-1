<?php

namespace Src\Basket;

use Src\Bundle;
use Src\Product;
use Src\ProductItem;

class Basket
{
    private array $items = [];

    public function addItem(Product $product): self
    {
        if (isset($this->items[$product->getId()])) {
            $this->items[$product->getId()]['count'] += 1;

            return $this;
        }

        $this->items[$product->getId()]['product'] = $product;
        $this->items[$product->getId()]['count'] = 0;

        return $this;
    }

    public function removeItem(int $id): self
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        return $this;
    }

    public function getPrice(): int
    {
        $price = 0;
        foreach ($this->items as $productId => $product) {
            $price += $product['product']->getPrice();
        }
        return $price;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}