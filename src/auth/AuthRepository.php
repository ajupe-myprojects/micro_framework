<?php

namespace App\auth;

use App\repositories\AbstractRepository;
use App\helpers\SQLHelper;
use App\helpers\SQLBuilder;

use PDO;

class AuthRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'users';
    }



    //+++ test functions start +++

    public function getAllUsers()
    {
        $table = $this->getTableName();
        $sql = SQLHelper::getFrom($table, ['username', 'email']);
        $qry = $this->pdo->prepare($sql);
        $qry->execute();
        $users = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getByEmail($strg)
    {
        $table = $this->getTableName();
        $sql = SQLHelper::getFromWhere($table,['password', 'user_group'],['email' => $strg]);
        $qry = $this->pdo->prepare($sql);
        $qry->execute();
        $user = $qry->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateUserTable($id, $updates_array)
    {
        $table = $this->getTableName();
        $sql = SQLHelper::updateWhere($table, $updates_array, ['id' => $id]);
        $qry = $this->pdo->prepare($sql);
        $qry->execute();
    }

    public function createUser($contents)
    {
        $table = $this->getTableName();
        $sql = SQLHelper::createInTable($table, $contents);
        $qry = $this->pdo->prepare($sql);
        $qry->execute();
    }

    public function getAllUsersAndRoles()
    {
        $table = $this->getTableName();
        $sql = SQLHelper::getFromAndJoin(
            $table,
            ['username', 'email'],
            'groups',
            ['group_name', 'right_create'],
            ['group_id' => 'user_group']
        );
        var_dump($sql);
        die;
    }

    public function buildSome()
    {
        $table = $this->getTableName();
        $script = new SQLBuilder();
        $script->selectFrom($table);
        $script->where(['username' => 'Admin']);
        $sql = $script->getSql();
        var_dump($sql);
        die;
    }
    //+++ test functions end+++
}