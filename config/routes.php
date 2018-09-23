<?php

class Routes
{
    public $array;

    function __construct()
    {
             $this->array = [
               //  'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2'

//               'news/([0-9]+)'=>'news/view/$1',
//               'news'=>'news/index'
                 'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

                 'catalog' => 'catalog/index', // actionIndex в CatalogController
                 'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
                 'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController

                 'user/register' => 'user/register',
                 'user/login' => 'user/login',
                 'user/logout' => 'user/logout',

                 'cabinet/edit' => 'cabinet/edit',
                 'cabinet' => 'cabinet/index',

                 '' => 'site/index', // actionIndex в SiteController
             ];
    }

}