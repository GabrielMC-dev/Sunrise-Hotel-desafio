<?php
require_once 'app/Entity/Hospedagem.php';
require_once 'app/Entity/HgemQuar.php';

use app\Entity\Hospedagem;
use app\Entity\HgemQuar;
$obHgemQuar = new HgemQuar;

$obHospedagem = new Hospedagem;
$hgemAtuais = $obHospedagem->getUltimaHospedagem();
foreach($hgemAtuais as $hgemAtual) {
      print_r($hgemAtual->id);
}
$idHgem = $hgemAtual->id;

if (isset($_POST['idHgem'], $_POST['idQuarto']) && is_array($_POST['idQuarto'])) {
      foreach($_POST['idQuarto'] as $quarto) {
          $obHgemQuar->id_hospedagem = $idHgem;  
          $obHgemQuar->id_quarto = $quarto;
          $obHgemQuar->cadastrarHgemQuar();
          header('Location: gerHospedagens.php'); exit;
      }
}
else {
      echo 'Falha no cadastro';
}

   include __DIR__.'/includes/header.php';
   include __DIR__.'/includes/formCHospedagem2.php';
   include __DIR__.'/includes/footer.php';