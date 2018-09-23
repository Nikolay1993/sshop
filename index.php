<?php


//включение ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

//подключения файла роутер
define('router','..\components\Router.php');
require_once (__DIR__. router);


//require_once(__DIR__ .'..\components\Autoload.php');

//экземпляр класса файла роут
$router = new Router();
$router->run();