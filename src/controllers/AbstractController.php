<?php

namespace App\controllers;


abstract class AbstractController
{
    protected function render($view, $params)
    {
        extract($params);
        include __DIR__."./../../views/{$view}.php";
    }
}