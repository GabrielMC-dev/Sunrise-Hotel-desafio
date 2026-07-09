<?php
require_once 'app/Entity/Hospedagem.php';
use app\Entity\Hospedagem;
$obHospedagem = new Hospedagem;

if(isset($_POST['idResp'], $_POST['ePrevista'], $_POST['sPrevista'], $_POST['qtdHospede'], $_POST['qtdQuarto'])) {
      $obHospedagem->id_hospede = $_POST['idResp'];
      $obHospedagem->data = date('Y-m-d');
      $obHospedagem->entrada_prevista = $_POST['ePrevista'];
      $obHospedagem->saida_prevista = $_POST['sPrevista'];
      $obHospedagem->qtd_hospede = $_POST['qtdHospede'];
      $obHospedagem->qtd_quarto = $_POST['qtdQuarto'];
      $obHospedagem->status = 'Confirmada';
      $obHospedagem->realizar_hospm();
      $obHospedagem2 = new Hospedagem;
      $idHgem = $obHospedagem2->getUltimaHospedagem();
      $idHgem = $idHgem[0]->id;
      $qtdQuarto = $_POST['qtdQuarto'];
      $qtdHospede = $_POST['qtdHospede'];

      header('Location: cadastroHospedagem2.php?qtdQuarto='.$qtdQuarto.'&idHgem='.$idHgem.'&qtdHospede='.$qtdHospede); exit;
      }

   include __DIR__.'/includes/header.php';
   include __DIR__.'/includes/formCHospedagem.php';
   include __DIR__.'/includes/footer.php';