<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

use \PDO;

class HgemQuarServ {
    public $id;
    public $id_hospedagem;
    public $numero;
    public $servico;
    public $data_h;
    public $qtd;
    public $valor_uni;
    public $valor_tot;
//--------------------------------------------------------------------------//
public function cadastrarHgemQuarServ() {
    $obDatabase = new Database('quarto_servico');
    $this->id = $obDatabase->insert([
                         'id_hospedagem' => $this->id,
                         'id_quarto'     => $this->numero,
                         'id_servico'    => $this->servico,
                         'data_h'        => $this->data_h,
                         'qtd'           => $this->qtd
                     ]);
}

public static function getHgemQuarServs($where=null, $order=null, $limit=null, $join1=null, $join2=null, $join3=null, $fields=null) {
    return (new Database('quarto_servico'))->selectJoinHgem_Quar_Serv($where,$order,$limit,$join1,$join2,$join3,$fields)
                                           ->fetchAll(PDO::FETCH_OBJ);
}

public static function getServMC() {
    return (new Database('quarto_servico'))->selectServMC()
                                           ->fetchAll(PDO::FETCH_OBJ);
}

public function valorTotal($id) {
    $this->valor_tot = $this->valor_uni * $this->qtd;
    $update = new Database('quarto_servico');
    $update->updateVTServ($this->valor_tot, $id);
    // echo '<pre>';
    // var_dump($update->updateVTServ($this->valor_tot, $id));
    // echo '</pre>'; exit;
    $var = $this->getHgemQuarServs('quarto_servico.id = '.$id, $order=null, $limit=1, $join1=null, $join2=null, $join3=null, $fields='quarto_servico.valor_tot');
    $this->valor_tot = $var[0]->valor_tot;
    return $this->valor_tot;
}

public static function getHgemQuarServ($id) {
    $id = (int)$id;
    return (new Database('quarto_servico'))->select('quarto_servico.id='. $id)
                                           ->fetchObject(self::class);
}

}