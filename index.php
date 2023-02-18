<?php

use src\Basket\Basket;
use Src\Product;
use Src\Bundle;

$phpCourse = Product::new('PHP Course', 3000000, 5);
$jsCourse = Product::new('Js Course', 2000000, 2);
$wordpressCourse = Product::new('Wordpress Course', 1000000, 3);
$uiCourse = Product::new('UI Course', 1200000, 8);

$topTenCourses = new Bundle();
$topTenCourses->addProduct($phpCourse)->addProduct($jsCourse)->addProduct($wordpressCourse);

$basket = new Basket();
$basket->addItem($topTenCourses)->addItem($uiCourse);
