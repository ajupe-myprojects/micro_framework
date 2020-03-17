<?php

namespace App\auth;

use App\repositories\AbstractRepository;
use App\helpers\SQLHelper;

use PDO;

class AuthRepository extends AbstractRepository
{
    public function getTableName()
    {
        return 'users';
    }





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
}