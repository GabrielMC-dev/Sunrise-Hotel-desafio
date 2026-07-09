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
                        <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="header-title">Serviços e Quartos por Hospedagem</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome Responsável</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Entrada Prevista</th>
                                                    <th scope="col">Saída Prevista</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    require_once 'app/Entity/HeHgem.php';
                                                    use app\Entity\HeHgem;
                                                    require_once 'app/Entity/Hospedagem.php';
                                                    use app\Entity\Hospedagem;

                                                    $id=0;
                                                    if(isset($_GET['id'])) {
                                                        $hehgens = new HeHgem;
                                                        $hoshgens = $hehgens->getHeHgems('id_hospede = '.$_GET['id']);
                                                        $resultados = '';
                                                        foreach($hoshgens as $hoshgem) {
                                                            $id = $hoshgem->id_hospedagem;

                                                            $hospedagens = Hospedagem::getHospedagens('hospedagem.id = '. $id);

                                                            foreach($hospedagens as $hospedagem) {
                                                                
                                                            $botao = '';
                                                            switch($hospedagem->status) {
                                                                case 'Confirmada': $botao = '<a href="includes/mudarStatus.php?id='.$hospedagem->id.'" class="btn btn-primary">Check in</a>'; break;
                                                                case 'Em andamento': $botao = '<a href="    includes/mudarStatus.php?id='.$hospedagem->id.'" class="btn btn-info">Check out</a>'; break;
                                                                case 'Cancelada': $botao = '<b style="color: red;">Cancelada</b>'; break;
                                                                case 'Concluída': $botao = '<b style="color: green;">Concluída</b>'; break;
                                                            }
                                                            
                                                                $resultados .= '<tr>
                                                                                    <td>'.$hospedagem->id.'</td>
                                                                                    <td>'.$hospedagem->nome.'</td>
                                                                                    <td>'.$hospedagem->data.'</td>
                                                                                    <td>'.$hospedagem->entrada_prevista.'</td>
                                                                                    <td>'.$hospedagem->saida_prevista.'</td>    
                                                                                    <td>'.$hospedagem->status.'</td>
                                                                                    <td><a href="descricaoHospedagens.php?id='.$hospedagem->id.'" class="btn btn-success">Detalhes</a></td>
                                                                                    <td>'.$botao.'</td>
                                                                                </tr>';
                                                            }
                                                        }
                                                    }

                                                    // require_once 'app/Entity/Hospedagem.php';
                                                    // use app\Entity\Hospedagem;

                                                    // $hospedagens = Hospedagem::getHospedagens('id = '. $id);

                                                    // $resultados = '';
                                                    // foreach($hospedagens as $hospedagem) {
                                                        
                                                    // $botao = '';
                                                    // switch($hospedagem->status) {
                                                    //     case 'Confirmada': $botao = '<a href="includes/mudarStatus.php?id='.$hospedagem->id.'" class="btn btn-primary">Check in</a>'; break;
                                                    //     case 'Em andamento': $botao = '<a href="    includes/mudarStatus.php?id='.$hospedagem->id.'" class="btn btn-info">Check out</a>'; break;
                                                    //     case 'Cancelada': $botao = '<b style="color: red;">Cancelada</b>'; break;
                                                    //     case 'Concluída': $botao = '<b style="color: green;">Concluída</b>'; break;
                                                    // }
                                                    
                                                    //     $resultados .= '<tr>
                                                    //                         <td>'.$hospedagem->id.'</td>
                                                    //                         <td>'.$hospedagem->nome.'</td>
                                                    //                         <td>'.$hospedagem->data.'</td>
                                                    //                         <td>'.$hospedagem->entrada_prevista.'</td>
                                                    //                         <td>'.$hospedagem->saida_prevista.'</td>    
                                                    //                         <td>'.$hospedagem->status.'</td>
                                                    //                         <td><a href="descricaoHospedagens.php?id='.$hospedagem->id.'" class="btn btn-success">Detalhes</a></td>
                                                    //                         <td>'.$botao.'</td>
                                                    //                     </tr>';
                                                    // }

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