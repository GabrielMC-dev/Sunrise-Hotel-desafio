<div class="col-12 mt-5">
    <a href="javascript:history.back()" class="btn btn-danger" style="margin-bottom: 30px;">Voltar</a>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Cadastro de Manutenção/Limpeza</h4>

            <form action="cadastroML.php" method="POST">
               <input type="hidden" name="idQuarto" value="<?= $_GET['idQuarto'] ?>">
               <div class="form-group">
                  <label for="example-date-input" class="col-form-label">Tipo</label>
                  <select name="tipoML" id="tipoML">
                     <option value="manutencao">Manutenção</option>
                     <option value="limpeza">Limpeza</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="example-datetime-local-input" class="col-form-label">Data e Hora</label>
                  <input class="form-control" type="datetime-local" name="dataHora" id="example-datetime-local-input">
               </div>
               <div class="form-group">
                  <label for="example-text-input" class="col-form-label">Responsável</label>
                  <input class="form-control" type="text" name="responsavel" id="example-text-input">
               </div>
               <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Cadastrar</button>
            </form>
        </div>
    </div>
</div>