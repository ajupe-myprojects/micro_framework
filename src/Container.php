<?php

namespace App;

use PDO;

class Container
{
    private $pdo = [];

    public function __construct()
    {
        $this->pdo = new PDO(DB_DATA[0], DB_DATA[1] ?? NULL, DB_DATA[2] ?? NULL);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $this->pdo;
        
    }

    public function make()
    {
        
    }
}