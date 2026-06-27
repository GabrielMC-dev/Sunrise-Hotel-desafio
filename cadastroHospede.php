<?php
    include_once 'app/Entity/Hospede.php';
    use app\Entity\Hospede;
    
    $obHospede = new Hospede;
    if(isset($_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['telefone'], $_POST['nascimento'], $_POST['endereco'], $_POST['senha'], $_POST['confsenha'])) {
        $obHospede->nome = $_POST['nome'];
        $obHospede->email = $_POST['email'];
        $obHospede->cpf = $_POST['cpf'];
        $obHospede->telefone = $_POST['telefone'];
        $obHospede->nascimento = $_POST['nascimento'];
        $obHospede->endereco = $_POST['endereco'];
        $obHospede->senha = $_POST['senha'];
        if($_POST['senha'] != $_POST['confsenha']) {
            die('Erro: as senhas não coincidem. Volte e tente novamente');
            }
            else {
                $obHospede->cadastrarHospede();
                }
                header('Location: gerHospedes.php'); exit;
    }
                
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formCHospede.php';
    include __DIR__.'/includes/footer.php';