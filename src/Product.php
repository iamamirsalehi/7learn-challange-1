<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

abstract class Product
{
    protected string $title;
    protected float $discount = 0;

    abstract public function getPrice(): int;

    abstract public function getId(): string;

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }
}