<?php
use app\Entity\Hospedagem;

$idHgem = $_GET['idHgem'];
$qtdQuarto = $_GET['qtdQuarto'];
?>

<div class="col-12 mt-5">
    <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Cadastro de Hospedagem</h4>
            <form action="cadastroHospedagem2.php" method="POST">
                <input type="hidden" name="idHgem">
                <input type="hidden" name="qtdQuarto">
                <?php
                    $res = '';
                    $i=null;
                    
                    use app\Entity\HgemQuar;

                    $hgemquar = new HgemQuar;
                    for($i=1; $i<=$qtdQuarto; $i++) {
                        $res = '<div class="form-group">
                                    <label for="exampleInputText'.$i.'">ID do Quarto '.$i.'</label>
                                    <input type="number" class="form-control" name="idQuarto[]" id="exampleInputText'.$i.'" aria-describedby="textHelp" required>
                                </div>';
                        echo $res;
                    }
                ?>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Avançar</button>
            </form>
        </div>
    </div>
</div>