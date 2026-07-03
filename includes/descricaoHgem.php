<?php

use app\Entity\Hospedagem;

require_once 'descricaoHospedagens.php';

?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Hospedagens / Detalhes</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <a class="dropdown-item" href="#">Log Out</a>
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
                                <h3 class="header-title">Detalhes</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Check-in</th>
                                                    <th scope="col">Check-out</th>
                                                    <th scope="col">Qtd Hóspedes</th>
                                                    <th scope="col">Qtd Quartos</th>
                                                    <th scope="col">Total Dias</th>
                                                    <th scope="col">Valor Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $resultados = '';

                                                    $detHospedagem = new Hospedagem;
                                                    $hgem = $detHospedagem->getHospedagem($_GET['id']);
                                                    $valorTotal = $hgem->valorTotalHgem($id_hospedagem);
                                                    $diasTotais = $hgem->diasTotais($hgem->check_in, $hgem->check_out, $_GET['id']);

                                                    if($hgem->check_in==0 || $hgem->check_out==0) {
                                                        $valorTotal = '?';
                                                        $diasTotais = '?';
                                                    }

                                                    if($hgem->check_in==0) {$hgem->check_in = '?';}
                                                    
                                                    if($hgem->check_out==0) {$hgem->check_out = '?';}

                                                    $hgem->entrada_prevista = $obHospedagem->entrada_prevista;
                                                    $hgem->saida_prevista = $obHospedagem->saida_prevista;

                                                    $resultados .= '<tr>
                                                                        <td>'.$hgem->check_in.'</td>
                                                                        <td>'.$hgem->check_out.'</td>
                                                                        <td>'.$hgem->qtd_hospede.'</td>
                                                                        <td>'.$hgem->qtd_quarto.'</td>
                                                                        <td>'.$diasTotais.'</td>
                                                                        <td>'.$valorTotal.'</td>
                                                                    </tr>';

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