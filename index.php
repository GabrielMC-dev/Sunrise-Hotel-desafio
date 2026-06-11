<?php

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

$hospedes = Hospede::getHospede();

//$hospedagens = Hospedagem::getHospedagem();
//echo '<pre>'; print_r($hospedagens); echo '</pre>'; exit;

// $cadastro = new Hospede;
// $cadastro->nome = 'Samuel Providelli';
// $cadastro->cpf = '321.213.987-10';
// $cadastro->nascimento = '2007-09-11';
// $cadastro->endereco = 'dugwfgsgfjgwegf, Nºsitio';
// $cadastro->telefone = '(00)12345-1234';
// $cadastro->email = 'samuelprovidello1@gmail.com';
// $cadastro->senha = 'samuel123';
// $cadastro->CadastrarHospede();


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/ppadm.php';
include __DIR__.'/includes/footer.php';