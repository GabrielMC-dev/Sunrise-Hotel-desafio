<?php
require_once 'app/Entity/Manut_limpQuar.php';
use app\Entity\Manut_limpQuar;
$ManutLimps = Manut_limpQuar::Manut_limpQuar("manut_limp.status = 'Em andamento'", "quarto.numero,manut_limp.tipo, manut_limp.status", 'manut_limp.id_quarto = quarto.id');
?>

<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Quartos em Manutenção e Limpeza</span></li>
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
                                <h3 class="header-title">Quartos em Manutenção e Limpeza</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">    
                                            <table class="table text-center">
                                                <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">Número Quarto</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $resultados = '';
                                                        foreach($ManutLimps as $ManutLimp) {
                                                            
                                                            $resultados .= '<tr>
                                                                                <td>'.$ManutLimp->numero.'</td>
                                                                                <td>'.$ManutLimp->tipo.'</td>
                                                                                <td>'.$ManutLimp->status.'</td>
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