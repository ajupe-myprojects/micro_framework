<?php

namespace App\auth;

use App\controllers\AbstractController;


class AuthController extends AbstractController
{
    protected $authRepository;

    public function __construct($container)
    {
        $this->authRepository = $container->create("App\auth\AuthRepository");
    }

    public function index()
    {
        $users = $this->authRepository->getAllUsers();
        $this->render('content_home', ['users' => $users]);
    }

    public function testUser()
    {
        $user = $this->authRepository->getByEmail('admin@admin.com');
        $this->render('content_home', ['user' => $user]);
    }
}