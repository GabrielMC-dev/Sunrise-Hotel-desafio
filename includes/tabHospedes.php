<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Hóspedes</span></li>
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
                                <h3 class="header-title">Hóspedes</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">CFP</th>
                                                    <th scope="col">Data Nascimento</th>
                                                    <th scope="col">Endereço</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Email</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                require_once 'index.php';
                                            
                                                $resultados = '';
                                                foreach($hospedes as $hospede) {
                                                    $resultados .= '<tr>
                                                                        <td>'.$hospede->id.'</td>
                                                                        <td>'.$hospede->nome.'</td>
                                                                        <td>'.$hospede->id.'</td>
                                                                        <td>'.$hospede->id.'</td>
                                                                        <td>'.$hospede->id.'</td>
                                                                        <td>'.$hospede->id.'</td>';
                                                }

                                            ?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- basic table end -->
                </div>
            </div>