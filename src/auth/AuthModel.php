<?php

namespace App\auth;

use App\models\AbstractModel;

class AuthModel extends AbstractModel
{
    public $id;
    public $email;
    public $username;
    public $password;
    public $created_at;
    public $changed_at;
    public $user_token;
    public $user_group;
}