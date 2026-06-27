<?php
require_once 'app/Entity/Hospedagem.php';
use app\Entity\Hospedagem;
$obHospedagem = new Hospedagem;

if(isset($_POST['idResp'], $_POST['email'], $_POST['cpf'], $_POST['telefone'], $_POST['endereco'], $_POST['senha'], $_POST['confsenha'])) {
      $obHospedagem->id_hospede = $_POST['idResp'];
      $obHospedagem->data = date('Y-m-d');
      $obHospedagem->entrada_prevista = $_POST['ePrevista'];
      $obHospedagem->entrada_prevista = $_POST['sPrevista'];
      $obHospedagem->qtd_hospede = $_POST['qtdHospede'];
      $obHospedagem->qtd_quarto = $_POST['qtdQarto'];
      $obHospedagem->status = "'Confirmada'";
        
      header('Location: gerHospedagens.php'); exit;
    }

   include __DIR__.'/includes/header.php';
   include __DIR__.'/includes/formCHospedagem.php';
   include __DIR__.'/includes/footer.php';