<?php

namespace app\classes\database\models;

use app\classes\database\Connect;
use PDO;

abstract class Model
{

    protected PDO $connect;
    
    public function __construct() 
    {
        $this->connect = Connect::connect();
    }

}
