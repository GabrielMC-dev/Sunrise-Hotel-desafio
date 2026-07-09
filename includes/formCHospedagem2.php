<?php
use app\Entity\Hospedagem;

$idHgem = $_GET['idHgem'];
$qtdQuarto = $_GET['qtdQuarto'];
$qtdHospede = $_GET['qtdHospede'];
?>

<div class="col-12 mt-5">
    <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Cadastro de Hospedagem</h4>
            <form action="cadastroHospedagem2.php" method="POST">
                <input type="hidden" name="idHgem">
                <input type="hidden" name="qtdQuarto">
                <h5>Selecione os quartos:</h5>
                <?php
                    $res1 = '';
                    $i=null;
                    for($i=1; $i<=$qtdQuarto; $i++) {
                        $res1 = '<div class="form-group">
                                    <label for="exampleInputText'.$i.'">ID do Quarto '.$i.'</label>
                                    <input type="number" class="form-control" name="idQuarto[]" id="exampleInputNumber'.$i.'" aria-describedby="textHelp" required>
                                </div>';
                        echo $res1;
                    }
                ?>
                <br>
                <h5>Selecione os hóspedes:</h5>
                <?php
                    $res2 = '';
                    $j=null;
                    for($j=1; $j<=$qtdHospede; $j++) {
                        $res2 = '<div class="form-group">
                                    <label for="exampleInputText'.$j+$i.'">ID do Hóspede '.$j.'</label>
                                    <input type="number" class="form-control" name="idHospede[]" id="exampleInputNumber'.$j+$i.'" aria-describedby="textHelp" required>
                                </div>';
                        echo $res2;
                    }
                ?>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Avançar</button>
            </form>
        </div>
    </div>
</div>