<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

use \PDO;

class HgemQuarServ {
    private $id;
    private $numero;
    private $servico;
    private $data_h;
    private $qtd;
    private $valor_tot;
//--------------------------------------------------------------------------//
public static function getHgemQuarServ($where=null, $order=null, $limit=null, $join1=null, $join2=null, $join3=null, $fields=null) {
    return (new Database('quarto_servico'))->selectJoinHgem_Quar_Serv($where,$order,$limit,$join1,$join2,$join3,$fields)
                                           ->fetchAll(PDO::FETCH_OBJ);
}

}