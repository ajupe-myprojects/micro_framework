<?php


class DbCreator
{

    public function createUserTable($user)
    {
        $db = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);;
        try{
            $db->query("CREATE TABLE IF NOT EXISTS users (".$user['id'].", ".$user['email'].", ".$user['username'].", ".$user['password'].", ".$user['created_at'].", ".$user['changed_at'].", ".$user['user_token'].");");
            echo 'The table "users" was created';
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function dropUserTable()
    {
        $db = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);;
        try{
            $db->query("DROP TABLE IF EXISTS users");
            echo 'The table "users" was deleted';
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}