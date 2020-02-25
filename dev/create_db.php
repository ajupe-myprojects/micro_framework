<?php

require_once $_SERVER['DOCUMENT_ROOT'].'conf/settings.php';
require_once 'create_functions.php';


$type = $argv[1] ?? '';
$mode = $argv[2] ?? '';

$user = ['id' => 'id INT( 11 ) AUTO_INCREMENT PRIMARY KEY',
        'email' => 'email VARCHAR( 250 ) NOT NULL',
        'username' => 'username VARCHAR( 250 ) NOT NULL',
        'password' => 'password VARCHAR( 250 ) NOT NULL',
        'created_at' => 'created_at TIMESTAMP NULL',
        'changed_at' => 'changed_at TIMESTAMP NULL',
        'user_token' => 'user_token VARCHAR( 250 ) NOT NULL'
    ];

switch($type){
    case 'auth':
        if($mode !== 'delete'){
            DbCreator::createUserTable($user);
        }
        if($mode === 'delete'){
            DbCreator::dropUserTable();
        }
        break;
    default :
        echo 'Please add a correct parameter!';

}