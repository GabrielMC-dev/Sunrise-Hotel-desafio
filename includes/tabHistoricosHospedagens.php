<?php
require_once 'app/Entity/HistoricosHospedagens.php';
use app\Entity\HistoricosHospedagens;
$HistoricosHospedagens = HistoricosHospedagens::getHistoricoHgens();
$obHH = new HistoricosHospedagens;
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Relatório / Hospedagem-Quarto-Serviço</span></li>
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
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Serviços e Quartos por Hospedagem</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID Hospedagem</th>
                                                    <th scope="col">Número Quarto</th>
                                                    <th scope="col">Servico</th>
                                                    <th scope="col">Data e Hora</th>
                                                    <th scope="col">Quantidade</th>
                                                    <th scope="col">Valor Unitário</th>
                                                    <th scope="col">Valor Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    // $resultados = '';
                                                    // foreach($HistoricosHospedagens as $HistoricoHospedagem) {
                                                    //     $obHQS->qtd = $HistoricoHospedagem->qtd;
                                                    //     $obHQS->valor_uni = $HistoricoHospedagem->valor_uni;

                                                    //     $resultados .= '<tr>
                                                    //                         <td>'.$HistoricoHospedagem->id.'</td>
                                                    //                         <td>'.$HistoricoHospedagem->numero.'</td>
                                                    //                         <td>'.$HistoricoHospedagem->servico.'</td>
                                                    //                         <td>'.$HistoricoHospedagem->data_h.'</td>
                                                    //                         <td>'.$HistoricoHospedagem->qtd.'</td>
                                                    //                         <td>'.$HistoricoHospedagem->valor_uni.'</td>
                                                    //                         <td>'.$obHQS->valorTotal($HistoricoHospedagem->id).'</td>
                                                    //                     </tr>';
                                                    // }

                                                    // echo $resultados;
                                                ?>
                                                        <td><a href="javascript:history.back()" class="btn btn-danger">Voltar</a></td>
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