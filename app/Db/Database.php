<?php

namespace App\Db;

use \PDO;
use \PDOException;

//config banco de dados
class Database {
    const HOST = 'localhost';
    const NAME = 'srhotel';
    const USER = 'root';
    const PASS = '1234';
//--------------------------------------------------------------------------//
    private $table;

    private $connection;
    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die('ERROR: '. $e->getMessage());
        }
    }
//--------------------------------------------------------------------------//
public function __construct($table=null) {
    $this->table = $table;
    $this->setConnection();
}

}