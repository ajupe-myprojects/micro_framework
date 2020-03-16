<?php


class DbCreator
{

    public function createUserTable($user)
    {
        $db = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);;
        try{
            $db->query("CREATE TABLE IF NOT EXISTS users (".$user['id'].", ".$user['email'].", ".$user['username'].", ".$user['password'].", ".$user['created_at'].", ".$user['changed_at'].", ".$user['user_token'].", ".$user['user_group'].");");
            echo 'The table "users" was created';
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function createGroupTable($group)
    {
        $db = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);;
        try{
            $db->query("CREATE TABLE IF NOT EXISTS user_groups (".$group['id'].", ".$group['group_name'].", ".$group['group_rights'].", ".$group['created_at'].", ".$group['changed_at'].");");
            $db->query("ALTER TABLE `users` ADD FOREIGN KEY (`user_group`) REFERENCES `user_groups`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT");
            echo 'The table "user_groups" was created';
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
    public function dropGroupTable()
    {
        $db = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);;
        try{
            $db->query("DROP TABLE IF EXISTS user_groups");
            echo 'The table "user_groups" was deleted';
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}