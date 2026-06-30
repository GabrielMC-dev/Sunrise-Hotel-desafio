<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;
require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

use \PDO;

class Quarto {
    private $id;
    private $numero;
    private $andar;
    private $id_categoria;
    private $status;
//--------------------------------------------------------------------------//
public static function getQuarto($where,$order=null,$limit=null,$join=null, $on=null, $fields=null) {
    return (new Database('quarto'))->selectJoinQuarCatquar($where,$order,$limit,$join,$on,$fields)
                                   ->fetchAll(PDO::FETCH_OBJ);
}

}