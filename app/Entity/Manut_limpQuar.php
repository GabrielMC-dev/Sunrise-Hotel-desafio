<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \app\Db\Database;

use \PDO;


class Manut_limpQuar {
    private$id;
    private$numero;
    private$data;
    private$tipo;
    private$responsavel;
    private$status;
//--------------------------------------------------------------------------//
public static function Manut_limpQuar($where=null, $order=null, $limit=null, $join=null, $fields=null) {
    return (new Database('manut_limp'))->selectJoinManut_limpQuar($where,$order,$limit,$join,$fields)
                                       ->fetchAll(PDO::FETCH_OBJ);
}

}