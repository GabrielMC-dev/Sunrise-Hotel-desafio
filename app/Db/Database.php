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
    const MENSAGEM = 'ERRO no sistema!';
//--------------------------------------------------------------------------//
public function __construct($table) {
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
}

public function updateVTServ($vt, $id) {
    $query = 'UPDATE quarto_servico SET valor_tot = '.$vt.' WHERE id = '.$id;
    return $this->execute($query);
}

public function select($where, $order=null, $limit=null, $fields='*') {
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    return $this->execute($query);

}

// public function selectJoinHgemHe($where=null, $order=null, $limit=null, $join='hospede he', $onHgemHe=null, $fields='hospedagem.id, 
//                                                                                                                      he.nome, 
//                                                                                                                      hospedagem.data, 
//                                                                                                                      hospedagem.entrada_prevista, 
//                                                                                                                      hospedagem.saida_prevista, 
//                                                                                                                      hospedagem.check_in, 
//                                                                                                                      hospedagem.check_out, 
//                                                                                                                      hospedagem.qtd_hospede, 
//                                                                                                                      hospedagem.qtd_quarto, 
//                                                                                                                      hospedagem.valor_tot, 
//                                                                                                                      hospedagem.status')
// {
//     $join = 'JOIN '.$join;
//     $onHgemHe = 'ON hospedagem.id_hospede = he.id';
//     $where = strlen($where) ? 'WHERE '.$where : '';
//     $order = strlen($order) ? 'ORDER BY '.$order : '';
//     $limit = strlen($limit) ? 'LIMIT '.$limit : '';

//     $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$join.' '.$onHgemHe.' '.$where.' '.$order.' '.$limit;
    
//     return $this->execute($query);

// }

public function selectJoinHgemHeQuar($where=null, $order=null, $limit=null, $join=null, $fields=null)
{
    if (empty($fields)) {
        $fields = 'hospedagem.id, he.nome, hospedagem.data, hospedagem.entrada_prevista, hospedagem.saida_prevista, hospedagem.check_in, hospedagem.check_out, hospedagem.qtd_hospede, hospedagem.qtd_quarto, hospedagem.valor_tot, hospedagem.status';
    }

    if (empty($join)) {
        $join = 'hospede he';
    }

    $joinClause  = ' JOIN ' . $join;
    $onClause    = ' ON hospedagem.id_hospede = he.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause . $onClause . $whereClause . $orderClause . $limitClause;
    
    return $this->execute($query);
}




public function selectJoinQuarCatquar($where=null, $order=null, $limit=null, $join=null, $fields=null)
{
    if (empty($fields)) {
        $fields = 'quarto.id, quarto.numero, quarto.andar, categoria_quarto.categoria, categoria_quarto.valor_dia, categoria_quarto.capac_max, quarto.status';
    }

    if (empty($join)) {
        $join = 'categoria_quarto';
    }

    if (empty($order)) {
        $order = 'quarto.numero';
    }

    $joinClause  = ' JOIN ' . $join;
    $onClause    = ' ON quarto.id_categoria = categoria_quarto.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause . $onClause . $whereClause . $orderClause . $limitClause;
    
    return $this->execute($query);
}




public function selectJoinHgem_Quar_Serv($where, $order, $limit, $join1, $join2, $join3, $fields)
{

    if (empty($fields)) {
        $fields = 'hospedagem.id, quarto.numero, servico.servico, quarto_servico.data_h, quarto_servico.qtd, servico.valor_uni, quarto_servico.valor_tot';
    }

    if (empty($join1)) {
        $join1 = 'hospedagem';
    }
    if (empty($join2)) {
        $join2 = 'quarto';
    }
    if (empty($join3)) {
        $join3 = 'servico';
    }

    if (empty($order)) {
        $order = 'quarto_servico.id_hospedagem';
    }

    $joinClause1  = ' JOIN ' . $join1;
    $joinClause2  = ' JOIN ' . $join2;
    $joinClause3  = ' JOIN ' . $join3;
    $onClause1    = ' ON quarto_servico.id_hospedagem = hospedagem.id';
    $onClause2    = ' ON quarto_servico.id_quarto = quarto.id';
    $onClause3    = ' ON quarto_servico.id_servico = servico.id';
    $whereClause = !empty($where) ? ' WHERE ' . $where : '';
    $orderClause = !empty($order) ? ' ORDER BY ' . $order : '';
    $limitClause = !empty($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause1 . $onClause1 . $joinClause2 . $onClause2 .  $joinClause3 . $onClause3 . $whereClause . $orderClause . $limitClause;
    
    return $this->execute($query);
}



public function selectJoinManut_limpQuar($where=null, $order=null, $limit=null, $join=null, $fields=null) {
    if (empty($fields)) {
        $fields = 'manut_limp.id, quarto.numero, manut_limp.data, manut_limp.tipo, manut_limp.responsavel, manut_limp.status';
    }

    if (empty($join)) {
        $join = 'quarto';
    }

    $joinClause  = ' JOIN ' . $join;
    $onClause    = ' ON manut_limp.id_quarto = quarto.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause . $onClause . $whereClause . $orderClause . $limitClause;
    
    return $this->execute($query);
}

public function selectVT($where, $order=null, $limit=null, $join1=null, $join2=null, $join3=null, $fields=null) {
    
    if (empty($fields)) {
        
    }

    $fields = 'hgem.id, hgem.qtd_hospede, cq.valor_dia, qs.valor_tot';

    if (empty($join1)) {
        $join1 = 'hospedagem hgem';
    }

    if (empty($join2)) {
        $join2 = 'quarto q';
    }

        if (empty($join3)) {
        $join3 = 'categoria_quarto cq';
    }

    $joinClause1  = ' JOIN ' . $join1;
    $joinClause2  = ' JOIN ' . $join2;
    $joinClause3  = ' JOIN ' . $join3;
    $onClause1    = ' ON hgem.id = hospedagem_quarto.id_hospedagem';
    $onClause2    = ' ON q.id = hospedagem_quarto.id_quarto';
    $onClause3    = ' ON q.id_categoria = cq.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause1 . $onClause1 . $joinClause2 . $onClause2 . $joinClause3 . $onClause3 . $whereClause . $orderClause . $limitClause;

    return $this->execute($query);
}

}