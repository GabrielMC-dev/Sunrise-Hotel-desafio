<?php

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
        $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
    }
//--------------------------------------------------------------------------//
public function __construct($table=null) {
    $this->table = $table;
    $this->setConnection();
}

}