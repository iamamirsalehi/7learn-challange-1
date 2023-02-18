<?php


use src\Basket;
use src\Product;

$galaxyS21FE = Product::new('Galaxy S21 FE', 18000000, 5);

$basket = new Basket();
$basket->addItem($galaxyS21FE);
$basket->removeItem($galaxyS21FE->getId());
