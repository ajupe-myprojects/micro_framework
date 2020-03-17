<?php
namespace App\helpers;

class SQLHelper
{

    /**
     * returns SQL-Code: specified (or all(*)) columns from all rows in the specified  database table
     * 
     * @param string $table
     * @param array $contents
     * @return string
     */
    public function getFrom($table, $contents)
    {
        $sql = "SELECT ";
        $sql .= implode(',', $contents);
        $sql .= " FROM `$table`";
        return $sql;
    }

    /**
     * returns SQl-Code: all columns of a row where keywords are met (single row (first matching row))
     * 
     * @param string $table
     * @param array $contents   all(*) or column name(s) ['column_name', 'column_name']
     * @param array $keywords   (associative array ['column_name' => 'value'])
     * @return string
     */
    public function getFromWhere($table, $contents, $keywords)
    {
        $sql = "SELECT ";
        $sql .= implode(',', $contents);
        $sql .= " FROM `$table` WHERE ";
        $count = 0;
        foreach($keywords as $key => $value){
            $count++;
            $sql .= $key." = '".$value."'";
            if($count >= 1){
                $sql .= " AND ";
            }
        }
        if($count >= 1){
            $sql = substr($sql, 0, -4);
        }
        return $sql;
    }
}