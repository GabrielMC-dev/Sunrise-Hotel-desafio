<?php 

require_once 'app/Entity/Hospedagem.php';
use app\Db\Database;

// if(isset($_GET['funcao'])){
//     var_dump('testando');
//     exit();
// }

if(isset($_GET['check_in'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Em andamento'", $_GET['id']);
    var_dump($_GET['id'], $_GET['check_in']);
}