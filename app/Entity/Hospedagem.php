<?php


use \App\Db\Database;

class Hospedagem {
    private $id;
    private $nome_hosp;
    private $data;
    private $qtd_hospedes;
    private $tipo_quarto;
    private $entrada_prev;
    private $saida_prev;
    private $valor_tot;
    private $status;
//--------------------------------------------------------------------------//
public function realizar_hospm() {
    //data da hospedagem
    $this->data = date('Y-m-d');
    //inserir hospedagem no banco
    $obDatabase = new Database('hospedagem');
    echo "<pre>"; print_r($obDatabase); echo '</pre>';
}

}

$this->realizar_hospm();