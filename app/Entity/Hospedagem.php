<?php

namespace app\Entity;

use \app\Db\Database;

class Hospedagem {
    private $id;
    private $id_hospedes;
    private $data;
    private $entrada_prev;
    private $saida_prev;
    private $qtd_hospedes;
    private $qtd_quartos;
    private $valor_tot;
    private $status;
//--------------------------------------------------------------------------//
public function realizar_hospm() {
    //data da hospedagem
    $this->data = date('Y-m-d');
    //inserir hospedagem no banco
    $obDatabase = new Database('hospedagem');
    $this->id = $obDatabase->insert([
                         'nome_hosp'    => $this->id_hospedes,
                         'data'        => $this->data,
                         'entrada_prev' => $this->entrada_prev,
                         'saida_prev'   => $this->saida_prev,
                         'qtd_hospedes' => $this->qtd_hospedes,
                         'qtd_quartos' => $this->qtd_quartos,
                         'valor_tot'    => $this->valor_tot,
                         'status'      => $this->status
                     ]);

    return true;
}
//--------------------------------------------------------------------------//
/*public function setId($id) {
    $this->id = $id;
}
public function getId() {
    return $this->id;
}

public function setId_hospedes($id_hospedes) {
    $this->id_hospedes = $id_hospedes;
}
public function getId_hospedes() {
    return $this->id_hospedes;
}

public function setData($data) {
    $this->data = $data;
}
public function getData() {
    return $this->data;
}

public function setEntradaPrev($entrada_prev) {
    $this->entrada_prev = $entrada_prev;
}
public function getEntradaPrev() {
    return $this->entrada_prev;
}

public function setSaidaPrev($saida_prev) {
    $this->saida_prev = $saida_prev;
}
public function getSaidaPrev() {
    return $this->saida_prev;
}

public function setQtd_hospedes($qtd_hospedes) {
    $this->qtd_hospedes = $qtd_hospedes;
}
public function getQtdHospedes() {
    return $this->qtd_hospedes;
}

public function setQtdQuartos($qtd_quartos) {
    $this->qtd_quartos = $qtd_quartos;
}
public function getQtdQuartos() {
    return $this->qtd_quartos;
}

public function setValorTot($valor_tot) {
    $this->valor_tot = $valor_tot;
}
public function getValorTot() {
    return $this->valor_tot;
}

public function setStatus($status) {
    $this->status = $status;
}
public function getStatus() {
    return $this->status;
}
*/
}
