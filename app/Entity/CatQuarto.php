<?php

namespace app\Entity;

use \PDO;

require_once 'app/Db/Database.php';
use \App\Db\Database;

class CatQuarto {
    public $id;
    public $categoria;
    public $valor_dia;
    public $capac_max;
//--------------------------------------------------------------------------//
function getCategoria($where=null, $order=null, $limit=null, $fields='*') {
    return (new Database('categoria_quarto'))->select($where,$order,$limit,$fields)
                                             ->fetchAll(PDO::FETCH_OBJ);
}

}