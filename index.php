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
/*
$cadastro = new Hospede;
$cadastro->nome = 'Roberto Carlos da Silva Azevedo';
$cadastro->cpf = '123.654.010-19';
$cadastro->nascimento = '1923-12-12';
$cadastro->endereco = 'aafegdgsddsfhkshfkjhef1, Nº4';
$cadastro->telefone = '(41)53241-4871';
$cadastro->email = 'robcarlossa@gmail.com';
$cadastro->CadastrarHospede();
print_r($cadastro); exit;
*/

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/ppadm.php';
include __DIR__.'/includes/footer.php';