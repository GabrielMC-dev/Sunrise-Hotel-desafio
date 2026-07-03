<?php
use app\Entity\HgemQuarServ;
$HgemQuarServs = HgemQuarServ::getHgemQuarServs();
$obHQS = new HgemQuarServ;
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Hospedagem-Quarto-Serviço</span></li>
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
                                                    $resultados = '';
                                                    foreach($HgemQuarServs as $HgemQuarServ) {
                                                        $obHQS->qtd = $HgemQuarServ->qtd;
                                                        $obHQS->valor_uni = $HgemQuarServ->valor_uni;

                                                        $resultados .= '<tr>
                                                                            <td>'.$HgemQuarServ->id_hospedagem.'</td>
                                                                            <td>'.$HgemQuarServ->numero.'</td>
                                                                            <td>'.$HgemQuarServ->servico.'</td>
                                                                            <td>'.$HgemQuarServ->data_h.'</td>
                                                                            <td>'.$HgemQuarServ->qtd.'</td>
                                                                            <td>'.$HgemQuarServ->valor_uni.'</td>
                                                                            <td>'.$obHQS->valorTotal($HgemQuarServ->id).'</td>
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