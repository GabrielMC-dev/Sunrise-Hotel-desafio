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
    const MENSAGEM = 'ERRO no banco de dados!';
//--------------------------------------------------------------------------//
public function __construct($table=null) {
    $this->table = $table;
    $this->setConnection();
}
//--------------------------------------------------------------------------//
private $table;

private $connection;
private function setConnection() {
    try {
        $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
        //die('ERROR: '. $e->getMessage());
        die('ERROR: '. self::MENSAGEM);
    }
}

public function execute($query, $params=[]) {
    try {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }catch(PDOException $e) {
        die('ERROR: '. $e->getMessage());
        //die('ERROR: '. self::MENSAGEM);
    }
}

public function insert($values) {
    $fields = array_keys($values);
    $binds = array_pad([], count($fields), '?');

    $query = 'INSERT INTO ' .$this->table. ' ('. implode(',', $fields) .') VALUES ('.implode(',', $binds).')';

    return $this->execute($query, array_values($values));

    //return $this->connection->lastInsertId();
}

public function select($where=null, $order=null, $limit=null, $fields='*') {
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    return $this->execute($query);

}

public function selectJoinHgemHe($where=null, $order=null, $limit=null, $join='hospede he', $fields='hgem.id, 
                                                                                       he.nome, 
                                                                                       hgem.data, 
                                                                                       hgem.entrada_prevista, 
                                                                                       hgem.saida_prevista, 
                                                                                       hgem.check_in, 
                                                                                       hgem.check_out, 
                                                                                       hgem.qtd_hospede, 
                                                                                       hgem.qtd_quarto, 
                                                                                       hgem.valor_tot, 
                                                                                       hgem.status')
{
    $join = 'JOIN '.$join;
    $onHgemHe = 'ON hgem.id_hospede = he.id';
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$join.' '.$onHgemHe.' '.$where.' '.$order.' '.$limit;
    print_r($query); exit;
    return $this->execute($query);

}

}