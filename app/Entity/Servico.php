<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use app\Db\Database;

use \PDO;

class Servico {
    public $id;
    public $servico;
    public $valor_uni;
//--------------------------------------------------------------------------//
public function getServico() {
    return (new Database('servico'))->select(null)
                                    ->fetchAll(PDO::FETCH_OBJ);
}

}