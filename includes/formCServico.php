<div class="col-12 mt-5">
    <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Cadastro de Manutenção/Limpeza</h4>

            <form action="cadastroServ.php" method="POST">
               <input type="hidden" name="idHospedagem" value="<?= $_GET['id'] ?>">
               <div class="form-group">
                  <label for="example-date-input" class="col-form-label">Serviço</label>
                  <select name="idServico" id="idServico">
                  <?php
                     require_once 'cadastroServ.php';
                     use app\Entity\Servico;
                     $s = new Servico;
                     $servs = $s->getServico();
                     $idServ=1;
                     foreach($servs as $serv) {
                        echo '<option value="'.$idServ.'">'.$serv->servico.'</option>';
                        $idServ++;
                     }
                  ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="example-number-input" class="col-form-label">ID do Quarto</label>
                  <input class="form-control" type="number" name="idQuarto" id="example-number-input">
               </div>
               <div class="form-group">
                  <label for="example-datetime-local-input" class="col-form-label">Data e Hora</label>
                  <input class="form-control" type="datetime-local" name="dataHora" id="example-datetime-local-input">
               </div>
               <div class="form-group">
                  <label for="example-number-input" class="col-form-label">Quantidade</label>
                  <input class="form-control" type="number" name="qtd" id="example-number-input">
               </div>
               <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Cadastrar</button>
            </form>
        </div>
    </div>
</div>