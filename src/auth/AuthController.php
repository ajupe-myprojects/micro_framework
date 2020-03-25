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
    //+++test functions (

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

    public function updateUser()
    {
        $this->authRepository->updateUserTable('2', ['username' => 'Moppelator', 'email' => 'test@test.de']);
        $this->index();
    }

    public function newUser()
    {
        $contents = [
            'email' => 'dada@dada.da',
            'username' => 'Doof',
            'password' => '$2y$10$UJgWzUSW1TYbND4M8mTlRO/8LYDAmQdPOUN7u/XcjfSNxCXu0d3fe',
            'created_at' => '2020-03-23 12:26:31',
            'changed_at' => '2020-03-23 12:26:31',
            'user_token' => '',
            'user_group' => 2
        ];
        $this->authRepository->createUser($contents);
        $this->index();
    }


    public function joinTest()
    {
        $this->authRepository->getAllUsersAndRoles();
        $this->index();
    }

    public function builderTest()
    {
        $this->authRepository->buildSome();
    }
    //+++test functions )
}