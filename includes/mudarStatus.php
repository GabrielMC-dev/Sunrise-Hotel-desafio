<?php 

require_once __DIR__ . '/../app/Db/Database.php';
use app\Db\Database;

// if(isset($_GET['funcao'])){
//     var_dump('testando');
//     exit();
// }

if(isset($_GET['check_in'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Em andamento'", $_GET['id']);

    $updateStsQuar = new Database('quarto');
    $updateStsQuar->updateStsQuar("'Ocupado'" ,$_GET['idQuarto']);

    header('Location: ../gerHospedagens.php');
}

if(isset($_GET['check_out'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Concluída'", $_GET['id']);

    $updateStsQuar = new Database('quarto');
    $updateStsQuar->updateStsQuar("'Disponível'" ,$_GET['idQuarto']);

    header('Location: ../gerHospedagens.php');
}