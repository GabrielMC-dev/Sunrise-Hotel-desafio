<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

use \PDO;

class HgemQuarServ {
    public $id;
    public $numero;
    public $servico;
    public $data_h;
    public $qtd;
    public $valor_uni;
    public $valor_tot;
//--------------------------------------------------------------------------//
public static function getHgemQuarServs($where=null, $order=null, $limit=null, $join1=null, $join2=null, $join3=null, $fields=null) {
    return (new Database('quarto_servico'))->selectJoinHgem_Quar_Serv($where,$order,$limit,$join1,$join2,$join3,$fields)
                                           ->fetchAll(PDO::FETCH_OBJ);
}

public function valorTotal($id) {
    $this->valor_tot = $this->valor_uni * $this->qtd;
    $insert = new Database('quarto_servico');
    $insert->updateVT($this->valor_tot, $id);
    return $this->valor_tot;
}

}