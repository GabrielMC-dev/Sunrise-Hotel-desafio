<?php

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

$obHospedagem = new Hospedagem;
$obHospedagem->setId(1);
$obHospedagem->setData(date('Y-m-d'));
$obHospedagem->setEntradaPrev('2026-12-05');
$obHospedagem->setSaidaPrev('2026-12-11');
$obHospedagem->setQtd_hospedes(10);
$obHospedagem->setQtdQuartos(3);
$obHospedagem->setValorTot(5000);
$obHospedagem->setStatus('Confirmado');
echo '<pre>'; $obHospedagem->realizar_hospm(); echo '</pre>'; exit;


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/pp.php';
include __DIR__.'/includes/footer.php';