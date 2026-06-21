<?php

namespace app\Entity;

require_once "app/Entity/Hospedagem.php";
use app\Entity\Hospedagem;

class FaturaMensal {
   private $id;
   private $mes;
   private $fatura;
//--------------------------------------------------------------------------//
public static function getFatura() {
   //é preciso somar (em while) a partir das datas de check out para saber a fatura mensal do hotel, passando por cada hospedagem que tenha o check out no dia 01/nn até o último dia desse mês nn
}

}