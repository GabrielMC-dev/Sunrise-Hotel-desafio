<?php
require_once 'app/Entity/HgemQuar.php';
use app\Entity\HgemQuar;
$quartos = new HgemQuar;
$quartosMRs = $quartos->getHgemQuarss();
?>
        <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Relatório / Quartos mais Reservados</span></li>
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
                        <a href="javascript:history.back()" class="btn btn-danger">Voltar</a>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Quartos mais Reservados</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Quarto</th>
                                                    <th scope="col">Quantidade de Reservas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $resultados = '';
                                                    foreach($quartosMRs as $quartoMR) {

                                                        $resultados .= '<tr>
                                                                            <td>'.$quartoMR->numero.'</td>
                                                                            <td>'.$quartoMR->{'count(*)'}.'</td>
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