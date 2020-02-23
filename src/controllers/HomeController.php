<?php

namespace App\controllers;

class HomeController extends AbstractController
{
    public function renderHome()
    {
        include_once './views/content/content_home.php';
    }
}