<?php

namespace App\helpers;
use Exception;

class Validator extends BaseHelper
{
    private function max($value,$test_value)
    {
        if($value > (int)$test_value){
            return 'The entry should be no longer then '.$test_value.' characters';
        }else{
            return '';
        }
    }

    private function min($value,$test_value)
    {
        if($value < (int)$test_value){
            return 'The entry should be at least '.$test_value.' characters long';
        }else{
            return '';
        }
    }

    private function nspchr($value)
    {
        if(preg_match('/^[_A-z0-9,.!?:\n\s()ÜÖÄüöäß-]*$/',$value)){
            return '';
        }else{
            return 'The entry contains characters that are not allowed!';
        }
    }

    private function email($value)
    {
        if(preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/',$value)){
            return '';
        }else{
            return 'This is not a valid email adress!';
        }
    }

    public function validate($array)
    {
        $value = getSingleRequest($array[0]);
        $tests = $array[1];
        foreach ($tests as $test) {
            try{
                $test = parseTest($test);
                $test_function = $test[0];
                $test_value = $test[1];
                $result = $this->$test_function($value,$test_value);
            }catch(Exception $e){
                return 'Wrong test description!';
                
            }
            if(!empty($result)){
                return $result;
            }
        }
        return '!SUCCESS!';
    }
}