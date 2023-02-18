<?php

namespace Src;

use Src\Exceptions\Business\ProductApplicationException;

class ProductItem extends Product
{
    private string $id;
    private string $title;
    private int $price;
    private float $discount = 0;

    /**
     * @throws ProductApplicationException
     */
    public static function new(string $title, int $price, float $discount = 0): self
    {
        $product = new self();
        $product->id = uniqid('product');
        $product->setTitle($title);
        $product->setPrice($price);
        $product->setDiscount($discount);

        return $product;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setPrice(int $price): self
    {
        if ($price < 0) {
            throw ProductApplicationException::canNotHaveNegativePrice();
        }

        $this->price = $price;

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }
}