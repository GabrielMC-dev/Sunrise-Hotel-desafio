<?php

namespace app\Db;

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

public function updateDiasTot($qtd, $id) {
    $query = 'UPDATE '.$this->table.' SET total_dias = '.$qtd.' WHERE id = '.$id;
    return $this->execute($query);
}

public function updateVTHgem($vt, $id) {
    $query = 'UPDATE hospedagem SET valor_tot = '.$vt.' WHERE id = '.$id;
    return $this->execute($query);
}

public function updateStatusHgem($status, $id) {
    $query = 'UPDATE '.$this->table.' SET status = '.$status.' WHERE hospedagem.id = '.$id;
    return $this->execute($query);
}

public function updateStsQuar($status ,$idQuarto) {
    $query = 'UPDATE '.$this->table.' SET status = '.$status.' WHERE quarto.id = '.$idQuarto;
    return $this->execute($query);
}

public function updateCheck_io($check, $dataHora ,$idHgem) {
    $query = 'UPDATE '.$this->table.' SET '.$check.' = "'.$dataHora.'" WHERE hospedagem.id = '.$idHgem;
    return $this->execute($query);
}

public function updateFaturaMes($totalHgem, $faturamento, $id) {
    $query = 'UPDATE '.$this->table.' SET total_hospedagens = '.$totalHgem.', faturamento_total = '.$faturamento.' WHERE id = '.$id;
    return $this->execute($query);
}

public function select($where, $order=null, $limit=null, $fields='*') {
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    return $this->execute($query);
}

public function selectJoinHgemHeQuar($where, $fields, $order=null, $limit=null, $join=null)
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




public function selectJoinQuarCatquar($where, $order=null, $limit=null, $join=null, $fields=null)
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
        $fields = 'quarto_servico.id, quarto_servico.id_hospedagem, quarto.numero, servico.servico, quarto_servico.data_h, quarto_servico.qtd, servico.valor_uni, quarto_servico.valor_tot';
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



public function selectJoinManut_limpQuar($where, $fields, $on, $order=null, $limit=null, $join=null) {
    if (empty($fields)) {
        $fields = 'manut_limp.id, quarto.numero, manut_limp.data, manut_limp.tipo, manut_limp.responsavel, manut_limp.status';
    }

    if (empty($join)) {
        $join = 'quarto';
    }

    $joinClause  = ' JOIN ' . $join;
    $onClause    = strlen($on) ? ' ON ' . $on : ' ON manut_limp.id_quarto = quarto.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause . $onClause . $whereClause . $orderClause . $limitClause;
    return $this->execute($query);
}

public function selectValor_dia($where, $order=null, $limit=null, $join1=null, $join2=null, $join3=null, $fields=null) {
    
    if (empty($fields)) {
        $fields = 'hospedagem_quarto.id_hospedagem, hospedagem_quarto.id_quarto, cq.categoria, cq.valor_dia';
    }


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
    $onClause1    = ' ON hospedagem_quarto.id_hospedagem = hgem.id';
    $onClause2    = ' ON hospedagem_quarto.id_quarto = q.id';
    $onClause3    = ' ON q.id_categoria = cq.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';

    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause1 . $onClause1 . $joinClause2 . $onClause2 . $joinClause3 . $onClause3 . $whereClause . $orderClause . $limitClause;

    return $this->execute($query);
}

public function selectServMC($where=null, $order='SUM(quarto_servico.qtd) desc', $join='servico s', $limit=null, $fields='s.id, s.servico, SUM(quarto_servico.qtd)') {
    $joinClause  = ' JOIN ' . $join;
    $onClause    = ' ON quarto_servico.id_servico = s.id';
    $groupClause = ' GROUP BY s.id';
    $whereClause = strlen($where) ? ' WHERE ' . $where : '';
    $orderClause = strlen($order) ? ' ORDER BY ' . $order : '';
    $limitClause = strlen($limit) ? ' LIMIT ' . $limit : '';
    
    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $joinClause . $onClause . $groupClause . $whereClause . $orderClause . $limitClause;
    
    return $this->execute($query);
}

public function selectSumTaxa() {
    $query = "SELECT SUM(qtd_hospede) FROM ".$this->table." WHERE STATUS = 'Em andamento'";
    return $this->execute($query);
}

public function selectUltimaHospedagem() {
    $query = 'SELECT id FROM '.$this->table.' ORDER BY id desc LIMIT 1';
    return $this->execute($query);
}

public function selectQuarMRes($fields = 'q.numero, count(*)') {
    $query = 'SELECT '.$fields.' FROM '.$this->table.' JOIN quarto q ON hospedagem_quarto.id_quarto = q.id GROUP BY hospedagem_quarto.id_quarto ORDER BY count(*) desc';
    return $this->execute($query);
}

public function selectHeMFreq($fields='he.nome, count(*)') {
    $query = 'select '.$fields.' from hospede_hospedagem join hospede he on hospede_hospedagem.id_hospede = he.id group by he.nome order by count(*) desc, hospede_hospedagem.id_hospede';
    return $this->execute($query);
    }
    
public function selectHgemTotMes($ano, $mes) {
    $query = 'SELECT COUNT(*) AS total_qtd FROM hospedagem WHERE YEAR(check_out) = '.$ano.' AND MONTH(check_out) = '.$mes.'';
    return $this->execute($query);
}

public function selectValorTotHgemMensal() {
    $query = '';
    return $this->execute($query);
}

public function selectFaturaMensalHgem($ano, $mes) {
    $query = 'SELECT SUM(valor_tot) FROM '.$this->table.' WHERE YEAR(check_out) = '.$ano.' AND MONTH(check_out) = '.$mes.' AND check_out != 0';
    return $this->execute($query);
}

public function selectFatMen($where, $ano, $mes) {
    if(!isset($where)) {
        $query = 'SELECT * FROM fatura_mensal';
        }
    else {
        $whereClause = ' WHERE ano = '.$ano.' AND mes = '.$mes;
        $query = 'SELECT * FROM fatura_mensal'.$whereClause;
    }
    return $this->execute($query);
}

public function selectHeHgem($where, $order='hospede_hospedagem.id_hospedagem, hospede_hospedagem.id', $join='hospede h', $limit=null, $fields='hospede_hospedagem.id, h.nome, hospede_hospedagem.id_hospedagem') {

    
    if(empty($where)) {
        $whereClause='';
    }
    else {
        $whereClause = 'WHERE '.$where;
    }
        
    $query = 'SELECT '.$fields.' FROM '.$this->table.' JOIN '.$join.' ON hospede_hospedagem.id_hospede = h.id '.$whereClause.' ORDER BY '.$order;
    return $this->execute($query);
}

}