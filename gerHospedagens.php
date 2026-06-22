<?php

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

$confirmada = 'Confirmada';
$hospedagens = Hospedagem::getHospedagens('status = '.$confirmada);
$obHospedagem = new Hospedagem;




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/tabHospedagem.php';
include __DIR__.'/includes/footer.php';