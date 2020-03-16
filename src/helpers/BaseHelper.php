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

    /**
     * Requests all POST/GET data from the current buffer (POST data will overwrite GET data with the same name)
     * 
     * @return array
     */
    public function getAllRequests() 
    {
        return $this->request();
    }

    /**
     * Requests specific POST/GET data. Returns !ERROR! if there is no matching name/designator
     * 
     * @param string    $strg name/designator of the data in question
     * @return string    
     */
    public function getSingleRequest($strg)
    {
        $requests = $this->request();
        if(isset($requests[$strg]) && !empty($requests[$strg])){
            return $requests[$strg];
        }else{
            return '!ERROR!';
        }
    }

    /**
     * Parses a validate test string command (testname => command)
     * 
     * @param string $strg
     * @return array
     */
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