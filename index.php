<?php

require_once 'app/Db/Database.php';
use \app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use \app\Entity\Hospedagem;

require_once 'app/Entity/Hospede.php';
use \app\Entity\Hospede;

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
// $hosp->id_hospede = 6;
// $hosp->data = '2025-09-11';
// $hosp->entrada_prevista = '2025-12-11';
// $hosp->saida_prevista = '2025-12-16';
// $hosp->check_in = '2025-12-11 16:11:22';
// $hosp->check_out = '2025-12-16 16:11:22';
// $hosp->qtd_hospede = 3;
// $hosp->qtd_quarto = 1;
// $hosp->valor_tot = 3780.30;
// $hosp->status = 'Confirmada';
// $hosp->realizar_hospm();

// echo '<pre>';
// print_r($hosp);
// echo '</pre>'; exit;



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/ppadm.php';
include __DIR__.'/includes/footer.php';