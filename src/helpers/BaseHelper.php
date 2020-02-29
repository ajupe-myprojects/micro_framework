<?php

namespace App\helpers;


class BaseHelper
{

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

    public function getAllRequests() 
    {
        return $this->request();
    }

    public function getSingleRequest($strg)
    {
        $requests = $this->request();
        if(isset($requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }

    public function parseTest($strg)
    {
        $pos = strpos($strg,'(');
        if($pos && $pos > 0){
            $func = trim(substr($strg,0,$pos));
            $param = (int)substr($strg,$pos);
        }else{
            $func = trim($strg);
            $param = null;
        }
        
        return [$func,$param];
    }
}