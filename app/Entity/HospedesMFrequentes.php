<?php

namespace app\Entity;

require_once 'app/Entity/Hospedagem.php';
use app\Entity\Hospedagem;

class HospedesMFrequentes {
   private $id;
   private $hospede;
   private $reservas;
//--------------------------------------------------------------------------//
public static function getHospedesMFrequentes() {
   //fazer o count() em hospedagem_hospede para saber quantas vezes cada hóspede esteve em uma hospedagem concluída
}

}