<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use app\Db\Database;

use \PDO;

class Usuario {
   public $id;
   public $nome;
   public $email;
   public $senha;
//--------------------------------------------------------------------------//
   public function cadastrarUsuario() {
   $obDatabase = new Database('usuario');
   $this->id = $obDatabase->insert([
                                    'nome'  => $this->nome,
                                    'email' => $this->email,
                                    'senha' => $this->senha
                                  ]);
   }

   public function getUsuario($where) {
      return (new Database('usuario'))->selectUser($where)
                                      ->fetchAll(PDO::FETCH_OBJ);
   }

}