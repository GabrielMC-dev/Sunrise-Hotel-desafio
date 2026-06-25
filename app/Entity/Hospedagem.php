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

public function diasTotais($check_in, $check_out, $id) {
    $inicio = strtotime($check_in);
    $fim = strtotime($check_out);

    $diferenca = $fim - $inicio;
    $diasFracionados = $diferenca / 86400;

    $diasArredondados = ceil($diasFracionados); 

    $this->total_dias = $diasArredondados + 1;

    $update = new Database('hospedagem');
    $update->updateDiasTot($this->total_dias, $id);
    
    return $this->total_dias;
}

public function valorTotalHgem($idHgem) {
    $id = (int)$idHgem;

    $obCatQuars = new CatQuarto;
    $ress = $obCatQuars->getCategoria($id);

    $valor_dia = 1;
    
    $obHospedagem = new Hospedagem;
    $obHospedagem->getHospedagem($id);
    $qtd_hospede = $obHospedagem->getHospedagem($id)->qtd_hospede;
    $total_dias = $obHospedagem->diasTotais($obHospedagem->getHospedagem($id)->check_in, $obHospedagem->getHospedagem($id)->check_out, $id);
    
    $obHQS = new HgemQuarServ;
    $obHQS->getHgemQuarServ($id);
    $valorServ_tot = $obHQS->getHgemQuarServ($id)->valor_tot;
    
    $this->valor_tot = $valor_dia * $qtd_hospede * $total_dias * $valorServ_tot;
    $update = new Database('hospedagem');
    $update->updateVTHgem($this->valor_tot, $id);
    $var = $this->getHospedagens('hospedagem.id = '.$id, $order=null, $limit=1, $join1=null, $join2=null, $join3=null, $fields='hospedagem.valor_tot');
    $this->valor_tot = $var[0]->valor_tot;
    
    return $this->valor_tot;
}

}