<?php 

require_once __DIR__ . '/../app/Db/Database.php';
require_once __DIR__. '/../app/Entity/HgemQuar.php';
use app\Db\Database;
use app\Entity\Hospedagem;
use app\Entity\HgemQuar;

// if(isset($_GET['funcao'])){
//     var_dump('testando');
//     exit();
// }

if(isset($_GET['id'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Em andamento'", $_GET['id']);
    
    $HgemQuars = new HgemQuar;
    $hqs = $HgemQuars->getHgemQuars($_GET['id']);
    $updateStsQuar = new Database('quarto');
    foreach($hqs as $hq) {
        $updateStsQuar->updateStsQuar("'Ocupado'", $hq->id_quarto);
    }

    header('Location: ../gerHospedagens.php');
}

if(isset($_GET['id'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Concluída'", $_GET['id']);

    $HgemQuars = new HgemQuar;
    $hqs = $HgemQuars->getHgemQuars($_GET['id']);
    $updateStsQuar = new Database('quarto');
    foreach($hqs as $hq) {
        $updateStsQuar->updateStsQuar("'Disponível'", $hq->id_quarto);
    }

    header('Location: ../gerHospedagens.php');
}