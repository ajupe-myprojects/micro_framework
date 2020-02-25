<?php
//++++ Database data (edit here)++++//
$db_connections = [
    'type' => 'mysql',
    'host' => 'localhost',
    'db_name' => 'framework_test',
    'charset' => 'utf8',
    'username' => 'root',
    'password' => ''
];

//++ database definition++//
switch($db_connections['type']){
    case 'mysql':
        define('DB_DATA', ['mysql:host='.$db_connections['host'].';dbname='.$db_connections['db_name'].';charset='.$db_connections['charset'],
                    $db_connections['username'],
                    $db_connections['password']]);
        break;
    case 'sqlite':
        define('DB_DATA', ['sqlite:'.$db_connections['host']]);
        break;
}

