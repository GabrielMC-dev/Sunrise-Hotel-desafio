<?php 

require_once 'app/Entity/Hospedagem.php';

use App\Db\Database;
use app\Entity\Hospedagem;

if(isset($_GET['check_in'])){
    $updateSts = new Database('hospedagem');
    $updateSts->updateStatusHgem("'Em andamento'", $_GET['id']);
    var_dump($_GET['id'], $_GET['check_in']);
}

if(isset($_GET['check_in'])){

}



?>




<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Sunrise Hotel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Início</a></li>
                                <li><span>Dashboard Hospedagens</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
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
                                <h3 class="header-title">Hospedagens</h3>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase">
                                                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                                                    <select name="filtroHospedagem" id="filtroHospedagem">
                                                        <?php
                                                            if(empty($_POST['filtroHospedagem'])) {
                                                                $_POST['filtroHospedagem'] = 'todas';
                                                            } ?>
                                                        <option value="todas" <?php if($_POST['filtroHospedagem'] == 'todas'){echo 'selected';}?>>Todas</option>
                                                        <option value="Confirmada" <?php if($_POST['filtroHospedagem'] == 'Confirmada'){echo 'selected';}?>>Confirmadas</option>
                                                        <option value="Em andamento" <?php if($_POST['filtroHospedagem'] == 'Em andamento'){echo 'selected';}?>>Em andamento</option>
                                                        <option value="Concluida" <?php if($_POST['filtroHospedagem'] == 'Concluida'){echo 'selected';}?>>Concluídas</option>
                                                        <option value="Cancelada" <?php if($_POST['filtroHospedagem'] == 'Cancelada'){echo 'selected';}?>>Canceladas</option>
                                                    </select>
                                                    <button type="submit" style="border: 1px solid black; margin-left: 5px;">Filtrar</button>
                                                </form>
                                                    
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome Responsável</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Entrada Prevista</th>
                                                    <th scope="col">Saída Prevista</th>
                                                    <!-- <th scope="col">Total Dias</th> -->
                                                    <!-- 
                                                    <th scope="col">Check-in</th>
                                                    <th scope="col">Check-out</th>
                                                    <th scope="col">Qtd Hóspedes</th>
                                                    <th scope="col">Qtd Quartos</th> -->
                                                    <!-- <th scope="col">Valor Total</th> -->
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $where = null;
                                                    if(isset($_POST['filtroHospedagem'])) {
                                                        //início filtro
                                                        $filtro = $_POST['filtroHospedagem'];
                                                        if($filtro == 'todas') {
                                                            $where = null;

                                                        }
                                                        else {
                                                            $filtragem = "'".$filtro."'";
                                                            $where = "hospedagem.status = ".$filtragem;
                                                        }
                                                        //fim filtro
                                                    }

                                                    $hospedagens = Hospedagem::getHospedagens($where);
                                                    $obHospedagem = new Hospedagem;

                                                    $resultados = '';
                                                    foreach($hospedagens as $hospedagem) {

                                                        $obHospedagem->entrada_prevista = $hospedagem->entrada_prevista;
                                                        $obHospedagem->saida_prevista = $hospedagem->saida_prevista;

                                                    // if($hospedagem->saida_prevista < date('Y-m-d H:i:s') /*and $cancelar=false*/) {
                                                    //     $hospedagem->status = 'Concluída';
                                                    // }
                                                    $botao = '';
                                                    switch($hospedagem->status) {
                                                        case 'Confirmada': $botao = '<a href="includes/mudarStatus.php?id='.$hospedagem->id.'&check_in="" class="btn btn-primary">Check in</a>'; break;
                                                        case 'Em andamento': $botao = '<includes/mudarStatus.php?id='.$hospedagem->id.'&check_out="" class="btn btn-primary">Check out</a>'; break;
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




<!-- PARA A DESCRIÇÃO DAS HOSPEDAGENS
<td>'.$hospedagem->check_in.'</td>
<td>'.$hospedagem->check_out.'</td>
<td>'.$hospedagem->qtd_hospede.'</td>
<td>'.$hospedagem->qtd_quarto.'</td> -->