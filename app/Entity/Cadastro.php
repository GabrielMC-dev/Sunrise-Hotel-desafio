<?php

namespace app\Entity;

use \app\Db\Database;

class Cadastro {
    private $id;
    private $nome;
    private $cpf;
    private $nascimento;
    private $endereco;
    private $telefone;
    private $email;
//--------------------------------------------------------------------------//
function Cadastrar() {
    $obDatabase = new Database('hospede');
    $this->id = $obDatabase->insert([
                                     'nome' => $this->nome,
                                     'cpf' => $this->cpf,
                                     'nascimento' => $this->nascimento,
                                     'endereco' => $this->endereco,
                                     'telefone' => $this->telefone,
                                     'email' => $this->email,
                                    ]);
    return true;
}
//--------------------------------------------------------------------------//
/* Gets e Sets */

}