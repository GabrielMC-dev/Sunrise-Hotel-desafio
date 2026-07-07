<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

use \PDO;


class Manut_limpQuar {
    public $id;
    public $id_quarto;
    public $data_h;
    public $tipo;
    public $responsavel;
    public $status;
//--------------------------------------------------------------------------//
public static function Manut_limpQuar($where, $fields, $on, $order=null, $limit=null, $join=null) {
    return (new Database('manut_limp'))->selectJoinManut_limpQuar($where,$fields,$on,$order,$limit,$join)
                                       ->fetchAll(PDO::FETCH_OBJ);
}

public function cadastrarML() {
    $obDatabase = new Database('manut_limp');
    $this->id = $obDatabase->insert([
                                     'id_quarto'   => $this->id_quarto,
                                     'data'        => $this->data_h,
                                     'tipo'        => $this->tipo,
                                     'responsavel' => $this->responsavel,
                                     'status'      => $this->status
                                    ]);
    return true;
}

}