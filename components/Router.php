<?php

class Router
{
    private $routes;


    function __construct()
    {
        //записываем роуты в свойства класса(переменную) $routes
        include __DIR__. '\..\config\routes.php';
        $this->routes = new Routes();
    }

    //метод получает строку запроса чтобы передать ее контроллеру
    private function getURL(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    //принимает управление от фронт контроллера
    public function run()
    {
        $uri = $this->getURL();
        foreach ($this->routes->array as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //функция експолоад разделяет массив в аргументе указан разделитель
                $segments = explode('/',$internalRoute);
                //функция арай шифт адляет первый елемент из массива и потом добавляем имя контроллера
                $controllerName = array_shift($segments). 'Controller';
                //с помощью функции делаем заглавную букву
                $controllerName = ucfirst($controllerName);
                // получаем имя экшена
                $actionName = 'action'.ucfirst(array_shift($segments));

                //массив с параметрами
                $parameters = $segments;


                //Подключаем фаил класс контроллер
                $controllerFile = __DIR__ . '\..\controllers\\' . $controllerName . '.php';
                //проверяем если такой фаил есть тогда подключаем
                if(file_exists($controllerFile)){
                    include_once $controllerFile;
                }
                //создаем обьект класса контроллер
                $controllerObject = new $controllerName;
                //вызываем метод который содержет класс контроллера
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null){
                    return;
                }
            }
        }
    }

}