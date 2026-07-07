<?php 
    require_once 'app/Entity/Hospedagem.php';

use app\Db\Database;
use app\Entity\Hospedagem;

//taxa de ocupação
    $taxaCalculo = new Hospedagem('hospedagem');
    $totalHes = $taxaCalculo->getSumTaxa();
    foreach($totalHes as $totalHe) {
        $totalHe->{'SUM(qtd_hospede)'};
    }
    $intTotalHe = (int) $totalHe->{'SUM(qtd_hospede)'};
    $taxa = ($intTotalHe/265)*100;
    $taxaArredondada = round($taxa);
        ?>

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Relatório</span></li>
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
                <a href="javascript:history.back()" class="btn btn-danger" style="margin-top: 30px;">Voltar</a>
                <div class="row">
                    <div class="col-lg-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Fatura Mensal</h4>
                                        <div style="display: flex;">
                                            <a href="gerFaturaMensal.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Quartos mais Reservados</h4>
                                        <div style="display: flex;">
                                            <a href="gerQuartosMReservados.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Hóspedes mais Frequentes</h4>
                                        <div style="display: flex;">
                                            <a href="gerHospedesMFrequentes.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Serviços mais Consumidos</h4>
                                        <div style="display: flex;">
                                            <a href="gerServicosMConsumidos.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Histórico de Hospedagens por Hóspede</h4>
                                        <div style="display: flex;">
                                            <a href="gerHistoricoHospedes.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Quartos em Manutenção/Indisponíveis</h4>
                                        <div style="display: flex;">
                                            <a href="gerQuartosManutInd.php" class="btn btn-success">Ver Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Taxa de Ocupação do Sunrise Hotel</h4>
                                        <h2><?php echo $taxaArredondada.'%';  ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>