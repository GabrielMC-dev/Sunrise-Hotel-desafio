<?php

use App\Db\Database;
use app\Entity\Manut_limpQuar;
$ManutLimps = Manut_limpQuar::Manut_limpQuar(null,null,null);
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Manutenção e Limpeza dos Quartos</span></li>
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
                                <h3 class="header-title">Manutenção e Limpeza (Quartos)</h3>
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
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $resultados = '';
                                                        $botao1='';
                                                        $botao2='';
                                                        foreach($ManutLimps as $ManutLimp) {
                                                            switch($ManutLimp->status) {
                                                                case 'Agendada': $botao1 = '<a href="includes/mudarML.php?iniciarML=1&idML='.$ManutLimp->id.'" class="btn btn-warning" name="iniciarML">Iniciar</a>'; break;
                                                                case 'Concluída': $botao1 = '<p style="color: green;">Concluída</p>'; break;
                                                                case 'Cancelada': $botao1 = '<p style="color: red;">Cancelada</p>'; break;
                                                                case 'Em andamento': $botao1 = '<a href="includes/mudarML.php?concluirML=1&idML='.$ManutLimp->id.'" class="btn btn-success" name="concluirML">Concluir</a>'; break;
                                                            }

                                                            switch($ManutLimp->status) {
                                                                case 'Agendada': $botao2 = '<a href="includes/mudarML.php?cancelarML=1&idML='.$ManutLimp->id.'" class="btn btn-danger" name="cancelarML">Cancelar</a>'; break;
                                                                case 'Concluída': $botao2 = '<small style="color: green;">Impossível cancelar</small>'; break;
                                                                case 'Cancelada': $botao2 = '<small style="color: red;">Impossível cancelar</small>'; break;
                                                                case 'Em andamento': $botao2 = '<a href="includes/mudarML.php?cancelarML=1&idML='.$ManutLimp->id.'" class="btn btn-danger" name="cancelarML">Cancelar</a>'; break;
                                                            }
                                                            $resultados .= '<tr>
                                                                                <td>'.$ManutLimp->id.'</td>
                                                                                <td>'.$ManutLimp->numero.'</td>
                                                                                <td>'.$ManutLimp->data.'</td>
                                                                                <td>'.$ManutLimp->tipo.'</td>
                                                                                <td>'.$ManutLimp->responsavel.'</td>
                                                                                <td>'.$ManutLimp->status.'</td>
                                                                                <td>'.$botao1.'</td>
                                                                                <td>'.$botao2.'</td>
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