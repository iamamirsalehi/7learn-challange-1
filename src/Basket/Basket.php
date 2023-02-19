<?php

namespace Src\Basket;

use Src\Product;

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
        $this->items[$product->getId()]['count'] = 1;

        return $this;
    }

    public function removeItem(string $id): self
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
            foreach (range(1, $product['count']) as $count) {
                $price += $product['product']->getPrice();
            }
        }
        return $price;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}