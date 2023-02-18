<?php

use src\Basket\Basket;
use Src\Product;
use Src\Bundle;

try {


    $phpCourse = Product::new('PHP Course', 3000000, 5);
    $jsCourse = Product::new('Js Course', 2000000, 2);
    $wordpressCourse = Product::new('Wordpress Course', 1000000, 3);
    $uiCourse = Product::new('UI Course', 1200000, 8);

    $topTenCourses = new Bundle();
    $topTenCourses->addProduct($phpCourse)->addProduct($jsCourse)->addProduct($wordpressCourse)->setDiscount(10);

    $basket = new Basket();
    $basket->addItem($topTenCourses)->addItem($uiCourse);


} catch (\Src\Exceptions\BusinessException $exception) {
    echo sprintf("\n --- %s --- \n", $exception->getMessage());
}
