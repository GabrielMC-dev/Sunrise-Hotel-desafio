<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use app\Db\Database;

use \PDO;

class HeHgem {
   public $id;
   public $id_hospede;
   public $id_hospedagem;
//--------------------------------------------------------------------------//
   public function cadastrarHeHgem() {
   $obDatabase = new Database('hospede_hospedagem');
   $this->id = $obDatabase->insert([
                                    'id_hospede'    => $this->id_hospede,
                                    'id_hospedagem' => $this->id_hospedagem
                                  ]);
   }

   public function getHeHgems($where) {
      return (new Database('hospede_hospedagem'))->selectHeHgem($where)
                                                 ->fetchAll(PDO::FETCH_OBJ);
   } 

}