<?php

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

$id_hospedagem = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$hospedagens = Hospedagem::getHospedagem($_GET['id']);
$obHospedagem = new Hospedagem;


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/descricaoHgem.php';
include __DIR__.'/includes/footer.php';