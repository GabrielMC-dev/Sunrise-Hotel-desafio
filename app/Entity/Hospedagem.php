<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;


require_once 'app/Entity/CatQuarto.php';
use \app\Entity\CatQuarto;

require_once 'app/Entity/HgemQuarServ.php';
use \app\Entity\HgemQuarServ;

use \PDO;

class Hospedagem {
    public $id;
    public $id_hospede;
    public $data;
    public $entrada_prevista;
    public $saida_prevista;
    public $check_in;
    public $check_out;
    public $total_dias;
    public $qtd_hospede;
    public $qtd_quarto;
    public $valor_tot;
    public $status;

//--------------------------------------------------------------------------//
public function realizar_hospm() {
    $this->data = date('Y-m-d');
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
}

public static function getHospedagens($where=null,$order=null,$limit=null,$join=null, $fields=null) {
    return (new Database('hospedagem'))->selectJoinHgemHeQuar($where,$order,$limit,$join,$fields)
                                       ->fetchAll(PDO::FETCH_OBJ);

}

public static function getHospedagem($id) {
        $id = (int)$id;
        return (new Database('hospedagem'))->select('hospedagem.id='. $id)
                                        ->fetchObject(self::class);
}

public function getHospedesMF() {
    return (new Database('hospedagem'))->selectHeMFreq()
                                    ->fetchAll(PDO::FETCH_OBJ);
}

public function diasTotais($check_in, $check_out, $id) {
    $inicio = strtotime($check_in);
    $fim = strtotime($check_out);

    $diferenca = $fim - $inicio;
    $diasFracionados = $diferenca / 86400;

    $diasArredondados = floor($diasFracionados);

    $this->total_dias = $diasArredondados + 1;

    $update = new Database('hospedagem');
    $update->updateDiasTot($this->total_dias, $id);
    
    return $this->total_dias;
}

public function valorDiaria($id) {
    return (new Database('hospedagem_quarto'))->selectValor_dia($id)
                                              ->fetchAll(PDO::FETCH_OBJ);
}

public function valorTotalHgem($idHgem) {
    $id = (int)$idHgem;
    
    $obHospedagem = new Hospedagem;
    $hgens = $obHospedagem->valorDiaria('hospedagem_quarto.id_hospedagem ='.$id);
    $valorHgens_tot = 0;
    foreach($hgens as $hgem) {
        $valorHgens_tot += $hgem->valor_dia;
    }

    $obHospedagem->getHospedagem($id);
    $qtd_hospede = $obHospedagem->getHospedagem($id)->qtd_hospede;
    $total_dias = $obHospedagem->diasTotais($obHospedagem->getHospedagem($id)->check_in, $obHospedagem->getHospedagem($id)->check_out, $id);

    $obHQS = new HgemQuarServ;
    $obHQS->getHgemQuarServ($id);
    if(isset($obHQS->getHgemQuarServ($id)->valor_tot)) {
        $valorServ_tot = $obHQS->getHgemQuarServ($id)->valor_tot;
    }
    else {
        $valorServ_tot = 0;
    }

    $this->valor_tot = $valorHgens_tot * $qtd_hospede * $total_dias + $valorServ_tot;

    $updateVT = new Database('hospedagem');
    $updateVT->updateVTHgem($this->valor_tot, $id);
    $var = $this->getHospedagens('hospedagem.id = '.$id, null, null, null, null, null, 'hospedagem.valor_tot');

    $this->valor_tot = $var[0]->valor_tot;
    
    return $this->valor_tot;
}

function getSumTaxa() {
    return (new Database('hospedagem'))->selectSumTaxa()
                                       ->fetchAll(PDO::FETCH_OBJ);
}

public function getUltimaHospedagem() {
    return (new Database('hospedagem'))->selectUltimaHospedagem()
                                       ->fetchAll(PDO::FETCH_OBJ);
}

}