<?php

include_once __DIR__ . '\..\models\News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        echo '<pre>';
        print_r($newsList);
        echo '</pre>';
        return true;
    }

    public function actionView($id)
    {
        if($id){
            $newsList = News::getNewsItemById($id);
            echo '<pre>';
            print_r($newsList);
            echo '</pre>';

        }


        return true;
    }
}