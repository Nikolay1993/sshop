<?php


include_once __DIR__. '\..\models\Category.php';
include_once __DIR__. '\..\models\Product.php';


class SiteController
{


    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        require_once(__DIR__ . '\..\views\site\index.php');

        return true;
    }

}