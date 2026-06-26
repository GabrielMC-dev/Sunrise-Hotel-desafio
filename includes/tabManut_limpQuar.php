<?php

use App\Db\Database;
use app\Entity\Manut_limpQuar;
$HgemQuarServs = Manut_limpQuar::Manut_limpQuar();
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Manutenção e Limpesa dos Quartos</span></li>
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
                    <!-- basic table start -->
                    <div class="col-lg-6 mt-5" style="max-width: 100%; flex: 0 0 100%">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Manutenção e Limpesa (Quartos)</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">    
                                            <table class="table text-center">
                                                <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Número Quarto</th>
                                                        <th scope="col">Data</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Responsável</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $resultados = '';
                                                        foreach($HgemQuarServs as $HgemQuarServ) {
                                                            $resultados .= '<tr>
                                                                                <td>'.$HgemQuarServ->id.'</td>
                                                                                <td>'.$HgemQuarServ->numero.'</td>
                                                                                <td>'.$HgemQuarServ->data.'</td>
                                                                                <td>'.$HgemQuarServ->tipo.'</td>
                                                                                <td>'.$HgemQuarServ->responsavel.'</td>
                                                                                <td>'.$HgemQuarServ->status.'</td>
                                                                                <td><buttom class="btn btn-success" name="concluirLM" type="submit">Concluir</td>
                                                                            </tr>';
                                                        }
                                                        echo $resultados;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- basic table end -->
                </div>
            </div>