<?php

class Login {
    private $nome;
    private $email;
    private $senha;
//--------------------------------------------------------------------------//

public function loginAdm() {
    if(isset($_POST['email'], $_POST['senha'])) {
        header("Location: index.php");
    }
}

public function loginHospede() {
    if(isset($_POST['email'], $_POST['senha'])) {
        header("Location: pp.php");
    }
}

}