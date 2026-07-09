<?php
require_once 'app/Entity/Servico.php';

require_once 'app/Entity/HgemQuarServ.php';
use app\Entity\HgemQuarServ;

   $obHQS = new HgemQuarServ;
   if(isset($_POST['idHospedagem'], $_POST['idQuarto'], $_POST['idQuarto'], $_POST['idServico'], $_POST['dataHora'], $_POST['qtd'])) {
   $obHQS->id = $_POST['idHospedagem'];
   $obHQS->numero = $_POST['idQuarto'];
   $obHQS->servico = $_POST['idServico'];
   $obHQS->data_h = $_POST['dataHora'];
   $obHQS->qtd = $_POST['qtd'];
   $obHQS->cadastrarHgemQuarServ();

   header('Location: gerHospedagens.php'); exit;
   }

                
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formCServico.php';
    include __DIR__.'/includes/footer.php';