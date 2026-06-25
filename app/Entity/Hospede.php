<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use \App\Db\Database;
use \PDO;

class Hospede {
    public $id;
    public $nome;
    public $cpf;
    public $nascimento;
    public $endereco;
    public $telefone;
    public $email;
    public $senha;
//--------------------------------------------------------------------------//
function cadastrarHospede() {
    $obDatabase = new Database('hospede');
    $this->id = $obDatabase->insert([
                                     'nome'       => $this->nome,
                                     'cpf'        => $this->cpf,
                                     'nascimento' => $this->nascimento,
                                     'endereco'   => $this->endereco,
                                     'telefone'   => $this->telefone,
                                     'email'      => $this->email,
                                     'senha'      => $this->senha,
                                    ]);
    return true;
}

public static function getHospedes($where=null,$order=null,$limit=null) {
    return (new Database('hospede'))->select($where,$order,$limit)
                                    ->fetchAll(PDO::FETCH_OBJ);
}

/*
public function getHospedes() {
    return (new Database('hospede'))->select($where, $order, $limit);
}
*/
}
