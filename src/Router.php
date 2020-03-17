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
}