<?php

namespace App\auth;

use App\controllers\AbstractController;


class AuthController extends AbstractController
{
    public function __construct($container)
    {
        $authRepository = $container->create("App\auth\AuthRepository");
        var_dump($authRepository);
        die;
    }
}