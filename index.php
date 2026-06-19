<?php

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

require_once 'app/Entity/CatQuarto.php';
use \app\Entity\CatQuarto;

// $obHospedagem = new Hospedagem;

// $obCatQuar = new CatQuarto;
// var_dump($obCatQuar); exit;

// echo '<pre>';
// var_dump($obCatQuar->getCategoria());
// echo '</pre>'; exit;

// $cadastro = new Hospede;
// $cadastro->nome = 'Samuel Providelli';
// $cadastro->cpf = '321.213.987-10';
// $cadastro->nascimento = '2007-09-11';
// $cadastro->endereco = 'dugwfgsgfjgwegf, Nºsitio';
// $cadastro->telefone = '(00)12345-1234';
// $cadastro->email = 'samuelprovidello1@gmail.com';
// $cadastro->senha = 'samuel123';
// $cadastro->CadastrarHospede();

// $hosp = new Hospedagem;
// $hosp->id_hospede = 5;
// $hosp->data = '2026-09-11';
// $hosp->entrada_prevista = '2027-01-11';
// $hosp->saida_prevista = '2027-01-20';
// $hosp->check_in = null;
// $hosp->check_out = null;
// $hosp->qtd_hospede = 7;
// $hosp->qtd_quarto = 2;
// $hosp->valor_tot = null;
// $hosp->status = 'Confirmada';
// $hosp->realizar_hospm();

// echo '<pre>';
// print_r($hosp);
// echo '</pre>'; exit;



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/ppadm.php';
include __DIR__.'/includes/footer.php';