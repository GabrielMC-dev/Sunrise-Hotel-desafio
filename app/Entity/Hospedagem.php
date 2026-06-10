<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;
use \PDO;

class Hospedagem {
    private $id;
    private $id_hospede;
    private $data;
    private $entrada_prevista;
    private $saida_prevista;
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
                         'id_hospede'    => $this->id_hospede,
                         'data'        => $this->data,
                         'entrada_prevista' => $this->entrada_prevista,
                         'saida_prevista'   => $this->saida_prevista,
                         'qtd_hospede' => $this->qtd_hospede,
                         'qtd_quarto' => $this->qtd_quarto,
                         'valor_tot'    => $this->valor_tot,
                         'status'      => $this->status
                     ]);

    return true;
}

public static function getHospedagem($where=null,$order=null,$limit=null) {
    return (new Database('hospedagem'))->select($where,$order,$limit)
                                       ->fetchAll(PDO::FETCH_CLASS, self::class);
}

}
