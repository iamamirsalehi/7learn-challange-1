<?php

require_once "vendor/autoload.php";

use Src\Basket\Basket;
use Src\Bundle;
use Src\SingleProduct;
use Src\Basket\ProductDiscountPrice;

try {

    $phpCourse = SingleProduct::new('PHP Course', 3000000, 5);
    $jsCourse = SingleProduct::new('Js Course', 2000000, 2);
    $wordpressCourse = SingleProduct::new('Wordpress Course', 1000000, 3);
    $uiCourse = SingleProduct::new('UI Course', 1200000, 8);

    $topThreeCourses = new Bundle();
    $topThreeCourses
        ->setTitle('سه تا از بهترین دوره ها')
        ->addProduct($phpCourse)
        ->addProduct($jsCourse)
        ->addProduct($wordpressCourse)
        ->setDiscount(10);

    $basket = new Basket();
    $basket->addItem($topThreeCourses)->addItem($uiCourse)->addItem($uiCourse);

    $basketDiscount = new ProductDiscountPrice($basket);
    echo sprintf("\n --- %s --- \n", $basketDiscount->getPrice());

} catch (\src\Exceptions\Contract\BusinessException $exception) {
    echo sprintf("\n --- %s --- \n", $exception->getMessage());
}
