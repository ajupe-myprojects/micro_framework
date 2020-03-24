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
     * returns SQL-Code: get specified columns from a table and combine them with columns from another table which fit a prescribed condition
     * 
     * @param string $table
     * @param array $contents   column name(s) on $table ['column_name', 'column_name']
     * @param string $joined_table  name of the table to join
     * @param array $joined_contents    column name(s) on $joined_table ['column_name', 'column_name']
     * @param array $keywords   associative array ['column on $joined_table' => 'column on $table']
     * @return string
     */
    public function getFromAndJoin($table, $contents, $joined_table, $joined_contents, $keywords)
    {
        $sql = "SELECT ";
        foreach($contents as $content){
            $sql .= "`$table`.`$content`, ";
        }
        foreach($joined_contents as $joined_content){
            $sql .= "`$joined_table`.`$joined_content`, ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " FROM `$table` ";
        $sql .= "LEFT JOIN `$joined_table` ON `$joined_table`.`".array_key_first($keywords)."` = `$table`.`".$keywords[array_key_first($keywords)]."`";

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

    /**
     * returns SQl-Code: update one or more columns of row(s) where keywords are met
     * 
     * @param string $table
     * @param array $updates_array   associative array['column_name' => 'new_value']
     * @param array $keywords   (associative array ['column_name' => 'value'])
     * @return string
     */
    public function updateWhere($table, $updates_array, $keywords)
    {
        $sql = "UPDATE `$table` SET ";
        foreach($updates_array as $ukey => $uvalue){
            $sql .= "`$ukey` = '$uvalue', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE ";
        $count = 0;
        foreach($keywords as $key => $value){
            $count++;
            $sql .= "`$table`.`$key` = '".$value."'";
            if($count >= 1){
                $sql .= " AND ";
            }
        }
        if($count >= 1){
            $sql = substr($sql, 0, -4);
        }
        return $sql;
    }

    /**
     * returns SQL Code: create new entry in $table
     * 
     * @param string $table
     * @param array $contents   associative array ['column_name' => 'value']
     * @return string
     */
    public function createInTable($table, $contents)
    {
        $sql = "INSERT INTO `$table` (";
        $values = [];
        foreach($contents as $key => $value){
            $sql .= "`$key`, ";
            array_push($values, $value);
        }
        $sql = substr($sql, 0, -2);
        $sql .= ") VALUES (";
        foreach($values as $value){
            $sql .= "'$value', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= ")";
        return $sql;
    }


}