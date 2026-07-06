<?php 
use \app\Entity\Hospede;
$hospedes = Hospede::getHospedes();
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Hóspedes</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <a class="dropdown-item" href="login.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->

<div class="main-content-inner">
                <div class="row">
                    <!-- basic table start -->
                    <div class="col-lg-6 mt-5" style="max-width: 100%; flex: 0 0 100%">
                        <a href="cadastroHospede.php" class="btn btn-primary" style="margin-bottom: 30px;">Cadastrar novo hóspede</a>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Hóspedes</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">CFP</th>
                                                    <th scope="col">Data Nascimento</th>
                                                    <th scope="col">Endereço</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Senha</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $resultados = '';
                                                    foreach($hospedes as $hospede) {
                                                        $resultados .= '<tr>
                                                                            <td>'.$hospede->id.'</td>
                                                                            <td>'.$hospede->nome.'</td>
                                                                            <td>'.$hospede->cpf.'</td>
                                                                            <td>'.$hospede->nascimento.'</td>
                                                                            <td>'.$hospede->endereco.'</td>
                                                                            <td>'.$hospede->telefone.'</td>
                                                                            <td>'.$hospede->email.'</td>
                                                                            <td>'.$hospede->senha.'</td>
                                                                        </tr>';
                                                    }

                                                    echo $resultados;
                                                ?>
                                            </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- basic table end -->
                </div>
            </div>