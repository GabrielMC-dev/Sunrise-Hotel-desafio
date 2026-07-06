<?php

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

require_once 'app/Entity/CatQuarto.php';
use \app\Entity\CatQuarto;

require_once 'app/Entity/HgemQuar.php';
use app\Entity\HgemQuar;
use app\Entity\HospedagemQuarto;

require_once 'app/Entity/Servico.php';
use app\Entity\Servico;



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/ppadm.php';
include __DIR__.'/includes/footer.php';