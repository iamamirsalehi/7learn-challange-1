<?php

use src\Basket\Basket;
use Src\Bundle;
use Src\ProductItem;

try {


    $phpCourse = ProductItem::new('PHP Course', 3000000, 5);
    $jsCourse = ProductItem::new('Js Course', 2000000, 2);
    $wordpressCourse = ProductItem::new('Wordpress Course', 1000000, 3);
    $uiCourse = ProductItem::new('UI Course', 1200000, 8);

    $topTenCourses = new Bundle();
    $topTenCourses->addProduct($phpCourse)->addProduct($jsCourse)->addProduct($wordpressCourse)->setDiscount(10);

    $basket = new Basket();
    $basket->addItem($topTenCourses)->addItem($uiCourse);

} catch (\src\Exceptions\Contract\BusinessException $exception) {
    echo sprintf("\n --- %s --- \n", $exception->getMessage());
}
