<?php

namespace App;

use App\auth\AuthController;
use App\controllers\HomeController;

class Router
{

    public function home()
    {
        HomeController::renderHome();
    }

    //+++ test functions start +++
    public function user($container)
    {
        $controller = new AuthController($container);
        $controller->index();
    }

    public function stuff($container)
    {
        $controller = new AuthController($container);
        $controller->testUser();
    }

    public function update($container)
    {
        $controller = new AuthController($container);
        $controller->updateUser();
    }

    public function newUser($container)
    {
        $controller = new AuthController($container);
        $controller->newUser();
    }

    public function join($container)
    {
        $controller = new AuthController($container);
        $controller->joinTest();
    }

    public function buildTest($container)
    {
        $controller = new AuthController($container);
        $controller->builderTest();
    }


    //+++ test functions end+++

}