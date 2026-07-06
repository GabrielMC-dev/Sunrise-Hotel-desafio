<?php 
use \app\Entity\Quarto;
$quartos = Quarto::getQuarto(null);
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Quartos</span></li>
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
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Quartos</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Número Quarto</th>
                                                    <th scope="col">Andar</th>
                                                    <th scope="col">Categoria</th>
                                                    <th scope="col">Valor Diária</th>
                                                    <th scope="col">Capacidade Máxima</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $resultados = '';
                                                    foreach($quartos as $quarto) {
                                                        $resultados .= '<tr>
                                                                            <td>'.$quarto->id.'</td>
                                                                            <td>'.$quarto->numero.'</td>
                                                                            <td>'.$quarto->andar.'</td>
                                                                            <td>'.$quarto->categoria.'</td>
                                                                            <td>'.$quarto->valor_dia.'</td>
                                                                            <td>'.$quarto->capac_max.'</td>
                                                                            <td>'.$quarto->status.'</td>
                                                                            <td><a href="cadastroML.php?idQuarto='.$quarto->id.'" class="btn btn-primary">Nova Manutenção/Limpeza</a></td>
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