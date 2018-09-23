<?php

include_once __DIR__. '\..\models\Category.php';
include_once __DIR__. '\..\models\Product.php';

class ProductController
{

    public function actionView($productId)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);

        require_once(__DIR__ . '\..\views\product\view.php');

        return true;
    }

}
