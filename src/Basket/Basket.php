<?php

namespace src\Basket;

class Basket
{
    private array $items;

    public function addItem($item): self
    {
        $this->items[] = $item;

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