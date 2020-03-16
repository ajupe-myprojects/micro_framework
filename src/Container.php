<?php

namespace App;

use PDO;

class Container
{
    private $instance = [];

    public function __construct()
    {
        $pdo = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->instance = $pdo;
    }


    /**
     * Get a repository from the database
     * 
     * @param   string $repository The path and name of the repository to be created
     * @return  sql_object
     */
    public function create($repository)
    {
        return new $repository($this->instance);
    }
}