<?php
require_once 'app/Entity/Hospedagem.php';
require_once 'app/Entity/HgemQuar.php';
require_once 'app/Entity/HeHgem.php';

use app\Entity\Hospedagem;
use app\Entity\HgemQuar;
use app\Entity\HeHgem;

$obHgemQuar = new HgemQuar;
$obHeHgem = new HeHgem;

$obHospedagem = new Hospedagem;
$hgemAtuais = $obHospedagem->getUltimaHospedagem();
foreach($hgemAtuais as $hgemAtual) {
      print_r($hgemAtual->id);
}
$idHgem = $hgemAtual->id;

if (isset($_POST['idHgem'], $_POST['idQuarto'], $_POST['idHospede']) && is_array($_POST['idQuarto']) &&  is_array($_POST['idHospede'])) {
      foreach($_POST['idQuarto'] as $quarto) {
          $obHgemQuar->id_hospedagem = $idHgem;  
          $obHgemQuar->id_quarto = $quarto;
          $obHgemQuar->cadastrarHgemQuar();
      }
      foreach($_POST['idHospede'] as $hhm) {
      $obHeHgem->id_hospede = $hhm;
      $obHeHgem->id_hospedagem = $idHgem;
      $obHeHgem->cadastrarHeHgem();
      }
      
      header('Location: gerHospedagens.php'); exit;
}

   include __DIR__.'/includes/header.php';
   include __DIR__.'/includes/formCHospedagem2.php';
   include __DIR__.'/includes/footer.php';