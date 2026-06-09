<?php

namespace app\Entity;

class ListaHospedes {
    private $id;
    private$nome;
    private$cpf;
    private$nascimento;
    private$endereco;
    private$telefone;
    private$email;
//--------------------------------------------------------------------------//
public function getHospedes() {
    return (new Database('hospede'))->select($where, $order, $limit);
}

}