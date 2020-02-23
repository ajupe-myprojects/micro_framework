<?php

use App\Router;

$routes = [
    '/home' => 'home'
];

function getRoute($routes)
{
    $path_info = $_SERVER['PATH_INFO'] ?? '';
    
    if(isset($routes[$path_info])){
        if($path_info === ''){
            Router::home();
        }else{
            $route = $routes[$path_info];
            Router::$route();
        }
    }else{
        Router::home();
    }
}