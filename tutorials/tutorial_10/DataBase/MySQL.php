<?php

namespace DataBase;

use PDO;
use PDOException;

/*
*MySQL Database
*constructor
*   $dbhost 
*   $dbuser 
*   $dbname 
*   $dbpwd 
*/

class MySQL
{
    private $dbhost;
    private $dbuser;
    private $dbname;
    private $dbpwd;
    private $db;

    public function __construct(
        $dbhost = "localhost:3300",
        $dbuser = "root",
        $dbname = "house_membership",
        $dbpwd = "root"
    ) {
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbname = $dbname;
        $this->dbpwd = $dbpwd;
        $this->db = null;
    }

    public function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->dbhost;",
                $this->dbuser,
                $this->dbpwd,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );

            $this->db->exec("CREATE DATABASE IF NOT EXISTS  `house_membership`");

            return $this->db  = new PDO(
                "mysql:host=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpwd,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]
            );
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
