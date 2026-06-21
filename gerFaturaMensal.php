<?php

require_once 'app/Entity/FaturaMensal.php';
use \app\Entity\FaturaMensal;
$obFatura = new FaturaMensal;




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/tabFaturaMensal.php';
include __DIR__.'/includes/footer.php';