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
        'user_token' => 'user_token VARCHAR( 250 ) NOT NULL',
        'user_group' => ' user_group INT(11)'
    ];

$group = [
    'id' => 'id INT( 11 ) AUTO_INCREMENT PRIMARY KEY',
    'group_name' => 'group_name VARCHAR( 250 ) NOT NULL',
    'group_rights' => 'group_rights VARCHAR( 250 ) NOT NULL',
    'created_at' => 'created_at TIMESTAMP NULL',
    'changed_at' => 'changed_at TIMESTAMP NULL'
];

switch($type){
    case 'auth':
        if($mode !== 'delete'){
            DbCreator::createUserTable($user);
            DbCreator::createGroupTable($group);
        }
        if($mode === 'delete'){
            DbCreator::dropUserTable();
            DbCreator::dropGroupTable();
        }
        break;
    default :
        echo 'Please add a correct parameter!';
        echo 'Working parameters (atm):';
        echo 'auth = create users and user_group table';
        echo 'auth delete = delete users and user_group table';

}