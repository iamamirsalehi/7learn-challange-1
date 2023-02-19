<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

class Bundle extends Product
{
    private string $id;
    private array $products = [];
    private float $discount = 0;

    public function __construct()
    {
        $this->id = uniqid('bundle');
    }

    public function addProduct(ProductItem $product): self
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

    public function getDiscount(): float
    {
        return $this->discount;
    }
}