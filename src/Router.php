<?php

namespace App;

use App\controllers\HomeController;

class Router
{
    

    public function home()
    {
        HomeController::renderHome();
    }
}