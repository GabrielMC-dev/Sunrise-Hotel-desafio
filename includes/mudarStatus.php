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

date_default_timezone_set('America/Sao_Paulo');
$dataHora = new DateTime();
$dh = $dataHora->format('Y-m-d H:i:s');


if(isset($_GET['checkIn'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Em andamento'", $_GET['id']);
    
    $HgemQuars = new HgemQuar;
    $hqs = $HgemQuars->getHgemQuars($_GET['id']);
    $updateStsQuar = new Database('quarto');
    foreach($hqs as $hq) {
        $updateStsQuar->updateStsQuar("'Ocupado'", $hq->id_quarto);
    }

    $updateCheck_in = new Database('hospedagem');
    $updateCheck_in->updateCheck_io('check_in', $dh, $_GET['id']);

    header('Location: ../gerHospedagens.php');
}

if(isset($_GET['checkOut'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Concluída'", $_GET['id']);

    $HgemQuars = new HgemQuar;
    $hqs = $HgemQuars->getHgemQuars($_GET['id']);
    $updateStsQuar = new Database('quarto');
    foreach($hqs as $hq) {
        $updateStsQuar->updateStsQuar("'Disponível'", $hq->id_quarto);
    }

    $updateCheck_out = new Database('hospedagem');
    $updateCheck_out->updateCheck_io('check_out', $dh, $_GET['id']);

    header('Location: ../gerHospedagens.php');
}