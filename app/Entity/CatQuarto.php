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
public static function getCategorias($where=null, $order=null, $limit=null, $fields='*') {
    return (new Database('categoria_quarto'))->select($where,$order,$limit,$fields)
                                             ->fetchAll(PDO::FETCH_OBJ);
}

public static function getCategoria($id) {
    return (new Database('categoria_quarto'))->select('categoria_quarto.id ='. $id)
                                             ->fetchObject();
}

// para hoje(MySQL):
// select hq.id_hospedagem, hq.id_quarto, cq.categoria, cq.valor_dia from hospedagem_quarto hq
// join hospedagem h on hq.id_hospedagem = h.id
// join quarto q on hq.id_quarto = q.id
// join categoria_quarto cq on q.id_categoria = cq.id
// order by h.id;

}