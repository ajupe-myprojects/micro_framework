<?php

namespace App\helpers;

class SQLBuilder extends SQLHelper
{

    private $sql;

    public function __construct()
    {
        if(!empty($this->sql)){
            $this->sql = "";
        }
    }

    /**
     * generates sql code (select all or specific columns from table) 
     * and puts it in the SQLBuilder private variable $sql
     * 
     * @param string $table
     * @param array $contents   ['column_name1','column_name2'] !optional! will be "*" if unspecified
     */
    public function selectFrom($table, $contents = NULL)
    {
        $cont = "";
        if($contents !== NULL && $contents[0] !== '*'){
            foreach($contents as $content){
                $cont .= "`$table`.`$content`, ";
            }
            $cont = substr($cont, 0, -2);
        }else{
            $cont = "*";
        }
        $this->sql .= "SELECT ".$cont." FROM `$table`";
    }

    public function where($keywords)
    {
        $part = " WHERE ";
        $count = 0;
        foreach($keywords as $key => $value){
            $count++;
            $part .= $key." = '".$value."'";
            if($count >= 1){
                $part .= " AND ";
            }
        }
        if($count >= 1){
            $part = substr($part, 0, -4);
        }
        $this->sql .= $part;
    }

    public function join($table,$keywords, $contents = NULL)
    {
        $orig_table = '';
        $ins = ", ";
        $parse = $this->sql;
        if(!empty($parse)){

            $pos = strpos($parse,'FROM');
            $sub = substr($parse, $pos + 6);
            $pos2 = strpos($parse,'`');
            $orig_table = substr($sub, 0, $pos2);
            if($contents !== NULL && !strpos($parse,'*')){

                foreach($contents as $content){
                $ins .= "`$table`.`$content`, ";
                }
                $parse = substr_replace($parse, $ins, $pos);
            }

        }
        
        $part = " JOIN `$table` ON `$orig_table`.`$keywords[0]` = `$table`.`$keywords[1]` ";
    }

    /**
     * returns SQL Code (returns the current state of SQLBuilders private $sql variable)
     * 
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }
}