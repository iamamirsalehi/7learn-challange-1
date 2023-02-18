<?php


namespace Src;
class Product
{
    private int $id;
    private string $title;
    private int $price;
    private float $discount = 0;

    public static function new(string $title, int $price, float $discount = 0): self
    {
        $product = new self();
        $product->setTitle($title);
        $product->setPrice($price);
        $product->setDiscount($discount);
        $product->id = rand(1, 99999999999999);
        //Dispatch an event

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
            throw new \InvalidArgumentException('Price can not be negative');
        }

        $this->price = $price;

        return $this;
    }

    public function setDiscount(float $discount = 0): self
    {
        if ($discount < 0 or $discount > 100) {
            throw new \InvalidArgumentException('Discount must be between 0 and 100 (percent)');
        }

        $this->discount = $discount;

        return $this;
    }

    public function getId(): int
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