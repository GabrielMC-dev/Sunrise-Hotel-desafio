<?php


namespace app\Entity;


require_once __DIR__. '/../Db/Database.php';
use \app\Db\Database;

use \PDO;

class HgemQuar {
    public $id;
    public $id_hospedagem;
    public $id_quarto;
//--------------------------------------------------------------------------//
public function cadastrarHgemQuar() {
    $obDatabase = new Database('hospedagem_quarto');
    $this->id = $obDatabase->insert([
                         'id_hospedagem' => $this->id_hospedagem,
                         'id_quarto'     => $this->id_quarto
                     ]);
}

public function getHgemQuars($id) {
    $id = (int)$id;
    return (new Database('hospedagem_quarto'))->select('hospedagem_quarto.id_hospedagem='. $id)
                                              ->fetchAll(PDO::FETCH_OBJ);
}

}