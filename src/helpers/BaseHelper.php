<?php

namespace App\helpers;


class BaseHelper
{
    private $html_requests = [];

    public function __construct()
    {
        $this->html_requests = $this->request();
    }

    private function requestMethod() : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function request()
    {
        if (!empty($this->requestMethod() === 'POST') || !empty($this->requestMethod() === 'GET')) {

            return array_merge($_GET, $_POST);
        }
        return [];
    }

    public function getRequests() 
    {
        $requests = $this->html_requests;
        return $requests;
    }
}