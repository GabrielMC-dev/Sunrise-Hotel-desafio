<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

require_once 'app/Entity/Quarto.php';
use \app\Entity\Quarto;

require_once 'app/Entity/CatQuarto.php';
use \app\Entity\CatQuarto;
use Exception;
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
    return (new Database('hospedagem'))->selectJoinHgemHe($where,$order,$limit,$join,$fields)
                                       ->fetchAll(PDO::FETCH_OBJ);

}

public static function getHospedagem($id) {
    $id = (int)$id;
    return (new Database('hospedagem'))->select('hospedagem.id='. $id)
                                       ->fetchObject(self::class);
}

public function diasTotais() {
    $inicio = strtotime($this->check_in);
    $fim = strtotime($this->check_out);

    $diferenca = $fim - $inicio;
    $diasFracionados = $diferenca / 86400;

    $diasArredondados = ceil($diasFracionados); 

    $this->total_dias = $diasArredondados + 1;

    return $this->total_dias;
}

public function valorTotal($idHgem) {
    $id = (int)$idHgem;

        try{
            $Hospedagem = (new Database('hospedagem_quarto'))->selectVT('hgem.id='. $id)->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
            exit;
        }

        foreach($Hospedagem as $hospedagem){

        }
        
    $this->valor_tot = $hospedagem->valor_dia * $hospedagem->qtd_hospede * $hospedagem->total_dias * $hospedagem->valor_tot;

    return $this->valor_tot;
}

}