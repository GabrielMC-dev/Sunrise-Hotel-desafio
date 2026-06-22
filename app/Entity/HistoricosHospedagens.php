<?php

namespace app\Entity;

require_once 'app/Entity/HgemQuarServ.php';
use app\Entity\HgemQuarServ;

class HistoricosHospedagens {
    public $id;
    public $numero;
    public $servico;
    public $data_h;
    public $qtd;
    public $valor_uni;
    public $valor_tot;
//--------------------------------------------------------------------------//
    public static function getHistoricoHgens() {
        
    }
    
}