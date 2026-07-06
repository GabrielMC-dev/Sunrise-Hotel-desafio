<?php


require_once __DIR__ . '/../app/Db/Database.php';
use app\Db\Database;

if(isset($_GET['concluirML'], $_GET['idML'])) {
   $update = new Database('manut_limp');
   $update->updateStatusML('Concluída', $_GET['idML']);
   header('Location: ../gerManut_limpQuar.php'); exit;
}

if(isset($_GET['cancelarML'], $_GET['idML'])) {
   $update = new Database('manut_limp');
   $update->updateStatusML('Cancelada', $_GET['idML']);
   header('Location: ../gerManut_limpQuar.php'); exit;
}