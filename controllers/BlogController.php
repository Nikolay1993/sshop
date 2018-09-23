<?php

include_once __DIR__ . '\..\models\Blog.php';

class BlogController
{

    public function actionIndex()
    {
        $blogList = array();
        $blogList = Blog::getBlogList();

        require_once(__DIR__ . '\..\views\blog\index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = Blog::getNewsItemById($id);
            require_once(__DIR__ . '\..\views\blog\view.php');
        }

        return true;
    }

}
