<?php
    require_once 'app/Entity/Usuario.php';
    use app\Entity\Usuario;
    $obHospede = new Usuario;

    if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
        $obHospede->nome = $_POST['nome'];
        $obHospede->email = $_POST['email'];
        $obHospede->senha = $_POST['senha'];

        $obHospede->cadastrarUsuario();
        header('Location: index.php'); exit;
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<style>
    input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
    -webkit-appearance: none;
}

</style>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="login-form-head">
                        <h4>Cadastro</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Nome</label>
                            <input type="text" name="nome" id="exampleInputName1" required>
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" id="exampleInputEmail1" required>
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" name="senha" id="exampleInputPassword1" minlength="8" required>
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Enviar <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Cadastrar com <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Cadastrar com <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Já tem uma conta? <a href="login.php">Faça o login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>