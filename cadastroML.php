<?php
   
   require_once 'app/Entity/Manut_limpQuar.php';
   use app\Entity\Manut_limpQuar;
   

   $obML = new Manut_limpQuar;
   if(isset($_POST['tipoML'], $_POST['dataHora'], $_POST['responsavel'])) {
   $obML->id_quarto = $idQuarto;
   $obML->tipo = $_POST['tipoML'];
   $obML->data_h = $_POST['dataHora'];
   $obML->responsavel = $_POST['responsavel'];
   $obML->status = 'Agendada';
   $obML->cadastrarML();

   header('Location: gerQuartos.php'); exit;
   }

                
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formCML.php';
    include __DIR__.'/includes/footer.php';