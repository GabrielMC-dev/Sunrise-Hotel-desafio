<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;
require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

use \PDO;

class Hospedagem {
    private $id;
    private $id_hospede;
    private $data;
    private $entrada_prevista;
    private $saida_prevista;
    private $check_in;
    private $check_out;
    private $qtd_hospede;
    private $qtd_quarto;
    private $valor_tot;
    private $status;

//--------------------------------------------------------------------------//
public function realizar_hospm() {
    //data da hospedagem
    $this->data = date('Y-m-d');
    //inserir hospedagem no banco
    $obDatabase = new Database('hospedagem');
    $this->id = $obDatabase->insert([
                         'id_hospede'       => $this->id_hospede,
                         'data'             => $this->data,
                         'entrada_prevista' => $this->entrada_prevista,
                         'saida_prevista'   => $this->saida_prevista,
                         'check_in'         => $this->check_in,
                         'check_out'        => $this->check_out,
                         'qtd_hospede'      => $this->qtd_hospede,
                         'qtd_quarto'       => $this->qtd_quarto,
                         'valor_tot'        => $this->valor_tot,
                         'status'           => $this->status
                     ]);

    return true;
}

public static function getHospedagem($where=null,$order=null,$limit=null,$join=null, $fields=null) {
    return (new Database('hospedagem'))->selectJoinHgemHe($where,$order,$limit,$join,$fields)
                                       ->fetchAll(PDO::FETCH_OBJ);
}

}
