<!-- page title area start -->
            <!-- <div class="page-title-area">
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
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- page title area end -->

<!-- <div class="main-content-inner"> -->
                <!-- <div class="row"> -->
                    <!-- basic table start -->
                    <!-- <div class="col-lg-6 mt-5" style="max-width: 100%; flex: 0 0 100%">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Relatório</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Fatura Mensal</th>
                                                    <th scope="col">Quartos mais Reservados</th>
                                                    <th scope="col">Taxa de Ocupação</th>
                                                    <th scope="col">Hóspedes mais Frequentes</th>
                                                    <th scope="col">Serviços mais Consumidos</th>
                                                    <th scope="col">Histórico de Hospedagens</th>
                                                    <th scope="col">Quartos em Limpeza/Manutenção</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="gerFaturaMensal.php" class="btn btn-success">Acessar</a></td>
                                                    <td><a href="gerQuartosMReservados.php" class="btn btn-success">Acessar</a></td>
                                                    <?php 
                                                        //echo '<td>taxa(%)</td>';
                                                    ?>
                                                    <td><a href="gerHospedesMFrequentes.php" class="btn btn-success">Acessar</a></td>
                                                    <td><a href="gerServicosMConsumidos.php" class="btn btn-success">Acessar</a></td>
                                                    <td><a href="gerHistoricosHospedagens.php" class="btn btn-success">Acessar</a></td>
                                                    <td><a href="gerQuartosLimpManut.php" class="btn btn-success">Acessar</a></td>
                                                </tr>
                                            </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- basic table end -->
                <!-- </div>
            </div> -->
<?php 
    require_once 'app/Entity/Hospedagem.php';
    use app\Entity\Hospedagem;
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
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
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
                    <div class="col-lg-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media mb-1">
                                    <div class="media-body">
                                        <h4 class="mb-3">Fatura Mensal</h4>
                                        <div style="display: flex;">
                                            <h2 style="margin-right: 75%;">X</h2>
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
                                            <h2 style="margin-right: 75%;">X</h2>
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
                                            <h2 style="margin-right: 75%;">X</h2>
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
                                            <h2 style="margin-right: 75%;">X</h2>
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
                                            <h2 style="margin-right: 75%;">X</h2>
                                            <a href="gerHistoricosHospedagens.php" class="btn btn-success">Ver Mais</a>
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
                                        <h4 class="mb-3">Quantos em Manutenção/Indisponíveis</h4>
                                        <div style="display: flex;">
                                            <h2 style="margin-right: 75%;">X</h2>
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
                                        <h2><?php echo 'X%';  ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>