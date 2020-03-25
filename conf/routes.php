<?php

use App\Router;

$routes = [
    '/home' => 'home',
    '/user' => 'user',
    '/stuff' => 'stuff',
    '/update' => 'update',
    '/new_user' => 'newUser',
    '/join' => 'join',
    '/build_test' => 'buildTest'
];

function getRoute($routes, $container)
{
    $path_info = $_SERVER['PATH_INFO'] ?? '';
    
    if(isset($routes[$path_info])){
        if($path_info === ''){
            Router::home();
        }else{
            $route = $routes[$path_info];
            Router::$route($container);
        }
    }else{
        Router::home();
    }
}