<?php
require_once 'app/Entity/HgemQuarServ.php';
use app\Entity\HgemQuarServ;
$ServicosMConsumidos = HgemQuarServ::getServMC();
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Relatório / Serviços mais Consumidos</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
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
                                <h3 class="header-title">Serviços Serviços mais Consumidos</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID Serviço</th>
                                                    <th scope="col">Serviço</th>
                                                    <th scope="col">Consumo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $resultados = '';
                                                    foreach($ServicosMConsumidos as $ServicoMConsumido) {

                                                        $resultados .= '<tr>
                                                                            <td>'.$ServicoMConsumido->id.'</td>
                                                                            <td>'.$ServicoMConsumido->servico.'</td>
                                                                            <td>'.$ServicoMConsumido->{'SUM(quarto_servico.qtd)'}.'</td>
                                                                        </tr>';
                                                    }

                                                    echo $resultados;
                                                ?>
                                                </tr>
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