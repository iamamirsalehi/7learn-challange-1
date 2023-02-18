<?php

namespace Src;

abstract class Product
{
    abstract public function getPrice(): int;
    abstract public function getId(): string;
}